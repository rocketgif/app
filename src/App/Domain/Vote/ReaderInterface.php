<?php

namespace App\Domain\Vote;

/**
 * The service to perform read operations about votes on the database
 */
interface ReaderInterface
{
    /**
     * Retrieve the number of vote for each object. Return an array indexed by
     * by object
     *
     * @param int[] $objects
     *
     * @return int[]
     */
    public function count(array $objects);

    /**
     * Check if there is already a vote for the given object and user
     *
     * @param int    $object
     * @param string $user
     *
     * @return bool
     */
    public function isUpvoted($object, $user);
}
