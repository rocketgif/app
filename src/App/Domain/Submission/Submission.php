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
     * The webmUrl
     *
     * @var string|null
     */
    private $webmUrl;

    /**
     * The mp4Url
     *
     * @var string|null
     */
    private $mp4Url;

    /**
     * __construct
     *
     * @param string      $title
     * @param string      $gfycatKey
     * @param \DateTime   $createdAt
     * @param string      $baseUrl
     * @param string|null $author
     * @param string|null $webmUrl
     * @param string|null $mp4Url
     */
    public function __construct(
        $title, $gfycatKey, \DateTime $createdAt,$baseUrl,
        $author = null, $webmUrl = null, $mp4Url = null
    ) {
        $this->title     = $title;
        $this->gfycatKey = $gfycatKey;
        $this->createdAt = $createdAt;
        $this->baseUrl   = $baseUrl;
        $this->author    = $author;
        $this->webmUrl   = $webmUrl;
        $this->mp4Url    = $mp4Url;
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
     * @return string|null
     */
    public function getWebmUrl()
    {
        return $this->webmUrl;
    }

    /**
     * Get mp4Url
     *
     * @return string|null
     */
    public function getMp4Url()
    {
        return $this->mp4Url;
    }
}
