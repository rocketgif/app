<?php

namespace App\Domain\Vote;

use App\Domain\Command\CommandInterface;

/**
 * Upvote an object
 */
class UpvoteCommand implements CommandInterface
{
    /**
     * The unique identifier of the object to upvote
     *
     * @var int
     */
    private $object;

    /**
     * The unique identifier of the user upvoting
     *
     * @var string
     */
    private $user;

    /**
     * __construct
     *
     * @param int    $object
     * @param string $user
     */
    public function __construct($object, $user)
    {
        $this->object = $object;
        $this->user   = $user;
    }

    /**
     * Get object
     *
     * @return int
     */
    public function getObject()
    {
        return $this->object;
    }

    /**
     * Get user
     *
     * @return string
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * {@inheritdoc}
     */
    public function getName()
    {
        return 'vote_upvote';
    }
}
