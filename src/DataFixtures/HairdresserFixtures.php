<?php

namespace App\DataFixtures;

use App\Entity\Booking\Hairdresser;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class HairdresserFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $hairdresser1 = new Hairdresser();
        $hairdresser1->setName('Hairdresser #1');
        $manager->persist($hairdresser1);

        $hairdresser2 = new Hairdresser();
        $hairdresser2->setName('Hairdresser #2');
        $manager->persist($hairdresser2);

        $manager->flush();
    }
}
