<?php

namespace App\DataFixtures;

use App\Factory\TypeFactory;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class TypeFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $types = [
            'CM',
            'TD',
            'TDM',
            'TP',
        ];

        foreach ($types as $type) {
            TypeFactory::createOne([
                'name' => $type,
            ]);
        }
    }
}
