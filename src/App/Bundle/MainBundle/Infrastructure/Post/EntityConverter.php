<?php

namespace App\Bundle\MainBundle\Infrastructure\Post;

use App\Bundle\MainBundle\Entity\Post\Post as PostEntity;
use App\Domain\Post\Post;

/**
 * Convert posts from/to entities
 */
class EntityConverter
{
    /**
     * Instanciate a post from the given entity
     *
     * @param PostEntity $entity
     *
     * @return Post
     */
    public function from(PostEntity $entity)
    {
        $post = new Post(
            $entity->getTitle(),
            $entity->getGfycatKey(),
            $entity->getCreatedAt(),
            $entity->getBaseUrl(),
            $entity->getWebmUrl(),
            $entity->getMp4Url(),
            $entity->getAuthor()
        );
        $post->setIdentifier($entity->getId());

        return $post;
    }

    /**
     * Compute data from the given post in the given post entity
     *
     * @param Post       $post
     * @param PostEntity $entity
     */
    public function computeTo(Post $post, PostEntity $entity)
    {
        $entity
            ->setTitle($post->getTitle())
            ->setAuthor($post->getAuthor())
            ->setGfycatKey($post->getGfycatKey())
            ->setBaseUrl($post->getBaseUrl())
            ->setCreatedAt($post->getCreatedAt())
            ->setWebmUrl($post->getWebmUrl())
            ->setMp4Url($post->getMp4Url())
        ;
    }
}
