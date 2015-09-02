<?php

namespace App\Domain;

/**
 * A rocketgif post.
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
     * The gfycat key
     *
     * @var string
     */
    private $key;

    /**
     * Created at
     *
     * @var \DateTime
     */
    private $createdAt;

    /**
     * The url of the media
     *
     * @var string
     */
    private $url;

    /**
     * __construct
     *
     * @param string    $url
     * @param \DateTime $createdAt
     */
    public function __construct($url, $createdAt)
    {
        $this->url       = $url;
        $this->createdAt = $createdAt;
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
     * Set title
     *
     * @return string
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
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
     * Get url
     *
     * @return string
     */
    public function getUrl()
    {
        return $this->url;
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
