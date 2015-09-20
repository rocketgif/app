<?php

namespace App\Domain\Post\Lister;

/**
 * The service used to retrieve the order of all elements of a paginated list
 */
interface ListerInterface
{
    /**
     * Retrieve the array of elements for the given page, indexed by their
     * position
     *
     * @param int $numberPerPage
     * @param int $page
     *
     * @return Element[]
     */
    public function get($numberPerPage, $page = 1);
}
