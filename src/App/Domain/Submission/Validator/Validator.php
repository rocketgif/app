<?php

namespace App\Domain\Submission\Validator;

use App\Domain\Clock\ClockInterface;
use App\Domain\Post\Post;
use App\Domain\Post\Resolver\ResolverInterface;
use App\Domain\Post\WriterInterface as PostWriterInterface;
use App\Domain\Submission\Submission;
use App\Domain\Submission\WriterInterface as SubmissionWriterInterface;

/**
 * The submission validator
 */
class Validator implements ValidatorInterface
{
    /**
     * The post writer
     *
     * @var PostWriterInterface
     */
    private $postWriter;

    /**
     * The submission writer
     *
     * @var SubmissionWriterInterface
     */
    private $submissionWriter;

    /**
     * The service used to transform the given URL into a clean one
     *
     * @var ResolverInterface
     */
    private $resolver;

    /**
     * The service used to retrieve the current time
     *
     * @var ClockInterface
     */
    private $clock;

    /**
     * __construct
     *
     * @param PostWriterInterface       $postWriter
     * @param SubmissionWriterInterface $submissionWriter
     * @param ResolverInterface         $resolver
     * @param ClockInterface            $clock
     */
    public function __construct(
        PostWriterInterface       $postWriter,
        SubmissionWriterInterface $submissionWriter,
        ResolverInterface         $resolver,
        ClockInterface            $clock
    ) {
        $this->postWriter       = $postWriter;
        $this->submissionWriter = $submissionWriter;
        $this->resolver         = $resolver;
        $this->clock            = $clock;
    }

    /**
     * {@inheritDoc}
     */
    public function validate(Submission $submission)
    {
        $post = $this->createPostFromSubmission($submission);

        $this->postWriter->add($post);
        $this->submissionWriter->delete($submission);
    }

    /**
     * {@inheritDoc}
     */
    public function refuse(Submission $submission)
    {
        $this->submissionWriter->delete($submission);
    }

    /**
     * Create a new post from a given submission
     *
     * @param Submission $submission
     *
     * @return Post
     */
    private function createPostFromSubmission(Submission $submission)
    {
        $title   = $submission->getTitle();
        $author  = $submission->getAuthor();
        $now     = $this->clock->now();
        $baseUrl = $submission->getBaseUrl();
        $video   = $this->resolver->resolve($submission->getBaseUrl());
        $key     = $video->getKey();
        $webm    = $video->getWebmUrl();
        $mp4     = $video->getMp4Url();
        $width   = $video->getWidth();
        $height  = $video->getHeight();

        $post = new Post($title, $key, $now, $baseUrl, $webm, $mp4, $width, $height, $author);

        return $post;
    }
}
