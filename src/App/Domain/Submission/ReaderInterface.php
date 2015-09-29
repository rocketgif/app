<?php

namespace App\Domain\Submission;

/**
 * Read the sumission list from a storage engine
 */
interface ReaderInterface
{
    /**
     * Retrieve an array of sumissions having the given identifiers, indexed by
     * identifier
     *
     * @return Submission[]
     */
    public function findAll();
}
