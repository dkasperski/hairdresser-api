<?php

namespace App\Repository\Read;

use App\Entity\Booking\Hairdresser;
use Doctrine\ORM\EntityManagerInterface;

class DoctrineHairdresserReadRepository
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
     * @param int $hairdresserId
     * @return Hairdresser|null
     */
    public function getById(int $hairdresserId): ?Hairdresser
    {
        return $this->em->find('App\Entity\Booking\Hairdresser', $hairdresserId);
    }
}