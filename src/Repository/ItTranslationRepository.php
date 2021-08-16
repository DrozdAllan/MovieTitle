<?php

namespace App\Repository;

use App\Entity\ItTranslation;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method ItTranslation|null find($id, $lockMode = null, $lockVersion = null)
 * @method ItTranslation|null findOneBy(array $criteria, array $orderBy = null)
 * @method ItTranslation[]    findAll()
 * @method ItTranslation[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ItTranslationRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ItTranslation::class);
    }

    // /**
    //  * @return ItTranslation[] Returns an array of ItTranslation objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('i')
            ->andWhere('i.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('i.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?ItTranslation
    {
        return $this->createQueryBuilder('i')
            ->andWhere('i.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
