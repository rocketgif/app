<?php

namespace App\Bundle\MainBundle\Infrastructure\Post;

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
     * __construct
     *
     * @param EntityManagerInterface $entityManager
     */
    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
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
     * Retrieve the post entity repository
     *
     * @return \App\Bundle\MainBundle\Entity\Post\PostRepository
     */
    private function getRepository()
    {
        return $this->entityManager->getRepository('AppMainBundle:Post\Post');
    }
}
