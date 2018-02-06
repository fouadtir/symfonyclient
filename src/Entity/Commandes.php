<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\CommandesRepository")
 */
class Commandes
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(name="numero_commande", type="string", length=200)
     */
    private $numeroCommande;

    /**
     * @ORM\Column(name="date_commande", type="date")
     */
    private $dateCommande;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Clients", inversedBy="commandes")
     * @ORM\JoinColumn(name="client_id", referencedColumnName="id")
     */
    private $clientId;

    /** @var integer
    *
    * @ORM\OneToMany(targetEntity="App\Entity\Articles", mappedBy="commandeId")
    */
   private $article;


    public function getId()
  {
      return $this->id;
  }

  public function getNumeroCommande()
  {
      return $this->numeroCommande;
  }

  public function setNumeroClient($numeroCommande)
  {
      $this->numeroCommmande = $numeroCommande;
  }
  public function getDateCommande()
  {
      return $this->dateCommande;
  }

  public function setDateCommande($dateCommande)
  {
      $this->dateCommmande = $dateCommande;
  }
}
