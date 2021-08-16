<?php

namespace App\Repository;

use App\Entity\EsTranslation;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method EsTranslation|null find($id, $lockMode = null, $lockVersion = null)
 * @method EsTranslation|null findOneBy(array $criteria, array $orderBy = null)
 * @method EsTranslation[]    findAll()
 * @method EsTranslation[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class EsTranslationRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, EsTranslation::class);
    }

    // /**
    //  * @return EsTranslation[] Returns an array of EsTranslation objects
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
    public function findOneBySomeField($value): ?EsTranslation
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
