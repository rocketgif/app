<?php

namespace App\Domain\Command;

/**
 * The service used to execute commands through command handlers
 */
interface BusInterface
{
    /**
     * Launch the given command using a single known command handler
     *
     * @param CommandInterface $command
     */
    public function launch(CommandInterface $command);
}
