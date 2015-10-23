<?php

namespace App\Bundle\MainBundle\Entity\Post\Vote\Upvote;

use Doctrine\ORM\Mapping as ORM;

/**
 * Upvote
 *
 * @ORM\Table(name="post_vote_upvote_upvote")
 * @ORM\Entity(repositoryClass="App\Bundle\MainBundle\Entity\Post\Vote\Upvote\UpvoteRepository")
 */
class Upvote
{
    /**
     * The unique identifier
     *
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $identifier;

    /**
     * The unique identifier of the object upvoted
     *
     * @var int
     *
     * @ORM\Column(name="object", type="integer", nullable=false)
     */
    private $object;

    /**
     * The unique identifier of the user upvoting
     *
     * @var string
     *
     * @ORM\Column(name="user", type="string", nullable=false)
     */
    private $user;

    /**
     * The date at which the upvote has been posted
     *
     * @var \DateTime
     *
     * @ORM\Column(name="created_at", type="datetime", nullable=false)
     */
    private $createdAt;

    /**
     * Get identifier
     *
     * @return int
     */
    public function getIdentifier()
    {
        return $this->identifier;
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
     * Set object
     *
     * @param int $object
     *
     * @return self
     */
    public function setObject($object)
    {
        $this->object = $object;

        return $this;
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
     * Set user
     *
     * @param string $user
     *
     * @return self
     */
    public function setUser($user)
    {
        $this->user = $user;

        return $this;
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

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     *
     * @return self
     */
    public function setCreatedAt(\DateTime $createdAt)
    {
        $this->createdAt = $createdAt;

        return $this;
    }
}
