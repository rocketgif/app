<?php

namespace App\Application\Contract\Post;

use App\Domain\Post;

/**
 * The service to perform write, edit and delete operations about posts on the
 * database
 */
interface WriterInterface
{
    /**
     * Add a given post
     *
     * @param Post $post
     */
    public function add(Post $post);
}
