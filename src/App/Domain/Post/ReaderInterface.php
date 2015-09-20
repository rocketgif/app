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
     * @return \App\Domain\Post[]
     */
    public function find(array $identifiers);
}
