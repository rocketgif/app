<?php

namespace App\Bundle\MainBundle\Infrastructure\User;

use App\Domain\User\AuthenticatorInterface;
use Rhumsaa\Uuid\Uuid;
use Symfony\Component\HttpFoundation\Session\Session;

/**
 * An authenticator using PHP session
 */
class SessionAuthenticator implements AuthenticatorInterface
{
    /**
     * The key used to store the user identifier in session
     */
    const IDENTIFIER_KEY = 'user_identifier';

    /**
     * The current PHP session
     *
     * @var Session
     */
    private $session;

    /**
     * __construct
     *
     * @param Session $session
     */
    public function __construct(Session $session)
    {
        $this->session = $session;
    }

    /**
     * {@inheritdoc}
     */
    public function getUser()
    {
        return $this->session->get(self::IDENTIFIER_KEY, null);
    }

    /**
     * {@inheritdoc}
     */
    public function createUser()
    {
        $identifier = $this->generateUuid();

        $this->session->set(self::IDENTIFIER_KEY, $identifier);

        return $identifier;
    }

    /**
     * Generate an almost unique unique identifier
     */
    private function generateUuid()
    {
        return Uuid::uuid1()->toString();
    }
}
