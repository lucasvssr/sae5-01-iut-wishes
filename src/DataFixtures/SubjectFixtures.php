<?php

namespace App\DataFixtures;

use App\Factory\CategoryFactory;
use App\Factory\ReferencialFactory;
use App\Factory\SubjectFactory;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class SubjectFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        $codes = ReferencialFactory::repository()->findAll();
        $categories = CategoryFactory::repository()->findAll();

        foreach (file(__DIR__.'/data/subject.txt', FILE_IGNORE_NEW_LINES) as $value) {
            $randomCode = $codes[array_rand($codes)];

            $randomCategories = [];
            for ($i = 0; $i < rand(1, count($categories)); ++$i) {
                $randomCategories[] = $categories[$i];
            }

            SubjectFactory::createOne(['name' => trim($value), 'referencials' => [$randomCode], 'categories' => $randomCategories]);
        }
    }

    public function getDependencies(): array
    {
        return [
            ReferencialFixtures::class,
            CategoryFixtures::class,
        ];
    }
}
