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
     * The URL given by the user
     *
     * @var string
     */
    private $baseUrl;

    /**
     * __construct
     *
     * @param string    $title
     * @param string    $url
     * @param \DateTime $createdAt
     * @param string    $baseUrl
     */
    public function __construct($title, $url, \DateTime $createdAt, $baseUrl)
    {
        $this->title     = $title;
        $this->url       = $url;
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
