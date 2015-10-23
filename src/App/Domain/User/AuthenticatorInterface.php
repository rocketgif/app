<?php

namespace App\Domain\User;

/**
 * Authenticate users on the application
 */
interface AuthenticatorInterface
{
    /**
     * Get the current connected user's unique identifier
     *
     * @return string|null
     */
    public function getUser();

    /**
     * Connect a new user and return it's unique identifier
     *
     * @return string
     */
    public function createUser();
}
