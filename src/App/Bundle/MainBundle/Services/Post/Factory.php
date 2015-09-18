<?php

namespace App\Bundle\MainBundle\Services\Post;

use App\Bundle\MainBundle\Form\Model\Post\Add as AddModel;
use App\Bundle\MainBundle\Infrastructure\Clock\Clock;
use App\Domain\Post;
use App\Domain\Post\Resolver\ResolverInterface;

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
     * The service used to retrieve a correct gif URL from a user-readable URL
     *
     * @var ResolverInterface
     */
    private $resolver;

    /**
     * The Post constructor
     *
     * @param Clock             $clock
     * @param ResolverInterface $resolver
     */
    public function __construct(Clock $clock, ResolverInterface $resolver)
    {
        $this->clock    = $clock;
        $this->resolver = $resolver;
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
        $title   = $model->title;
        $key     = $this->resolver->resolve($model->url);
        $now     = $this->clock->now();
        $baseUrl = $model->url;

        $post = new Post($title, $key, $now, $baseUrl);

        return $post;
    }
}
