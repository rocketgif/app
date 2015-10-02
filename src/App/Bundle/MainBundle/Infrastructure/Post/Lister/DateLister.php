<?php

namespace App\Bundle\MainBundle\Infrastructure\Post\Lister;

use App\Domain\Post\Lister\ListerInterface;
use Doctrine\ORM\EntityManagerInterface;

/**
 * List posts by date
 */
class DateLister implements ListerInterface
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
    public function get($numberPerPage, $page = 1)
    {
        $offset             = ($page - 1) * $numberPerPage;
        $orderedIdentifiers = $this->getRepository()->paginateByDate($numberPerPage, $offset);

        return $orderedIdentifiers;
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
