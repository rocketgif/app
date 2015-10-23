<?php

namespace App\Bundle\MainBundle\Entity\Post\Vote\Upvote;

use Doctrine\ORM\Mapping as ORM;

/**
 * A compilation of each post upvotes
 *
 * @ORM\Table(name="post_vote_upvote_compiled")
 * @ORM\Entity(repositoryClass="App\Bundle\MainBundle\Entity\Post\Vote\Upvote\CompiledRepository")
 */
class Compiled
{
    /**
     * The unique identifier
     *
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $identifier;

    /**
     * The reference concerned by this compiled upvote
     *
     * @var int
     *
     * @ORM\Column(name="reference", type="integer", nullable=false)
     */
    private $reference;

    /**
     * The number of votes for this reference
     *
     * @var int
     *
     * @ORM\Column(name="quantity", type="integer", nullable=false)
     */
    private $quantity = 0;

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
     * Get reference
     *
     * @return int
     */
    public function getReference()
    {
        return $this->reference;
    }

    /**
     * Set reference
     *
     * @param int
     *
     * @return self
     */
    public function setReference($reference)
    {
        $this->reference = $reference;

        return $this;
    }

    /**
     * Get quantity
     *
     * @return int
     */
    public function getQuantity()
    {
        return $this->quantity;
    }

    /**
     * Set quantity
     *
     * @param int $quantity
     *
     * @return self
     */
    public function setQuantity($quantity)
    {
        $this->quantity = $quantity;

        return $this;
    }
}
