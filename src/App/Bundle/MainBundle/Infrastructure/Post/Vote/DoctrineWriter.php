<?php

namespace App\Bundle\MainBundle\Infrastructure\Post\Vote;

use App\Bundle\MainBundle\Entity\Post\Vote\Upvote\Upvote as UpvoteEntity;
use App\Bundle\MainBundle\Events\Post\Vote\VoteEvents;
use App\Bundle\MainBundle\Events\Post\Vote\UpvotedEvent;
use App\Domain\Vote\Exceptions\UpvoteFailedException;
use App\Domain\Vote\WriterInterface;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;

/**
 * Write, edit and delete upvotes using Doctrine
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
     * The service used to convert upvotes from entities
     *
     * @var EntityConverter
     */
    private $converter;

    /**
     * The Symfony event dispatcher
     *
     * @var EventDispatcherInterface
     */
    private $eventDispatcher;

    /**
     * __construct
     *
     * @param EntityManagerInterface   $entityManager
     * @param EntityConverter          $converter
     * @param EventDispatcherInterface $eventDispatcher
     */
    public function __construct(
        EntityManagerInterface $entityManager,
        EntityConverter $converter,
        EventDispatcherInterface $eventDispatcher
    ) {
        $this->entityManager   = $entityManager;
        $this->converter       = $converter;
        $this->eventDispatcher = $eventDispatcher;
    }

    /**
     * {@inheritdoc}
     */
    public function upvote($object, $user, \DateTime $date)
    {
        if ($this->getRepository()->upvoteExists($object, $user)) {
            throw new UpvoteFailedException(sprintf('User \'%s\' cannot upvote the object "%s".', $user, $object));
        }

        $entity = new UpvoteEntity();
        $entity
            ->setObject($object)
            ->setUser($user)
            ->setCreatedAt($date)
        ;
        $this->getRepository()->save($entity);

        $event = new UpvotedEvent($this->converter->from($entity));
        $this->eventDispatcher->dispatch(VoteEvents::UPVOTED, $event);
    }

    /**
     * Retrieve the upvote entity repository
     *
     * @return \App\Bundle\MainBundle\Entity\Post\Vote\Upvote\UpvoteRepository
     */
    private function getRepository()
    {
        return $this->entityManager->getRepository('AppMainBundle:Post\Vote\Upvote\Upvote');
    }
}
