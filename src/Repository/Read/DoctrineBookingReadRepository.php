<?php

namespace App\Repository\Read;

use App\Entity\Booking\Booking;
use Doctrine\ORM\EntityManagerInterface;

class DoctrineBookingReadRepository
{
    /**
     * @var EntityManagerInterface
     */
    private $em;

    /**
     * @param EntityManagerInterface $em
     */
    public function __construct(EntityManagerInterface $em)
    {
        $this->em = $em;
    }

    /**
     * @param int $bookingId
     * @return Booking|null
     */
    public function getById(int $bookingId): ?Booking
    {
        return $this->em->find('App\Entity\Booking\Booking', $bookingId);
    }
}