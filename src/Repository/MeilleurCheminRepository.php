<?php

namespace App\Repository;

use App\Entity\MeilleurChemin;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<MeilleurChemin>
 *
 * @method MeilleurChemin|null find($id, $lockMode = null, $lockVersion = null)
 * @method MeilleurChemin|null findOneBy(array $criteria, array $orderBy = null)
 * @method MeilleurChemin[]    findAll()
 * @method MeilleurChemin[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class MeilleurCheminRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, MeilleurChemin::class);
    }

    public function add(MeilleurChemin $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(MeilleurChemin $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

//    /**
//     * @return MeilleurChemin[] Returns an array of MeilleurChemin objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('m')
//            ->andWhere('m.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('m.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?MeilleurChemin
//    {
//        return $this->createQueryBuilder('m')
//            ->andWhere('m.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
