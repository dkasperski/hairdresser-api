<?php

namespace App\Domain\Event\BookingCreated;

class BookingListener
{
    /**
     * @param BookingCreatedEvent $event
     */
    public function onBookingCreate(BookingCreatedEvent $event)
    {
        dump($event);die;
    }
}