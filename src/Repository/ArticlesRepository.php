<?php

namespace App\Repository;

use App\Entity\Articles;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

class ArticlesRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Articles::class);
    }

    /*
    public function findBySomething($value)
    {
        return $this->createQueryBuilder('a')
            ->where('a.something = :value')->setParameter('value', $value)
            ->orderBy('a.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */
    public function selectArticle($id)
    {
      return $this->createQueryBuilder('a')
      ->where('a.commandeId = :id')
      ->setParameter('id', $id)
      ->getQuery()
      ->getArrayResult();

    }

    public function deleteArticle($id)
    {
        $this->createQueryBuilder('a')
            ->delete()
            ->where('a.commandeId = :id')
            ->setParameter('id', $id)
            ->getQuery()
            ->execute();
    }
}
