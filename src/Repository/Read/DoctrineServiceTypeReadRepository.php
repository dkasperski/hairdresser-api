<?php

namespace App\Repository\Read;

use App\Entity\Booking\ServiceType;
use Doctrine\ORM\EntityManagerInterface;

class DoctrineServiceTypeReadRepository
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
     * @param int $serviceTypeId
     * @return ServiceType|null
     */
    public function getById(int $serviceTypeId): ?ServiceType
    {
        return $this->em->find('App\Entity\Booking\ServiceType', $serviceTypeId);
    }
}