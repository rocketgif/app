<?php

namespace App\Bundle\MainBundle\Infrastructure\Submission;

use App\Bundle\MainBundle\Entity\Submission as SubmissionEntity;
use App\Domain\Submission\Submission;

/**
 * Convert submissions from/to entities
 */
class EntityConverter
{
    /**
     * Instanciate a submission from the given entity
     *
     * @param SubmissionEntity $entity
     *
     * @return Submission
     */
    public function from(SubmissionEntity $entity)
    {
        $submission = new Submission(
            $entity->getTitle(),
            $entity->getGfycatKey(),
            $entity->getCreatedAt(),
            $entity->getBaseUrl(),
            $entity->getAuthor()
        );
        $submission->setIdentifier($entity->getIdentifier());

        return $submission;
    }

    /**
     * Compute data from the given submission in the given submission entity
     *
     * @param Submission       $submission
     * @param SubmissionEntity $entity
     */
    public function computeTo(Submission $submission, SubmissionEntity $entity)
    {
        $entity
            ->setTitle($submission->getTitle())
            ->setAuthor($submission->getAuthor())
            ->setGfycatKey($submission->getGfycatKey())
            ->setBaseUrl($submission->getBaseUrl())
            ->setCreatedAt($submission->getCreatedAt())
        ;
    }
}
