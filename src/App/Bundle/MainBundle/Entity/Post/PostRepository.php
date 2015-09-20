<?php

namespace App\Bundle\MainBundle\Entity\Post;

use Doctrine\ORM\EntityRepository;

/**
 * PostRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class PostRepository extends EntityRepository
{
    /**
     * Retrieve posts having the given identifiers
     *
     * @param int[] $identifiers
     *
     * @return Post[]
     */
    public function findCollection(array $identifiers)
    {
        $builder = $this->createQueryBuilder('post');
        $builder
            ->where('post.identifier IN (:identifiers)')
            ->setParameter('identifiers', $identifiers)
        ;

        return $builder->getQuery()->getResult();
    }

    /**
     * Retrieve posts identifiers ordered by creation date DESC, for the given
     * limit and offset
     *
     * @param int $limit
     * @param int $offset
     *
     * @return int[]
     */
    public function paginateByDate($limit, $offset = 0)
    {
        $builder = $this->createQueryBuilder('post');
        $builder
            ->select('post.identifier')
            ->orderBy('post.createdAt', 'DESC')
            ->setFirstResult($offset)
            ->setMaxResults($limit)
        ;

        $arrayResult = $builder->getQuery()->getScalarResult();

        $result = [];
        foreach ($arrayResult as $array) {
            $result[] = (int)$array['identifier'];
        }

        return $result;
    }
}