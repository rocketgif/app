<?php

namespace App\Domain\Post\Resolver;

/**
 * The object storing data about the video retrieved by the resolver
 */
class Video
{
    /**
     * The unique key of the video for the service
     *
     * @var string
     */
    private $key;

    /**
     * The URL of the webm file of the video
     *
     * @var string
     */
    private $webmUrl;

    /**
     * The URL of the mp4 file of the video
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
     * @param string $key
     * @param string $webmUrl
     * @param string $mp4Url
     * @param int    $width
     * @param int    $height
     */
    public function __construct($key, $webmUrl, $mp4Url, $width, $height)
    {
        $this->key     = $key;
        $this->webmUrl = $webmUrl;
        $this->mp4Url  = $mp4Url;
        $this->width   = $width;
        $this->height  = $height;
    }

    /**
     * Get key
     *
     * @return string
     */
    public function getKey()
    {
        return $this->key;
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
     * Get height
     *
     * @return int
     */
    public function getHeight()
    {
        return $this->height;
    }
}
