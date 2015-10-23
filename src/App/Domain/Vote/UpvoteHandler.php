<?php

namespace App\Domain\Vote;

use App\Domain\Clock\ClockInterface;
use App\Domain\Command\CommandInterface;
use App\Domain\Command\HandlerInterface;
use App\Domain\Vote\Exceptions\UpvoteFailedException;

/**
 * Handle the upvote command
 */
class UpvoteHandler implements HandlerInterface
{
    /**
     * The service used to write upvotes in the storage engine
     *
     * @var WriterInterface
     */
    private $writer;

    /**
     * The application clock
     *
     * @var ClockInterface
     */
    private $clock;

    /**
     * __construct
     *
     * @param WriterInterface $writer
     * @param ClockInterface  $clock
     */
    public function __construct(WriterInterface $writer, ClockInterface $clock)
    {
        $this->writer = $writer;
        $this->clock  = $clock;
    }

    /**
     * {@inheritdoc}
     */
    public function handle(CommandInterface $command)
    {
        $object = $command->getObject();
        $user   = $command->getUser();
        $now    = $this->clock->now();

        try {
            $this->writer->upvote($object, $user, $now);
        } catch (UpvoteFailedException $exception) {
        }
    }

    /**
     * {@inheritdoc}
     */
    public function getNameResolved()
    {
        return 'vote_upvote';
    }
}
