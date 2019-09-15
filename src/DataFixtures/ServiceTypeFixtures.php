<?php

namespace App\DataFixtures;

use App\Entity\Booking\Hairdresser;
use App\Entity\Booking\ServiceType;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class ServiceTypeFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $serviceType1 = new ServiceType();
        $serviceType1->setName('Men\'s haircut');
        $serviceType1->setDuration(30);
        $manager->persist($serviceType1);

        $serviceType2 = new ServiceType();
        $serviceType2->setName('Woman\'s haircut');
        $serviceType2->setDuration(60);
        $manager->persist($serviceType2);

        $manager->flush();
    }
}
