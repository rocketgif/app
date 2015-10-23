<?php

namespace App\Domain\Vote;

/**
 * The service to perform write, edit and delete operations about votes on the
 * database
 */
interface WriterInterface
{
    /**
     * Create an upvote for the given object and user
     *
     * @param int       $object
     * @param string    $user
     * @param \DateTime $date
     *
     * @throws \App\Domain\Vote\Exceptions\UpvoteFailedException
     */
    public function upvote($object, $user, \DateTime $date);
}
