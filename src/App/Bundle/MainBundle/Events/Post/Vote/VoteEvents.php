<?php

namespace App\Bundle\MainBundle\Events\Post\Vote;

/**
 * Reference all existing vote events
 */
final class VoteEvents
{
    /**
     * The event dispatched when a post is upvoted
     */
    const UPVOTED = 'app_main.event.post.vote.upvoted';
}
