<?php

namespace App\Domain\Post;

/**
 * Read the post list from a storage engine
 */
interface ReaderInterface
{
    /**
     * Retrieve an array of posts having the given identifiers, indexed by
     * identifier
     *
     * @param int[]
     *
     * @return Post[]
     */
    public function find(array $identifiers);

    /**
     * Retrieve an array of posts
     *
     * @return Post[]
     */
    public function findAll();
}
