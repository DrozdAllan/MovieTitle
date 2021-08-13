<?php

namespace App\Repository;

use App\Entity\FrTranslation;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method FrTranslation|null find($id, $lockMode = null, $lockVersion = null)
 * @method FrTranslation|null findOneBy(array $criteria, array $orderBy = null)
 * @method FrTranslation[]    findAll()
 * @method FrTranslation[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class FrTranslationRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, FrTranslation::class);
    }

    // /**
    //  * @return FrTranslation[] Returns an array of FrTranslation objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('f')
            ->andWhere('f.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('f.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?FrTranslation
    {
        return $this->createQueryBuilder('f')
            ->andWhere('f.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
