<?php

namespace App\DataFixtures;

use App\Factory\CategoryFactory;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class CategoryFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $categories = ['Math', 'English', 'Computer Science', 'Algo', 'Web development', 'Database', 'Other'];

        foreach ($categories as $category) {
            CategoryFactory::createOne(['name' => $category]);
        }
    }
}
