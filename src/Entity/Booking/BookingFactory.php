<?php

namespace App\Entity\Booking;

use App\Domain\Command\CreateBookingCommand;
use App\Repository\Read\DoctrineHairdresserReadRepository;
use App\Repository\Read\DoctrineServiceTypeReadRepository;
use App\Repository\Read\DoctrineReadRepository;
use Doctrine\DBAL\Connection;
use Doctrine\ORM\EntityManagerInterface;

class BookingFactory
{
    /**
     * @var Connection
     */
    private $connection;

    /**
     * @var EntityManagerInterface
     */
    private $em;

    /**
     * @param Connection $connection
     * @param EntityManagerInterface $em
     */
    public function __construct(Connection $connection, EntityManagerInterface $em)
    {
        $this->connection = $connection;
        $this->em = $em;
    }

    /**
     * @var DoctrineReadRepository
     */
    private $doctrineRepository;

    /**
     * @param CreateBookingCommand $createBookingCommand
     * @return Booking
     * @toDo add validation
     * @toDo add query to fetch hairdresser and serviceType
     */
    public function create(CreateBookingCommand $createBookingCommand): Booking
    {
        $bookingData = $createBookingCommand->getData();

        $doctrineHairdresserReadRepository = new DoctrineHairdresserReadRepository($this->em);
        $hairdresser = $doctrineHairdresserReadRepository->getById($bookingData['hairdresser_id']);

        $doctrineServiceTypeReadRepository = new DoctrineServiceTypeReadRepository($this->em);
        $serviceType = $doctrineServiceTypeReadRepository->getById($bookingData['service_type_id']);

        $booking = new Booking();
        $booking
            ->setEmail($bookingData['email'])
            ->setPhone($bookingData['phone'])
            ->setStartsAt(new \DateTime($bookingData['starts_at']))
            ->setEndsAt(new \DateTime($bookingData['ends_at']))
            ->setHairdresser($hairdresser)
            ->setServiceType($serviceType)
        ;

        return $booking;
    }
}