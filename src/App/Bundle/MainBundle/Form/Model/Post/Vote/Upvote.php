<?php

namespace App\Bundle\MainBundle\Form\Model\Post\Vote;

/**
 * Post upvote model
 */
class Upvote
{
    /**
     * The identifier of the post being upvoted
     *
     * @var int
     */
    public $object;

    /**
     * The identifier of the user upvoting the post
     *
     * @var string
     */
    public $user;
}
