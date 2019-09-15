<?php

namespace App\Domain\CommandHandler;

use App\Domain\Command\CreateBookingCommand;
use App\Entity\Booking\BookingFactory;
use App\Repository\Write\DoctrineWriteRepository;
use Symfony\Component\Messenger\Handler\MessageHandlerInterface;

class CreateBookingCommandHandler implements MessageHandlerInterface
{
    /**
     * @var BookingFactory
     */
    private $bookingFactory;

    /**
     * @var DoctrineWriteRepository
     */
    private $doctrineWriteRepository;

    /**
     * @param BookingFactory $bookingFactory
     * @param DoctrineWriteRepository $doctrineWriteRepository
     */
    public function __construct(
        BookingFactory $bookingFactory,
        DoctrineWriteRepository $doctrineWriteRepository
    ) {
        $this->bookingFactory = $bookingFactory;
        $this->doctrineWriteRepository = $doctrineWriteRepository;
    }

    /**
     * @param CreateBookingCommand $createBookingCommand
     *
     * @throws \Exception
     */
    public function __invoke(CreateBookingCommand $createBookingCommand)
    {
        $booking = $this->bookingFactory->create($createBookingCommand);

        if (!$booking) {
            throw new \Exception('Booking creation failure');
        }

        $this->doctrineWriteRepository->save($booking);
    }
}