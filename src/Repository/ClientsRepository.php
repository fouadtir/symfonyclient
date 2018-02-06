<?php

namespace App\Repository;

use App\Entity\Clients;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

class ClientsRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Clients::class);
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
    public function selectAllClient()
    {
      return $this->createQueryBuilder('c')
      ->select('c.id', 'c.numeroClient', 'c.nom','c.prenom','c.email','c.dateNaissance','co.id as commandeId',
      'COUNT(co.id) as nombreCommande','a.numeroArticle',
      'SUM(a.quantite*a.prixUnitaire) as montantTotal',
      'MAX(co.dateCommande) as dateDernierAchat')
      ->leftJoin('c.commande', 'co')
      ->leftJoin('co.article','a')
      ->groupBy('c.id')
      ->getQuery()
      ->getArrayResult();

    }
    public function selectClient($id){
      return $this->createQueryBuilder('c')
      ->where('c.id = :id')
      ->setParameter('id', $id)
      ->getQuery()
      ->getArrayResult();
    }
    public function updateClient(array $clients)
    {
        return $this->createQueryBuilder('c')
            ->update()
            ->set('c.nom', ':nom')
            ->set('c.prenom', ':prenom')
            ->set('c.email', ':email')
            ->set('c.dateNaissance', ':dateNaissance')
            ->where('c.id = :id')
            ->setParameter('id', $clients['idClient'])
            ->setParameter('nom', $clients['nomClient'])
            ->setParameter('prenom', $clients['prenomClient'])
            ->setParameter('email', $clients['emailClient'])
            ->setParameter('dateNaissance', $clients['dateNaissanceClient'])
            ->getQuery()
            ->execute();
    }
    public function deleteClient($id)
    {
        $this->createQueryBuilder('c')
            ->delete()
            ->where('c.id = :id')
            ->setParameter('id', $id)
            ->getQuery()
            ->execute();
    }
}
