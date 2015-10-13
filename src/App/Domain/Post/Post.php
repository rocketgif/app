<?php

namespace App\Domain\Post;

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
     * @var string|null
     */
    private $author;

    /**
     * The webm URL
     *
     * @var string
     */
    private $webmUrl;

    /**
     * The mp4 URL
     *
     * @var string
     */
    private $mp4Url;

    /**
     * The width of the video
     *
     * @var int
     */
    private $width;

    /**
     * The height of the video
     *
     * @var int
     */
    private $height;

    /**
     * __construct
     *
     * @param string      $title
     * @param string      $gfycatKey
     * @param \DateTime   $createdAt
     * @param string      $baseUrl
     * @param string      $webmUrl
     * @param string      $mp4Url
     * @param int         $width
     * @param int         $height
     * @param string|null $author
     */
    public function __construct(
        $title, $gfycatKey, \DateTime $createdAt, $baseUrl, $webmUrl, $mp4Url,
        $width, $height, $author = null
    ) {
        $this->title     = $title;
        $this->gfycatKey = $gfycatKey;
        $this->createdAt = $createdAt;
        $this->baseUrl   = $baseUrl;
        $this->webmUrl   = $webmUrl;
        $this->mp4Url    = $mp4Url;
        $this->width     = $width;
        $this->height    = $height;
        $this->author    = $author;
    }

    /**
     * Set identifier
     *
     * @return self
     */
    public function setIdentifier($identifier)
    {
        $this->identifier = $identifier;

        return $this;
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
     * Get baseUrl
     *
     * @return string
     */
    public function getBaseUrl()
    {
        return $this->baseUrl;
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
     * @return string|null
     */
    public function getAuthor()
    {
        return $this->author;
    }

    /**
     * Set webm url
     *
     * @param string $url
     *
     * @return self
     */
    public function setWebmUrl($url)
    {
        $this->webmUrl = $url;

        return $this;
    }

    /**
     * Get webmUrl
     *
     * @return string
     */
    public function getWebmUrl()
    {
        return $this->webmUrl;
    }

    /**
     * Set mp4 url
     *
     * @param string $url
     *
     * @return self
     */
    public function setMp4Url($url)
    {
        $this->mp4Url = $url;

        return $this;
    }

    /**
     * Get mp4Url
     *
     * @return string
     */
    public function getMp4Url()
    {
        return $this->mp4Url;
    }

    /**
     * Set width
     *
     * @param int $width
     *
     * @return self
     */
    public function setWidth($width)
    {
        $this->width = $width;

        return $this;
    }

    /**
     * Get width
     *
     * @return int
     */
    public function getWidth()
    {
        return $this->width;
    }

    /**
     * Set height
     *
     * @param int $height
     *
     * @return self
     */
    public function setHeight($height)
    {
        $this->height = $height;

        return $this;
    }

    /**
     * Get height
     *
     * @return int
     */
    public function getHeight()
    {
        return $this->height;
    }
}
