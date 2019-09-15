<?php

namespace App\Repository\Write;

use App\Entity\Booking\Booking;
use Doctrine\ORM\EntityManagerInterface;

class BookingDoctrineWriteRepository implements DoctrineWriteRepository
{
    /**
     * @var EntityManagerInterface $em
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
     * @param Booking $booking
     * @return bool
     */
    public function save(Booking $booking) : bool
    {
        try {
            $this->em->persist($booking);
            $this->em->flush();
        } catch (\Exception $e) {
            return false;
        }

        return true;
    }
}