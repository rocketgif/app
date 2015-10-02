<?php

namespace App\Bundle\MainBundle\Infrastructure\Clock;

use App\Domain\Clock\ClockInterface;

/**
 * A clock using PHP DateTime
 */
class Clock implements ClockInterface
{
    /**
     * {@inheritdoc}
     */
    public function now()
    {
        return new \DateTime();
    }
}
