<?php

namespace App\DataFixtures;

use App\Factory\WishFactory;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class WishFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        WishFactory::createMany(50);
    }

    public function getDependencies(): array
    {
        return [
            CourseFixtures::class,
            UserFixtures::class,
        ];
    }
}
