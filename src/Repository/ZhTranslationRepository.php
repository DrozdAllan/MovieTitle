<?php

namespace App\Repository;

use App\Entity\ZhTranslation;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method ZhTranslation|null find($id, $lockMode = null, $lockVersion = null)
 * @method ZhTranslation|null findOneBy(array $criteria, array $orderBy = null)
 * @method ZhTranslation[]    findAll()
 * @method ZhTranslation[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ZhTranslationRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ZhTranslation::class);
    }

    // /**
    //  * @return ZhTranslation[] Returns an array of ZhTranslation objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('z')
            ->andWhere('z.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('z.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?ZhTranslation
    {
        return $this->createQueryBuilder('z')
            ->andWhere('z.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
