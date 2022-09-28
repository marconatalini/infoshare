<?php

namespace App\Repository;

use App\Entity\OrdiniMagazzino;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\AbstractQuery;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<OrdiniMagazzino>
 *
 * @method OrdiniMagazzino|null find($id, $lockMode = null, $lockVersion = null)
 * @method OrdiniMagazzino|null findOneBy(array $criteria, array $orderBy = null)
 * @method OrdiniMagazzino[]    findAll()
 * @method OrdiniMagazzino[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class OrdiniMagazzinoRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, OrdiniMagazzino::class);
    }

    public function add(OrdiniMagazzino $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(OrdiniMagazzino $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function getAllCustomer()
    {
        $qb = $this->createQueryBuilder('o')
            ->select('o.customer')
            ->orderBy('o.customer')
            ->groupBy('o.customer')
            ->getQuery();

        return $qb->getResult(AbstractQuery::HYDRATE_SCALAR_COLUMN);
    }

//    /**
//     * @return OrdiniMagazzino[] Returns an array of OrdiniMagazzino objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('o')
//            ->andWhere('o.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('o.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?OrdiniMagazzino
//    {
//        return $this->createQueryBuilder('o')
//            ->andWhere('o.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
