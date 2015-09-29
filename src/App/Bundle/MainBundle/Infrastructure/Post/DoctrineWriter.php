<?php

namespace App\Bundle\MainBundle\Infrastructure\Post;

use App\Bundle\MainBundle\Entity\Post\Post as PostEntity;
use App\Domain\Post\Post;
use App\Domain\Post\WriterInterface;
use Doctrine\ORM\EntityManagerInterface;

/**
 * Write, edit and delete posts using Doctrine
 */
class DoctrineWriter implements WriterInterface
{
    /**
     * The configured doctrine entity manager
     *
     * @var EntityManagerInterface
     */
    private $entityManager;

    /**
     * The service used to convert posts from/to entities
     *
     * @var EntityConverter
     */
    private $converter;

    /**
     * __construct
     *
     * @param EntityManagerInterface $entityManager
     * @param EntityConverter        $converter
     */
    public function __construct(EntityManagerInterface $entityManager, EntityConverter $converter)
    {
        $this->entityManager = $entityManager;
        $this->converter     = $converter;
    }

    /**
     * {@inheritdoc}
     */
    public function add(Post $post)
    {
        $entity = $this->find($post->getIdentifier());

        $this->converter->computeTo($post, $entity);

        $this->getRepository()->save($entity);
    }

    /**
     * Find a post with the given identifier or create a new one if none is
     * found
     *
     * @param int|null $identifier
     *
     * @return PostEntity
     */
    private function find($identifier = null)
    {
        $entity = null;

        if ($identifier !== null) {
            $entity = $this->getRepository()->findByIdentifier($identifier);
        }
        if ($entity === null) {
            $entity = new PostEntity();
        }

        return $entity;
    }

    /**
     * Retrieve the post entity repository
     *
     * @return \App\Bundle\MainBundle\Entity\Post\PostRepository
     */
    private function getRepository()
    {
        return $this->entityManager->getRepository('AppMainBundle:Post\Post');
    }
}
