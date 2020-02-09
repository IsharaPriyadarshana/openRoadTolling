<?php

namespace App\Repository;

use App\Entity\HighwayExtension;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use phpDocumentor\Reflection\Types\Integer;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method HighwayExtension|null find($id, $lockMode = null, $lockVersion = null)
 * @method HighwayExtension|null findOneBy(array $criteria, array $orderBy = null)
 * @method HighwayExtension[]    findAll()
 * @method HighwayExtension[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class HighwayExtensionRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, HighwayExtension::class);
    }

    // /**
    //  * @return HighwayExtension[] Returns an array of HighwayExtension objects
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
    public function findOneBySomeField($value): ?HighwayExtension
    {
        return $this->createQueryBuilder('h')
            ->andWhere('h.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */

     /**
      * @return HighwayExtension[] Returns an array of HighwayExtension objects
      */

    public function findMaxDis($highway)
    {
        return $this->createQueryBuilder('h')
            ->andWhere('h.highway = :highway')
            ->setParameter('highway', $highway)
            ->orderBy('h.sequenceNo', 'DESC')
            ->setMaxResults(1)
            ->getQuery()
            ->getResult()
        ;
    }


}
