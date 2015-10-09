<?php

namespace App\Bundle\MainBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * A post submission
 *
 * @ORM\Table(name="submission")
 * @ORM\Entity(repositoryClass="App\Bundle\MainBundle\Entity\SubmissionRepository")
 */
class Submission
{
    /**
     * The identifier
     *
     * @var int
     *
     * @ORM\Column(name="identifier", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $identifier;

    /**
     * The title
     *
     * @var string
     *
     * @ORM\Column(name="title", type="string", nullable=false)
     */
    private $title;

    /**
     * Created at
     *
     * @var \DateTime
     *
     * @ORM\Column(name="created_at", type="datetime", nullable=false)
     */
    private $createdAt;

    /**
     * The unique key of the gfycat media
     *
     * @var string
     *
     * @ORM\Column(name="gfycat_key", type="string", nullable=false)
     */
    private $gfycatKey;

    /**
     * The URL given by the user
     *
     * @var string
     *
     * @ORM\Column(name="base_url", type="string", nullable=false)
     */
    private $baseUrl;

    /**
     * The author
     *
     * @var string|null
     *
     * @ORM\Column(name="author", type="string", nullable=true)
     */
    private $author;

    /**
     * The webmUrl
     *
     * @var string|null
     *
     * @ORM\Column(name="webm_url", type="string", nullable=true)
     */
    private $webmUrl;

    /**
     * The mp4Url
     *
     * @var string|null
     *
     * @ORM\Column(name="mp4_url", type="string", nullable=true)
     */
    private $mp4Url;

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
     * Set title
     *
     * @return self
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
     * Set gfycat key
     *
     * @return self
     */
    public function setGfycatKey($gfycatKey)
    {
        $this->gfycatKey = $gfycatKey;

        return $this;
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
     * Set createdAt
     *
     * @return self
     */
    public function setCreatedAt(\DateTime $createdAt)
    {
        $this->createdAt = $createdAt;

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
     * Set baseUrl
     *
     * @return self
     */
    public function setBaseUrl($baseUrl)
    {
        $this->baseUrl = $baseUrl;

        return $this;
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
     * Set author
     *
     * @return self
     */
    public function setAuthor($author = null)
    {
        $this->author = $author;

        return $this;
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
     * Get webmUrl
     *
     * @return string|null
     */
    public function getWebmUrl()
    {
        return $this->webmUrl;
    }

    /**
     * Set webmUrl
     *
     * @param string|null $webmUrl
     *
     * @return self
     */
    public function setWebmUrl($webmUrl = null)
    {
        $this->webmUrl = $webmUrl;

        return $this;
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

    /**
     * Set mp4Url
     *
     * @param string|null $mp4Url
     *
     * @return self
     */
    public function setMp4Url($mp4Url = null)
    {
        $this->mp4Url = $mp4Url;

        return $this;
    }
}
