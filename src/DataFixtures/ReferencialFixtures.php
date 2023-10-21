<?php

namespace App\DataFixtures;

use App\Factory\ReferencialFactory;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class ReferencialFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        foreach (file(__DIR__.'/data/code.txt', FILE_IGNORE_NEW_LINES) as $value) {
            ReferencialFactory::createOne(['code' => $value]);
        }
    }
}
