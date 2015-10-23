<?php

namespace App\Bundle\MainBundle\Infrastructure\Post\Vote;

use App\Bundle\MainBundle\Entity\Post\Vote\Upvote\Upvote as UpvoteEntity;
use App\Domain\Vote\Upvote;

/**
 * Convert upvotes from/to entities
 */
class EntityConverter
{
    /**
     * Instanciate an upvote from the given entity
     *
     * @param UpvoteEntity $entity
     *
     * @return Upvote
     */
    public function from(UpvoteEntity $entity)
    {
        $upvote = new Upvote(
            $entity->getObject(),
            $entity->getUser(),
            $entity->getCreatedAt()
        );

        return $upvote;
    }
}
