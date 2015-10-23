<?php

namespace App\Domain\Vote;

/**
 * An upvote on an object
 */
class Upvote
{
    /**
     * The unique identifier of the object upvoted
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
     * The creation date of this upvote
     *
     * @var \DateTime
     */
    private $createdAt;

    /**
     * __construct
     *
     * @param int       $object
     * @param string    $user
     * @param \DateTime $createdAt
     */
    public function __construct($object, $user, \DateTime $createdAt)
    {
        $this->object    = $object;
        $this->user      = $user;
        $this->createdAt = $createdAt;
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
     * Get createdAt
     *
     * @return \DateTime
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }
}
