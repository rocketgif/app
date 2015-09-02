<?php

namespace App\Bundle\MainBundle\Services\Post;

use App\Bundle\MainBundle\Form\Model\Post\Add as AddModel;
use App\Bundle\MainBundle\Infrastructure\Clock\Clock;
use App\Domain\Post;

/**
 * Create a new Post
 */
class Factory
{
    /**
     * The application clock
     *
     * @var Clock
     */
    private $clock;

    /**
     * The Post constructor
     *
     * @param Clock $clock
     */
    public function __construct(Clock $clock)
    {
        $this->clock = $clock;
    }

    /**
     * Create a new post from the form model
     *
     * @param AddModel $model
     *
     * @return Post
     */
    public function create(AddModel $model)
    {
        $now  = $this->clock->now();
        $post = new Post($model->url, $now);

        return $post;
    }
}
