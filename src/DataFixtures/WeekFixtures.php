<?php

namespace App\DataFixtures;

use App\Factory\WeekFactory;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class WeekFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        for ($i = 36; $i <= 52; ++$i) {
            WeekFactory::createOne(['number' => $i]);
        }
    }

    public function getDependencies()
    {
        return [
            SemesterFixtures::class,
        ];
    }
}
