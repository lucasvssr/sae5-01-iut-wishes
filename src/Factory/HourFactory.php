<?php

namespace App\Factory;

use App\Entity\Hour;
use App\Repository\HourRepository;
use Zenstruck\Foundry\ModelFactory;
use Zenstruck\Foundry\Proxy;
use Zenstruck\Foundry\RepositoryProxy;

/**
 * @extends ModelFactory<Hour>
 *
 * @method        Hour|Proxy                     create(array|callable $attributes = [])
 * @method static Hour|Proxy                     createOne(array $attributes = [])
 * @method static Hour|Proxy                     find(object|array|mixed $criteria)
 * @method static Hour|Proxy                     findOrCreate(array $attributes)
 * @method static Hour|Proxy                     first(string $sortedField = 'id')
 * @method static Hour|Proxy                     last(string $sortedField = 'id')
 * @method static Hour|Proxy                     random(array $attributes = [])
 * @method static Hour|Proxy                     randomOrCreate(array $attributes = [])
 * @method static HourRepository|RepositoryProxy repository()
 * @method static Hour[]|Proxy[]                 all()
 * @method static Hour[]|Proxy[]                 createMany(int $number, array|callable $attributes = [])
 * @method static Hour[]|Proxy[]                 createSequence(iterable|callable $sequence)
 * @method static Hour[]|Proxy[]                 findBy(array $attributes)
 * @method static Hour[]|Proxy[]                 randomRange(int $min, int $max, array $attributes = [])
 * @method static Hour[]|Proxy[]                 randomSet(int $number, array $attributes = [])
 */
final class HourFactory extends ModelFactory
{
    /**
     * @see https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html#factories-as-services
     *
     * @todo inject services if required
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * @see https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html#model-factories
     *
     * @todo add your default values here
     */
    protected function getDefaults(): array
    {
        return [
            'course' => CourseFactory::random(),
            'nbHours' => self::faker()->numberBetween(1, 10),
            'week' => WeekFactory::random(),
        ];
    }

    /**
     * @see https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html#initialization
     */
    protected function initialize(): self
    {
        return $this
            // ->afterInstantiate(function(Hour $hour): void {})
        ;
    }

    protected static function getClass(): string
    {
        return Hour::class;
    }
}
