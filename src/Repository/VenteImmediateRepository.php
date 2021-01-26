<?php

namespace App\Repository;

use App\Entity\VenteImmediate;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method VenteImmediate|null find($id, $lockMode = null, $lockVersion = null)
 * @method VenteImmediate|null findOneBy(array $criteria, array $orderBy = null)
 * @method VenteImmediate[]    findAll()
 * @method VenteImmediate[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class VenteImmediateRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, VenteImmediate::class);
    }

    // /**
    //  * @return VenteImmediate[] Returns an array of VenteImmediate objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('v')
            ->andWhere('v.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('v.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?VenteImmediate
    {
        return $this->createQueryBuilder('v')
            ->andWhere('v.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
