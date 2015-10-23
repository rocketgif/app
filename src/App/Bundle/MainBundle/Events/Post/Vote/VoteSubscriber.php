<?php

namespace App\Bundle\MainBundle\Events\Post\Vote;

use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

/**
 * Listen to event concerning votes
 */
class VoteSubscriber implements EventSubscriberInterface
{
    /**
     * The Doctrine entity manager
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
    public static function getSubscribedEvents()
    {
        return [
            VoteEvents::UPVOTED => 'onUpvote',
        ];
    }

    /**
     * Compile each new upvote in the compiled vote table
     *
     * @param UpvotedEvent $event
     */
    public function onUpvote(UpvotedEvent $event)
    {
        $upvote = $event->getUpvote();

        $this->getRepository()->addUpvote($upvote->getObject());
    }

    /**
     * Retrieve the compiled vote entity repository
     *
     * @return \App\Bundle\MainBundle\Entity\Post\Vote\Upvote\CompiledRepository
     */
    private function getRepository()
    {
        return $this->entityManager->getRepository('AppMainBundle:Post\Vote\Upvote\Compiled');
    }
}
