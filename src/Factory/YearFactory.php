<?php

namespace App\Factory;

use App\Entity\Year;
use App\Repository\YearRepository;
use Zenstruck\Foundry\ModelFactory;
use Zenstruck\Foundry\Proxy;
use Zenstruck\Foundry\RepositoryProxy;

/**
 * @extends ModelFactory<Year>
 *
 * @method        Year|Proxy                     create(array|callable $attributes = [])
 * @method static Year|Proxy                     createOne(array $attributes = [])
 * @method static Year|Proxy                     find(object|array|mixed $criteria)
 * @method static Year|Proxy                     findOrCreate(array $attributes)
 * @method static Year|Proxy                     first(string $sortedField = 'id')
 * @method static Year|Proxy                     last(string $sortedField = 'id')
 * @method static Year|Proxy                     random(array $attributes = [])
 * @method static Year|Proxy                     randomOrCreate(array $attributes = [])
 * @method static YearRepository|RepositoryProxy repository()
 * @method static Year[]|Proxy[]                 all()
 * @method static Year[]|Proxy[]                 createMany(int $number, array|callable $attributes = [])
 * @method static Year[]|Proxy[]                 createSequence(iterable|callable $sequence)
 * @method static Year[]|Proxy[]                 findBy(array $attributes)
 * @method static Year[]|Proxy[]                 randomRange(int $min, int $max, array $attributes = [])
 * @method static Year[]|Proxy[]                 randomSet(int $number, array $attributes = [])
 */
final class YearFactory extends ModelFactory
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
            'endYear' => self::faker()->dateTimeThisYear('+9 month'),
            'limitDate' => self::faker()->dateTimeThisMonth('+1 month'),
            'startYear' => self::faker()->dateTimeThisMonth(),
        ];
    }

    /**
     * @see https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html#initialization
     */
    protected function initialize(): self
    {
        return $this
            // ->afterInstantiate(function(Year $year): void {})
        ;
    }

    protected static function getClass(): string
    {
        return Year::class;
    }
}
