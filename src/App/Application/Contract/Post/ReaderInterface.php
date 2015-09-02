<?php

namespace App\Application\Contract\Post;

/**
 * Read the post list from a storage engine
 */
interface ReaderInterface
{
    /**
     * List posts
     *
     * @param $number The page number
     *
     * @return Post[]
     */
    public function page($number);
}
