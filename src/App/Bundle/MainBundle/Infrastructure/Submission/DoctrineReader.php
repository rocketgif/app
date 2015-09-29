<?php

namespace App\Bundle\MainBundle\Infrastructure\Submission;

use App\Domain\Submission\ReaderInterface;
use Doctrine\ORM\EntityManagerInterface;

/**
 * Read submissions using Doctrine
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
     * The service used to convert submissions from/to entities
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
    public function findAll()
    {
        $queryBuilder = $this->entityManager->createQueryBuilder();
        $queryBuilder
            ->select('s')
            ->from('AppMainBundle:Submission', 's')
        ;

        $entities    = $queryBuilder->getQuery()->execute();
        $submissions = [];

        foreach ($entities as $entity) {
            $submissions[] = $this->converter->from($entity);
        }

        return $submissions;
    }
}
