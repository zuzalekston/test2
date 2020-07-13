<?php
/**
 * userData repository.
 */

namespace App\Repository;

use App\Entity\UserData;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\QueryBuilder;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method UserData|null find($id, $lockMode = null, $lockVersion = null)
 * @method UserData|null findOneBy(array $criteria, array $orderBy = null)
 * @method UserData[]    findAll()
 * @method UserData[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class UserDataRepository extends ServiceEntityRepository
{
    /**
     * UserDataRepository constructor.
     */
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, UserData::class);
    }

    /**
     * Get or create new query builder.
     *
     * @param \Doctrine\ORM\QueryBuilder|null $queryBuilder Query builder
     *
     * @return \Doctrine\ORM\QueryBuilder Query builder
     */
    private function getOrCreateQueryBuilder(QueryBuilder $queryBuilder = null): QueryBuilder
    {
        return $queryBuilder ?? $this->createQueryBuilder('userData');
    }

    /**
     * Save record.
     *
     * @param \App\Entity\UserData $userData UserData entity
     *
     * @throws \Doctrine\ORM\ORMException
     * @throws \Doctrine\ORM\OptimisticLockException
     */
    public function save(UserData $userData): void
    {
        $this->_em->persist($userData);
        $this->_em->flush($userData);
    }

    // /**
    //  * @return UserData[] Returns an array of UserData objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('u')
            ->andWhere('u.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('u.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?UserData
    {
        return $this->createQueryBuilder('u')
            ->andWhere('u.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
