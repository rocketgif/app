<?php

namespace App\Bundle\MainBundle\Infrastructure\Post;

use App\Domain\Post;
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
    public function add(Post $post)
    {
        $this->entityManager->persist($post);
        $this->entityManager->flush($post);
    }
}
