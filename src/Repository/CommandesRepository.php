<?php

namespace App\Repository;

use App\Entity\Commandes;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

class CommandesRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Commandes::class);
    }
    /*
    public function findBySomething($value)
    {
        return $this->createQueryBuilder('c')
            ->where('c.something = :value')->setParameter('value', $value)
            ->orderBy('c.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */
    public function selectCommande($id)
    {
      return $this->createQueryBuilder('co')
      ->select('co.id', 'co.numeroCommande', 'co.dateCommande',
      'COUNT(a.id) as nombreArticle',
      'SUM(a.quantite*a.prixUnitaire) as montantHT')
      ->leftJoin('co.article','a')
      ->where('co.clientId = :id')
      ->setParameter('id', $id)
      ->groupBy('co.id')
      ->getQuery()
      ->getArrayResult();
    }

    public function deleteCommande($id)
    {
        $this->createQueryBuilder('co')
            ->delete()
            ->where('co.clientId = :id')
            ->setParameter('id', $id)
            ->getQuery()
            ->execute();
    }
}
