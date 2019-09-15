<?php

namespace App\Entity\Booking;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\DBAL\Types\ArrayType;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity
 * @ORM\Table(name="hairdresser")
 */
class Hairdresser
{
    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=100)
     * @Assert\NotBlank()
     *
     */
    private $name;

    /**
     * @ORM\OneToMany(targetEntity="Booking", mappedBy="hairdresser")
     */
    private $bookings;

    /**
     * Hairdresser constructor.
     */
    public function __construct()
    {
        $this->bookings = new ArrayCollection();
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return $this
     */
    public function setName(string $name)
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return Booking[]
     */
    public function getBookings(): iterable
    {
        return $this->bookings;
    }

    /**
     * @param Booking $booking
     * @return $this
     */
    public function addBooking(Booking $booking)
    {
        $this->bookings->add($booking);
        return $this;
    }

    /**
     * @param Booking $booking
     * @return $this
     */
    public function removeBooking(Booking $booking)
    {
        $this->bookings->remove($booking);
        return $this;
    }
}