<?php

namespace App\Repository;

use App\Entity\Scooter;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Scooter|null find($id, $lockMode = null, $lockVersion = null)
 * @method Scooter|null findOneBy(array $criteria, array $orderBy = null)
 * @method Scooter[]    findAll()
 * @method Scooter[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ScooterRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Scooter::class);
    }

    public function findFirstOffer()
    {
        return $this->createQueryBuilder('a')
            ->where('a.id_offer = 0')
            ->getQuery()
            ->getResult()
            ;
    }
    public function findSecondOffer()
    {
        return $this->createQueryBuilder('a')
            ->where('a.id_offer = 1')
            ->getQuery()
            ->getResult()
            ;
    }
    public function findThirdOffer()
    {
        return $this->createQueryBuilder('a')
            ->where('a.id_offer = 2')
            ->getQuery()
            ->getResult()
            ;
    }
    // /**
    //  * @return Scooter[] Returns an array of Scooter objects
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
    public function findOneBySomeField($value): ?Scooter
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
