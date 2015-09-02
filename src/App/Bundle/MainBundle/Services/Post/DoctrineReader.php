<?php

namespace App\Bundle\MainBundle\Services\Post;

use Doctrine\ORM\EntityManagerInterface;

use App\Application\Contract\Post\ReaderInterface;
use App\Domain\Post;

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
    public function page($number)
    {
        $queryBuilder = $this
            ->entityManager
            ->createQueryBuilder()
            ->select('post')
            ->from('Entity:Post', 'post');

        return $queryBuilder->getQuery()->getResult();
    }
}
