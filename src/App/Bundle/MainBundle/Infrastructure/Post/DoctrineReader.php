<?php

namespace App\Bundle\MainBundle\Infrastructure\Post;

use App\Bundle\MainBundle\Infrastructure\Post\EntityConverter;
use App\Domain\Post\ReaderInterface;
use Doctrine\ORM\EntityManagerInterface;

/**
 * Read posts using Doctrine
 */
class DoctrineReader implements ReaderInterface
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
     * @param EntityConverter $converter
     */
    public function __construct(
        EntityManagerInterface $entityManager,
        EntityConverter $converter
    ) {
        $this->entityManager = $entityManager;
        $this->converter     = $converter;
    }

    /**
     * {@inheritdoc}
     */
    public function find(array $identifiers)
    {
        $posts    = [];
        $entities = $this->getRepository()->findCollection($identifiers);

        foreach ($entities as $entity) {
            $posts[$entity->getIdentifier()] = $entity;
        }

        return $posts;
    }

    /**
     * {@inheritdoc}
     */
    public function findAll()
    {
        $entities = $this->getRepository()->findAll();

        $posts = [];

        foreach ($entities as $entity) {
            $posts[] = $this->converter->from($entity);
        }

        return $posts;
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
