<?php

namespace App\Domain\Service;

use App\Domain\Command\CreateBookingCommand;
use App\Domain\Event\BookingCreated\BookingCreatedEvent;
use App\Domain\Event\BookingCreated\Context;
use Symfony\Component\Messenger\MessageBusInterface;

class BookingService implements MessageServiceInterface
{
    /**
     * @var MessageBusInterface
     */
    private $commandBus;

    /**
     * @var MessageBusInterface
     */
    private $queryBus;

    /**
     * @var MessageBusInterface
     */
    private $eventBus;

    /**
     * @param MessageBusInterface $commandBus
     * @param MessageBusInterface $queryBus
     * @param MessageBusInterface $eventBus
     */
    public function __construct(
        MessageBusInterface $commandBus,
        MessageBusInterface $queryBus,
        MessageBusInterface $eventBus
    ) {
        $this->commandBus = $commandBus;
        $this->queryBus = $queryBus;
        $this->eventBus = $eventBus;
    }

    /**
     * @param array $data
     */
    public function create(array $data)
    {
        $this->commandBus->dispatch(
            new CreateBookingCommand($data)
        );

        $this->eventBus->dispatch(new BookingCreatedEvent(
            new Context($data)
        ));
    }
}