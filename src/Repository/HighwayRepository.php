<?php

namespace App\Repository;

use App\Entity\Highway;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Highway|null find($id, $lockMode = null, $lockVersion = null)
 * @method Highway|null findOneBy(array $criteria, array $orderBy = null)
 * @method Highway[]    findAll()
 * @method Highway[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class HighwayRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Highway::class);
    }

    // /**
    //  * @return Highway[] Returns an array of Highway objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('h')
            ->andWhere('h.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('h.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Highway
    {
        return $this->createQueryBuilder('h')
            ->andWhere('h.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
