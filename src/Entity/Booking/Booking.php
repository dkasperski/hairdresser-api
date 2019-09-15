<?php

namespace App\Entity\Booking;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity
 * @ORM\Table(name="booking")
 */
class Booking
{
    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=180)
     * @Assert\NotBlank()
     */
    private $email;

    /**
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    private $phone;

    /**
     * @ORM\Column(type="datetime", name="starts_at", nullable=false)
     */
    private $startsAt;

    /**
     * @ORM\Column(type="datetime", name="ends_at", nullable=false)
     */
    private $endsAt;

    /**
     * @ORM\ManyToOne(targetEntity="Hairdresser", inversedBy="bookings")
     * @ORM\JoinColumn(name="hairdresser_id", referencedColumnName="id", nullable=false)
     */
    private $hairdresser;

    /**
     * @ORM\ManyToOne(targetEntity="ServiceType", inversedBy="bookings")
     * @ORM\JoinColumn(name="service_type_id", referencedColumnName="id", nullable=false)
     */
    private $serviceType;

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
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * @param string $email
     * @return $this
     */
    public function setEmail(string $email)
    {
        $this->email = $email;
        return $this;
    }

    /**
     * @return string
     */
    public function getPhone(): string
    {
        return $this->phone;
    }

    /**
     * @param string $phone
     * @return $this
     */
    public function setPhone(string $phone)
    {
        $this->phone = $phone;
        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getStartsAt(): \DateTime
    {
        return $this->startsAt;
    }

    /**
     * @param \DateTime $startsAt
     * @return $this
     */
    public function setStartsAt(\DateTime $startsAt)
    {
        $this->startsAt = $startsAt;
        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getEndsAt(): \DateTime
    {
        return $this->endsAt;
    }

    /**
     * @param \DateTime $endsAt
     * @return $this
     */
    public function setEndsAt(\DateTime $endsAt)
    {
        $this->endsAt = $endsAt;
        return $this;
    }

    /**
     * @return Hairdresser
     */
    public function getHairdresser(): Hairdresser
    {
        return $this->hairdresser;
    }

    /**
     * @param Hairdresser $hairdresser
     * @return $this
     */
    public function setHairdresser(Hairdresser $hairdresser)
    {
        $this->hairdresser = $hairdresser;
        return $this;
    }

    /**
     * @return ServiceType
     */
    public function getServiceType(): ServiceType
    {
        return $this->serviceType;
    }

    /**
     * @param ServiceType $serviceType
     * @return $this
     */
    public function setServiceType(ServiceType $serviceType)
    {
        $this->serviceType = $serviceType;
        return $this;
    }
}