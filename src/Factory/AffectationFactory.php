<?php

namespace App\Factory;

use App\Entity\Affectation;
use App\Repository\AffectationRepository;
use Zenstruck\Foundry\ModelFactory;
use Zenstruck\Foundry\Proxy;
use Zenstruck\Foundry\RepositoryProxy;

/**
 * @extends ModelFactory<Affectation>
 *
 * @method        Affectation|Proxy                     create(array|callable $attributes = [])
 * @method static Affectation|Proxy                     createOne(array $attributes = [])
 * @method static Affectation|Proxy                     find(object|array|mixed $criteria)
 * @method static Affectation|Proxy                     findOrCreate(array $attributes)
 * @method static Affectation|Proxy                     first(string $sortedField = 'id')
 * @method static Affectation|Proxy                     last(string $sortedField = 'id')
 * @method static Affectation|Proxy                     random(array $attributes = [])
 * @method static Affectation|Proxy                     randomOrCreate(array $attributes = [])
 * @method static AffectationRepository|RepositoryProxy repository()
 * @method static Affectation[]|Proxy[]                 all()
 * @method static Affectation[]|Proxy[]                 createMany(int $number, array|callable $attributes = [])
 * @method static Affectation[]|Proxy[]                 createSequence(iterable|callable $sequence)
 * @method static Affectation[]|Proxy[]                 findBy(array $attributes)
 * @method static Affectation[]|Proxy[]                 randomRange(int $min, int $max, array $attributes = [])
 * @method static Affectation[]|Proxy[]                 randomSet(int $number, array $attributes = [])
 */
final class AffectationFactory extends ModelFactory
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
            'nbGroups' => self::faker()->randomNumber(),
            'teacher' => UserFactory::random(),
        ];
    }

    /**
     * @see https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html#initialization
     */
    protected function initialize(): self
    {
        return $this
            // ->afterInstantiate(function(Affectation $affectation): void {})
        ;
    }

    protected static function getClass(): string
    {
        return Affectation::class;
    }
}
