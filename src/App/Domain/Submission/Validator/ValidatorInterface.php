<?php

namespace App\Domain\Submission\Validator;

use App\Domain\Submission\Submission;

/**
 * The submission validator interface
 */
interface ValidatorInterface
{
    /**
     * Validate the given submission and create a post from it
     *
     * @param App\Domain\Submission $submission
     */
    function validate(Submission $submission);

    /**
     * Refuse the given submission and delete it
     *
     * @param App\Domain\Submission $submission
     */
    function refuse(Submission $submission);
}
