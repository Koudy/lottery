<?php

namespace App\Repository;

use App\Entity\Thing;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\NonUniqueResultException;
use Doctrine\ORM\NoResultException;
use Doctrine\ORM\OptimisticLockException;
use Doctrine\ORM\ORMException;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Thing|null find($id, $lockMode = null, $lockVersion = null)
 * @method Thing|null findOneBy(array $criteria, array $orderBy = null)
 * @method Thing[]    findAll()
 * @method Thing[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ThingRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Thing::class);
    }

    /**
     * @param string $name
     * @return Thing
     * @throws NoResultException
     * @throws NonUniqueResultException
     */
    public function findOneByName(string $name): Thing
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.name = :name')
            ->setMaxResults(1)
            ->setParameter('name', $name)
            ->getQuery()
            ->getSingleResult();
    }

    /**
     * @param int $id
     * @return Thing
     * @throws NoResultException
     * @throws NonUniqueResultException
     */
    public function findOneById(int $id): Thing
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.id = :id')
            ->setMaxResults(1)
            ->setParameter('id', $id)
            ->getQuery()
            ->getSingleResult();
    }

    /**
     * @param Thing $prize
     *
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function store(Thing $prize): void
    {
        $this->getEntityManager()->persist($prize);

        $this->getEntityManager()->flush();
    }

    /**
     * @return array
     */
    public function getUniqueNamesWithEmptyPrizeId(): array
    {
        $names = $this->createQueryBuilder('t')
            ->select('t.name')
            ->where('t.prize IS NULL')
            ->groupBy('t.name')
            ->getQuery()
            ->getScalarResult();

        return  array_column($names, "name");
    }

    // /**
    //  * @return Thing[] Returns an array of Thing objects
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
    public function findOneBySomeField($value): ?Thing
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
