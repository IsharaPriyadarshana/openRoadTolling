<?php

namespace App\Repository;

use App\Entity\VehicleClass;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method VehicleClass|null find($id, $lockMode = null, $lockVersion = null)
 * @method VehicleClass|null findOneBy(array $criteria, array $orderBy = null)
 * @method VehicleClass[]    findAll()
 * @method VehicleClass[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class VehicleClassRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, VehicleClass::class);
    }

    // /**
    //  * @return VehicleClass[] Returns an array of VehicleClass objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('v')
            ->andWhere('v.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('v.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?VehicleClass
    {
        return $this->createQueryBuilder('v')
            ->andWhere('v.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
