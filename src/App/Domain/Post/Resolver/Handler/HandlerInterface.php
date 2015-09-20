<?php

namespace App\Domain\Post\Resolver\Handler;

use App\Domain\Post;

/**
 * A service testing URLs to fetch clean gif keys
 */
interface HandlerInterface
{
    /**
     * Retrieve a clean gif unique key from the given URL. Throw an
     * InvalidUrlException when the URL is not usable by this handler
     *
     * @param string $url
     *
     * @return string
     *
     * @throws \App\Domain\Post\Resolver\Exception\InvalidUrlException
     */
    public function resolve($url);
}
