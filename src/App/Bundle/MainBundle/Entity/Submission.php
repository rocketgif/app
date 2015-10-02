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
     * @var string
     *
     * @ORM\Column(name="author", type="string", nullable=true)
     */
    private $author;

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
    public function setAuthor($author)
    {
        $this->author = $author;

        return $this;
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
