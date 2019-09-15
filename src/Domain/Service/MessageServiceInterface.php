<?php

namespace App\Domain\Service;

use Symfony\Component\Messenger\MessageBusInterface;

interface MessageServiceInterface
{
    /**
     * @param MessageBusInterface $commandBus
     * @param MessageBusInterface $queryBus
     * @param MessageBusInterface $eventBus
     */
    public function __construct(
        MessageBusInterface $commandBus,
        MessageBusInterface $queryBus,
        MessageBusInterface $eventBus
    );
}