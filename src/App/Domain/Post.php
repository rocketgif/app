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
    private $id;

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
     * __construct
     *
     * @param string    $title
     * @param string    $gfycatKey
     * @param \DateTime $createdAt
     * @param string    $baseUrl
     */
    public function __construct($title, $gfycatKey, \DateTime $createdAt, $baseUrl)
    {
        $this->title     = $title;
        $this->gfycatKey = $gfycatKey;
        $this->createdAt = $createdAt;
        $this->baseUrl   = $baseUrl;
    }

    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
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
}
