<?php

namespace App\Repository;

use App\Entity\Coterie;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Coterie|null find($id, $lockMode = null, $lockVersion = null)
 * @method Coterie|null findOneBy(array $criteria, array $orderBy = null)
 * @method Coterie[]    findAll()
 * @method Coterie[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CoterieRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Coterie::class);
    }

    // /**
    //  * @return Coterie[] Returns an array of Coterie objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('c.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Coterie
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
