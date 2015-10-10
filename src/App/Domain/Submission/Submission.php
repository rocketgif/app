<?php

namespace App\Domain\Submission;

/**
 * A post submission
 */
class Submission
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
     * __construct
     *
     * @param string      $title
     * @param string      $gfycatKey
     * @param \DateTime   $createdAt
     * @param string      $baseUrl
     * @param string      $webmUrl
     * @param string      $mp4Url
     * @param string|null $author
     */
    public function __construct(
        $title, $gfycatKey, \DateTime $createdAt,$baseUrl, $webmUrl, $mp4Url,
        $author = null
    ) {
        $this->title     = $title;
        $this->gfycatKey = $gfycatKey;
        $this->createdAt = $createdAt;
        $this->baseUrl   = $baseUrl;
        $this->webmUrl   = $webmUrl;
        $this->mp4Url    = $mp4Url;
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
     * Get baseUrl
     *
     * @return string
     */
    public function getBaseUrl()
    {
        return $this->baseUrl;
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
     * Get mp4Url
     *
     * @return string
     */
    public function getMp4Url()
    {
        return $this->mp4Url;
    }
}
