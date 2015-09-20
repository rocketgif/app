<?php

namespace App\Domain\Post\Resolver;

use App\Domain\Post;
use App\Domain\Post\Resolver\Exception\InvalidUrlException;

/**
 * An implementation of the ResolverInterface using a list of known
 * handlers, each testing the given URL to fetch data
 */
class BusResolver implements ResolverInterface
{
    /**
     * The list of known URL handlers
     *
     * @var \App\Domain\Post\Resolver\Handler\HandlerInterface[]
     */
    private $handlers;

    /**
     * __construct
     *
     * @param \App\Domain\Post\Resolver\Handler\HandlerInterface[] $handlers
     */
    public function __construct(array $handlers)
    {
        $this->handlers = $handlers;
    }

    /**
     * {@inheritdoc}
     */
    public function resolve($url)
    {
        foreach ($this->handlers as $handler) {
            try {
                return $handler->resolve($url);
                break;
            } catch (InvalidUrlException $exception) {
            }
        }

        throw new InvalidUrlException(sprintf(
            'Unable to retrieve a correct gif URL from the URL "%s".',
            $url
        ));
    }
}
