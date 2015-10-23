<?php

namespace App\Domain\Command;

/**
 * A service used to handle a single type of command
 */
interface HandlerInterface
{
    /**
     * Handle the given command
     *
     * @param CommandInterface $command
     */
    public function handle(CommandInterface $command);

    /**
     * Get the name of the command resolved by this handler
     *
     * @return string
     */
    public function getNameResolved();
}
