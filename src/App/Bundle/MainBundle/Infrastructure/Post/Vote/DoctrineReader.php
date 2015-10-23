<?php

namespace App\Bundle\MainBundle\Infrastructure\Post\Vote;

use App\Domain\Vote\ReaderInterface;
use Doctrine\ORM\EntityManagerInterface;

/**
 * Read upvotes using Doctrine
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
    public function isUpvoted($object, $user)
    {
        return $this->getUpvoteRepository()->upvoteExists($object, $user);
    }

    /**
     * Retrieve the upvote entity repository
     *
     * @return \App\Bundle\MainBundle\Entity\Post\Vote\Upvote\UpvoteRepository
     */
    private function getUpvoteRepository()
    {
        return $this->entityManager->getRepository('AppMainBundle:Post\Vote\Upvote\Upvote');
    }
}
