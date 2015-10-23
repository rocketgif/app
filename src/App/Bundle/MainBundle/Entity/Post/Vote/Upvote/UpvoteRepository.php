<?php

namespace App\Bundle\MainBundle\Entity\Post\Vote\Upvote;

use Doctrine\ORM\EntityRepository;

/**
 * UpvoteRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class UpvoteRepository extends EntityRepository
{
    /**
     * Save the given entity in database
     *
     * @param Upvote $upvote
     */
    public function save(Upvote $upvote)
    {
        $this->getEntityManager()->persist($upvote);
        $this->getEntityManager()->flush($upvote);
    }

    /**
     * Check if an upvote for the given object and user already exists
     *
     * @param int    $object
     * @param string $user
     *
     * @return bool
     */
    public function upvoteExists($object, $user)
    {
        $builder = $this->createQueryBuilder('upvote');
        $builder
            ->where('upvote.object = :object')
            ->andWhere('upvote.user = :user')
            ->setParameter('object', $object)
            ->setParameter('user', $user)
        ;

        $upvote = $builder->getQuery()->getOneOrNullResult();

        return ($upvote !== null);
    }
}
