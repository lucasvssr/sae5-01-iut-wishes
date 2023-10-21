<?php

namespace App\DataFixtures;

use App\Factory\UserFactory;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class UserFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        UserFactory::createOne([
            'login' => 'admin',
            'roles' => ['ROLE_ADMIN'],
        ]);

        UserFactory::createOne([
            'login' => 'tenured',
            'roles' => ['ROLE_TENURED'],
        ]);

        UserFactory::createOne([
            'login' => 'admin_tenured',
            'roles' => ['ROLE_ADMIN', 'ROLE_TENURED'],
        ]);

        UserFactory::createMany(50, function () {
            if (UserFactory::faker()->boolean(20)) {
                return [
                    'roles' => ['ROLE_ADMIN', 'ROLE_TENURED'],
                ];
            } elseif (UserFactory::faker()->boolean(20)) {
                return [
                    'roles' => ['ROLE_REPLACEMENT'],
                ];
            } elseif (UserFactory::faker()->boolean(20)) {
                return [
                    'roles' => ['ROLE_RESEARCHER'],
                ];
            } else {
                return [
                    'roles' => ['ROLE_TENURED'],
                ];
            }
        });
    }
}
