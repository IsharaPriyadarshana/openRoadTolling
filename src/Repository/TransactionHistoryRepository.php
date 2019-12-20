<?php

namespace App\Repository;

use App\Entity\TransactionHistory;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method TransactionHistory|null find($id, $lockMode = null, $lockVersion = null)
 * @method TransactionHistory|null findOneBy(array $criteria, array $orderBy = null)
 * @method TransactionHistory[]    findAll()
 * @method TransactionHistory[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TransactionHistoryRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, TransactionHistory::class);
    }

    // /**
    //  * @return TransactionHistory[] Returns an array of TransactionHistory objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('t.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?TransactionHistory
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */

    /**
     * @param $lowerBound
     * @param $upperBound
     * @return TransactionHistory[]
     */
    public function findAllInDateRange($lowerBound,$upperBound): array
    {
        $qb = $this->createQueryBuilder('p')
            ->where('p.date > :lowerBound')
            ->andWhere('p.date < :upperBound')
            ->setParameter('lowerBound', $lowerBound)
            ->setParameter('upperBound', $upperBound)
            ->orderBy('p.date', 'ASC');

        $query = $qb->getQuery();

        return $query->execute();
    }

}
