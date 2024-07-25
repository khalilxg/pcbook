<?php

namespace App\Repository;

use App\Entity\Loi;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Loi>
 *
 * @method Loi|null find($id, $lockMode = null, $lockVersion = null)
 * @method Loi|null findOneBy(array $criteria, array $orderBy = null)
 * @method Loi[]    findAll()
 * @method Loi[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class LoiRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Loi::class);
    }

    /**
     * Find a specified number of unretrieved rows
     *
     * @param int $limit
     * @return Loi[]
     */
    public function findUnretrieved(int $limit): array
    {
        return $this->createQueryBuilder('l')
            ->where('l.retrieved = false')
            ->setMaxResults($limit)
            ->getQuery()
            ->getResult();
    }
}
