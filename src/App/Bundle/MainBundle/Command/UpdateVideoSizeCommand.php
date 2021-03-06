<?php

namespace App\Bundle\MainBundle\Command;

use App\Domain\Post\ReaderInterface;
use App\Domain\Post\Resolver\Exception\InvalidUrlException;
use App\Domain\Post\Resolver\Handler\HandlerInterface;
use App\Domain\Post\WriterInterface;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Helper\ProgressBar;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

/**
 * Update video's width and height for old posts
 */
class UpdateVideoSizeCommand extends Command
{
    /**
     * The post reader
     *
     * @var ReaderInterface
     */
    private $reader;

    /**
     * The post writer
     *
     * @var WriterInterface
     */
    private $writer;

    /**
     * The post handler
     *
     * @var HandlerInterface
     */
    private $handler;

    /**
     * __construct
     *
     * @param ReaderInterface  $reader
     * @param WriterInterface  $writer
     * @param HandlerInterface $handler
     */
    public function __construct(
        ReaderInterface $reader,
        WriterInterface $writer,
        HandlerInterface $handler
    ) {
        $this->reader  = $reader;
        $this->writer  = $writer;
        $this->handler = $handler;

        parent::__construct();
    }

    /**
     * {@inheritDoc}
     */
    protected function configure()
    {
        $this
            ->setName('rocketgif:post:update-video-size')
            ->setDescription('Update video\'s width and height for old posts')
        ;
    }

    /**
     * {@inheritDoc}
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        // Get all posts
        $posts = $this->reader->findAll();

        // Create a new progress bar
        $progress = new ProgressBar($output, count($posts));
        $progress->start();

        // For each post, resolve the url and update width and height
        foreach ($posts as $post) {
            try {
                $video = $this->handler->resolve($post->getBaseUrl());
            } catch (InvalidUrlException $exception) {
                $output->writeln(
                    sprintf('<error>%s</error>', $exception->getMessage())
                );

                continue;
            }

            $post->setWidth($video->getWidth());
            $post->setHeight($video->getHeight());

            $progress->advance();
        }

        $this->writer->save($posts);

        // Ensure that the progress bar is at 100%
        $progress->finish();
    }
}
