<?php

namespace App\Repository;

use App\Entity\EnTranslation;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method EnTranslation|null find($id, $lockMode = null, $lockVersion = null)
 * @method EnTranslation|null findOneBy(array $criteria, array $orderBy = null)
 * @method EnTranslation[]    findAll()
 * @method EnTranslation[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class EnTranslationRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, EnTranslation::class);
    }

    // /**
    //  * @return EnTranslation[] Returns an array of EnTranslation objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('e')
            ->andWhere('e.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('e.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?EnTranslation
    {
        return $this->createQueryBuilder('e')
            ->andWhere('e.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
