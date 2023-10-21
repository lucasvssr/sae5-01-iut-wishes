<?php

namespace App\Factory;

use App\Entity\Referencial;
use App\Repository\ReferencialRepository;
use Zenstruck\Foundry\ModelFactory;
use Zenstruck\Foundry\Proxy;
use Zenstruck\Foundry\RepositoryProxy;

/**
 * @extends ModelFactory<Referencial>
 *
 * @method        Referencial|Proxy                     create(array|callable $attributes = [])
 * @method static Referencial|Proxy                     createOne(array $attributes = [])
 * @method static Referencial|Proxy                     find(object|array|mixed $criteria)
 * @method static Referencial|Proxy                     findOrCreate(array $attributes)
 * @method static Referencial|Proxy                     first(string $sortedField = 'id')
 * @method static Referencial|Proxy                     last(string $sortedField = 'id')
 * @method static Referencial|Proxy                     random(array $attributes = [])
 * @method static Referencial|Proxy                     randomOrCreate(array $attributes = [])
 * @method static ReferencialRepository|RepositoryProxy repository()
 * @method static Referencial[]|Proxy[]                 all()
 * @method static Referencial[]|Proxy[]                 createMany(int $number, array|callable $attributes = [])
 * @method static Referencial[]|Proxy[]                 createSequence(iterable|callable $sequence)
 * @method static Referencial[]|Proxy[]                 findBy(array $attributes)
 * @method static Referencial[]|Proxy[]                 randomRange(int $min, int $max, array $attributes = [])
 * @method static Referencial[]|Proxy[]                 randomSet(int $number, array $attributes = [])
 */
final class ReferencialFactory extends ModelFactory
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
            'code' => self::faker()->text(6),
        ];
    }

    /**
     * @see https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html#initialization
     */
    protected function initialize(): self
    {
        return $this
            // ->afterInstantiate(function(Referencial $referencial): void {})
        ;
    }

    protected static function getClass(): string
    {
        return Referencial::class;
    }
}
