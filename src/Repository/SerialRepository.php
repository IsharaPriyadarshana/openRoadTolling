<?php

namespace App\Repository;

use App\Entity\Serial;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Serial|null find($id, $lockMode = null, $lockVersion = null)
 * @method Serial|null findOneBy(array $criteria, array $orderBy = null)
 * @method Serial[]    findAll()
 * @method Serial[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class SerialRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Serial::class);
    }

    // /**
    //  * @return Serial[] Returns an array of Serial objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('s.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Serial
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
