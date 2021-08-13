<?php

namespace App\Repository;

use App\Entity\DeTranslation;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method DeTranslation|null find($id, $lockMode = null, $lockVersion = null)
 * @method DeTranslation|null findOneBy(array $criteria, array $orderBy = null)
 * @method DeTranslation[]    findAll()
 * @method DeTranslation[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class DeTranslationRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, DeTranslation::class);
    }

    // /**
    //  * @return DeTranslation[] Returns an array of DeTranslation objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('d')
            ->andWhere('d.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('d.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?DeTranslation
    {
        return $this->createQueryBuilder('d')
            ->andWhere('d.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
