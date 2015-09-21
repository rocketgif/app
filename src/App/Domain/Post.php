<?php

namespace App\Domain;

/**
 * A rocketgif post
 */
class Post
{
    /**
     * The identifier
     *
     * @var int
     */
    private $identifier;

    /**
     * The title
     *
     * @var string
     */
    private $title;

    /**
     * Created at
     *
     * @var \DateTime
     */
    private $createdAt;

    /**
     * The unique key of the gfycat media
     *
     * @var string
     */
    private $gfycatKey;

    /**
     * The URL given by the user
     *
     * @var string
     */
    private $baseUrl;

    /**
     * The author
     *
     * @var string
     */
    private $author;

    /**
     * __construct
     *
     * @param string    $title
     * @param string    $gfycatKey
     * @param \DateTime $createdAt
     * @param string    $baseUrl
     * @param string    $author
     */
    public function __construct($title, $gfycatKey, \DateTime $createdAt, $baseUrl, $author)
    {
        $this->title     = $title;
        $this->gfycatKey = $gfycatKey;
        $this->createdAt = $createdAt;
        $this->baseUrl   = $baseUrl;
        $this->author    = $author;
    }

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
     * Get title
     *
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Get gfycat key
     *
     * @return string
     */
    public function getGfycatKey()
    {
        return $this->gfycatKey;
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
     * Get author
     *
     * @return string
     */
    public function getAuthor()
    {
        return $this->author;
    }
}
