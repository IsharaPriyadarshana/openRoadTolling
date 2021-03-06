<?php

namespace App\Repository;

use App\Entity\HighwayVehicle;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method HighwayVehicle|null find($id, $lockMode = null, $lockVersion = null)
 * @method HighwayVehicle|null findOneBy(array $criteria, array $orderBy = null)
 * @method HighwayVehicle[]    findAll()
 * @method HighwayVehicle[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class HighwayVehicleRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, HighwayVehicle::class);
    }

    // /**
    //  * @return HighwayVehicle[] Returns an array of HighwayVehicle objects
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
    public function findOneBySomeField($value): ?HighwayVehicle
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
     * @param $lowerBound
     * @param $upperBound
     * @param $isCurrentlyIn
     * @return HighwayVehicle[]
     */
    public function findAllInDateRange($lowerBound,$upperBound,$isCurrentlyIn): array
    {
        $qb = $this->createQueryBuilder('v')
            ->where('v.exitTime > :lowerBound')
            ->andWhere('v.exitTime < :upperBound')
            ->andWhere('v.isCurrentlyIn = :isCurrentlyIn')
            ->setParameter('lowerBound', $lowerBound)
            ->setParameter('upperBound', $upperBound)
            ->setParameter('isCurrentlyIn', $isCurrentlyIn)
            ->orderBy('v.exitTime', 'ASC');

        $query = $qb->getQuery();

        return $query->execute();
    }

}
