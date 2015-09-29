<?php

namespace App\Domain\Submission;

/**
 * The service to perform write, edit and delete operations about submissions on
 * the database
 */
interface WriterInterface
{
    /**
     * Add a given submission
     *
     * @param Submission $submission
     */
    public function add(Submission $submission);
}
