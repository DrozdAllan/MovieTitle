<?php

namespace App\Repository;

use App\Entity\JaTranslation;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method JaTranslation|null find($id, $lockMode = null, $lockVersion = null)
 * @method JaTranslation|null findOneBy(array $criteria, array $orderBy = null)
 * @method JaTranslation[]    findAll()
 * @method JaTranslation[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class JaTranslationRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, JaTranslation::class);
    }

    // /**
    //  * @return JaTranslation[] Returns an array of JaTranslation objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('j')
            ->andWhere('j.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('j.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?JaTranslation
    {
        return $this->createQueryBuilder('j')
            ->andWhere('j.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
