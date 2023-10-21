<?php

namespace App\DataFixtures;

use App\Factory\CourseFactory;
use App\Factory\SubjectFactory;
use App\Factory\TypeFactory;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class CourseFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        $subjects = count(SubjectFactory::repository()->findAll()) * 2;

        $existingCombinations = [];

        CourseFactory::createMany($subjects, function () use (&$existingCombinations) {
            do {
                $subject = SubjectFactory::random();
                $type = TypeFactory::random();
                $combination = $subject->getId().'-'.$type->getId();
            } while (in_array($combination, $existingCombinations));

            $existingCombinations[] = $combination;

            return [
                'subject' => $subject,
                'type' => $type,
            ];
        });
    }

    public function getDependencies()
    {
        return [
            SubjectFixtures::class,
            TypeFixtures::class,
        ];
    }
}
