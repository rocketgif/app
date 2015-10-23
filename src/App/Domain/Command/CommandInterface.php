<?php

namespace App\Domain\Command;

/**
 * A command to be executed by a command handler
 */
interface CommandInterface
{
    /**
     * Get the unique name of this command
     *
     * @return string
     */
    public function getName();
}
