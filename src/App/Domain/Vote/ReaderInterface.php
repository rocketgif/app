<?php

namespace App\Domain\Vote;

/**
 * The service to perform read operations about votes on the database
 */
interface ReaderInterface
{
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
