<?php

namespace App\Domain\Command;

/**
 * A simple implementation of the bus interface registering handlers using its
 * constructor
 */
class Bus implements BusInterface
{
    /**
     * The associative array of known handlers
     *
     * @var HandlerInterface[]
     */
    private $handlers;

    /**
     * __construct
     *
     * @param HandlerInterface[] $handlers
     */
    public function __construct(array $handlers)
    {
        foreach ($handlers as $handler) {
            $this->handlers[$handler->getNameResolved()] = $handler;
        }
    }

    /**
     * {@inheritdoc}
     */
    public function launch(CommandInterface $command)
    {
        $name = $command->getName();

        if (array_key_exists($name, $this->handlers)) {
            $handler = $this->handlers[$name];

            $handler->handle($command);
        }
    }
}
