<?php

namespace App\Repository\Write;

use App\Entity\Booking\Booking;

interface DoctrineWriteRepository
{
    /**
     * @param Booking $booking
     * @return bool
     */
    public function save(Booking $booking) :bool;
}