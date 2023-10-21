<?php

namespace App\DataFixtures;

use App\Factory\CourseFactory;
use App\Factory\HourFactory;
use App\Factory\WeekFactory;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class HourFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        $existingCombinations = [];
        for ($i = 0; $i < 50; ++$i) {
            do {
                $course = CourseFactory::random();
                $week = WeekFactory::random();
                $combination = $course->getId().'-'.$week->getId();
            } while (in_array($combination, $existingCombinations));

            $existingCombinations[] = $combination;
            HourFactory::createOne([
                'course' => $course,
                'week' => $week,
            ]);
        }
    }

    public function getDependencies(): array
    {
        return [
            CourseFixtures::class,
            WeekFixtures::class,
        ];
    }
}
