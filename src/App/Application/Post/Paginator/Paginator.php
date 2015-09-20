<?php

namespace App\Application\Post\Paginator;

use App\Domain\Post\Lister\ListerInterface;
use App\Domain\Post\ReaderInterface;

/**
 * Retrieve paginated posts
 */
class Paginator
{
    const NUMBER_PER_PAGE = 5;

    /**
     * The service used to retrieve an ordered list of post identifiers
     *
     * @var ListerInterface $lister
     */
    private $lister;

    /**
     * The service used to retrieve posts from a given list of identifiers
     *
     * @var ReaderInterface $reader
     */
    private $reader;

    /**
     * __construct
     *
     * @param ListerInterface $lister
     * @param ReaderInterface $reader
     */
    public function __construct(ListerInterface $lister, ReaderInterface $reader)
    {
        $this->lister = $lister;
        $this->reader = $reader;
    }

    /**
     * Retrieve ordered posts for the given page number
     *
     * @param int $page
     *
     * @return \App\Domain\Post[]
     */
    public function page($page)
    {
        $identifiers  = $this->lister->get(self::NUMBER_PER_PAGE, $page);
        $posts        = $this->reader->find($identifiers);
        $orderedPosts = $this->getOrderedPosts($identifiers, $posts);

        return $orderedPosts;
    }

    /**
     * Construct the list of ordered posts using ordered identifiers to get the
     * order and posts to get objects
     *
     * @param int[]              $identifiers
     * @param \App\Domain\Post[] $posts
     *
     * @return \App\Domain\Post[]
     */
    private function getOrderedPosts(array $identifiers, array $posts)
    {
        $orderedPosts = [];

        foreach ($identifiers as $identifier) {
            $orderedPosts[] = $posts[$identifier];
        }

        return $orderedPosts;
    }
}
