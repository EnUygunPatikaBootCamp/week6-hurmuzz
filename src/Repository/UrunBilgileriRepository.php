<?php

namespace App\Repository;

use App\Entity\UrunBilgileri;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<UrunBilgileri>
 *
 * @method UrunBilgileri|null find($id, $lockMode = null, $lockVersion = null)
 * @method UrunBilgileri|null findOneBy(array $criteria, array $orderBy = null)
 * @method UrunBilgileri[]    findAll()
 * @method UrunBilgileri[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class UrunBilgileriRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, UrunBilgileri::class);
    }

    public function add(UrunBilgileri $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(UrunBilgileri $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

//    /**
//     * @return UrunBilgileri[] Returns an array of UrunBilgileri objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('u')
//            ->andWhere('u.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('u.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?UrunBilgileri
//    {
//        return $this->createQueryBuilder('u')
//            ->andWhere('u.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
