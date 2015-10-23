<?php

namespace App\Bundle\MainBundle\Events\Post\Vote;

use App\Domain\Vote\Upvote;
use Symfony\Component\EventDispatcher\Event;

/**
 * Reference the upvote when dispatching the upvoted event
 */
class UpvotedEvent extends Event
{
    /**
     * The upvote that has been created
     *
     * @var Upvote
     */
    private $upvote;

    /**
     * __construct
     *
     * @param Upvote $upvote
     */
    public function __construct(Upvote $upvote)
    {
        $this->upvote = $upvote;
    }

    /**
     * Get the upvote
     *
     * @return Upvote
     */
    public function getUpvote()
    {
        return $this->upvote;
    }
}
