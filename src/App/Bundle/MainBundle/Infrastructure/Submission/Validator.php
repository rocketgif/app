<?php

namespace App\Bundle\MainBundle\Infrastructure\Submission;

use App\Bundle\MainBundle\Infrastructure\Post\Factory as PostFactory;
use App\Domain\Post\WriterInterface as PostWriterInterface;
use App\Domain\Submission\Submission;
use App\Domain\Submission\Validator\ValidatorInterface;
use App\Domain\Submission\WriterInterface as SubmissionWriterInterface;

/**
 * The submission validator
 */
class Validator implements ValidatorInterface
{
    /**
     * The post factory
     *
     * @var PostFactory
     */
    private $postFactory;

    /**
     * The post writer
     *
     * @var PostWriterInterface
     */
    private $postWriter;

    /**
     * The submission entity converter
     *
     * @var EntityConverter
     */
    private $submissionConverter;

    /**
     * The submission writer
     *
     * @var SubmissionWriterInterface
     */
    private $submissionWriter;

    /**
     * __construct
     *
     * @param PostFactory               $postFactory
     * @param PostWriterInterface       $postWriter
     * @param EntityConverter           $submissionConverter
     * @param SubmissionWriterInterface $submissionWriter
     */
    function __construct(
        PostFactory $postFactory,
        PostWriterInterface $postWriter,
        EntityConverter $submissionConverter,
        SubmissionWriterInterface $submissionWriter
    ) {
        $this->postFactory         = $postFactory;
        $this->postWriter          = $postWriter;
        $this->submissionConverter = $submissionConverter;
        $this->submissionWriter    = $submissionWriter;
    }

    /**
     * {@inheritDoc}
     */
    function validate(Submission $submission)
    {
        $post = $this->postFactory->createFromSubmission($submission);

        $this->postWriter->add($post);
        $this->submissionWriter->delete($submission);
    }

    /**
     * {@inheritDoc}
     */
    function refuse(Submission $submission)
    {
        $this->submissionWriter->delete($submission);
    }
}
