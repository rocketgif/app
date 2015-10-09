<?php

namespace App\Domain\Post\Resolver;

/**
 * Transform URLs given by users to clean gif URLs
 */
interface ResolverInterface
{
    /**
     * Retrieve a unique key from a user-submitted URL
     *
     * @param string $url
     *
     * @return Video
     */
    public function resolve($url);
}
