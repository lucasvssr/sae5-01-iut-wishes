<?php

namespace App\Repository;

use App\Entity\Referencial;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Referencial>
 *
 * @method Referencial|null find($id, $lockMode = null, $lockVersion = null)
 * @method Referencial|null findOneBy(array $criteria, array $orderBy = null)
 * @method Referencial[]    findAll()
 * @method Referencial[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ReferencialRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Referencial::class);
    }

    //    /**
    //     * @return Referencial[] Returns an array of Referencial objects
    //     */
    //    public function findByExampleField($value): array
    //    {
    //        return $this->createQueryBuilder('r')
    //            ->andWhere('r.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->orderBy('r.id', 'ASC')
    //            ->setMaxResults(10)
    //            ->getQuery()
    //            ->getResult()
    //        ;
    //    }

    //    public function findOneBySomeField($value): ?Referencial
    //    {
    //        return $this->createQueryBuilder('r')
    //            ->andWhere('r.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->getQuery()
    //            ->getOneOrNullResult()
    //        ;
    //    }
}
