<?php

namespace App\Repository;

use App\Entity\AccessPoint;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method AccessPoint|null find($id, $lockMode = null, $lockVersion = null)
 * @method AccessPoint|null findOneBy(array $criteria, array $orderBy = null)
 * @method AccessPoint[]    findAll()
 * @method AccessPoint[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class AccessPointRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, AccessPoint::class);
    }

    // /**
    //  * @return AccessPoint[] Returns an array of AccessPoint objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('a.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?AccessPoint
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
