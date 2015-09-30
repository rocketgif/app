<?php

namespace App\Domain\Clock;

/**
 * A clock used to retrieve datetimes
 */
interface ClockInterface
{
    /**
     * Retrieve the current time
     *
     * @return \DateTime
     */
    public function now();
}
