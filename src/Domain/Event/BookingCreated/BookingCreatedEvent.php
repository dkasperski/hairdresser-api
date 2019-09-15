<?php

namespace App\Domain\Event\BookingCreated;

use Symfony\Contracts\EventDispatcher\Event;

class BookingCreatedEvent extends Event
{
    public const NAME = 'booking.created';

    /**
     * @var Context
     */
    protected $context;

    /**
     * @param Context $context
     */
    public function __construct(Context $context)
    {
        $this->context = $context;
    }

    /**
     * @return Context
     */
    public function getContext()
    {
        return $this->context;
    }
}