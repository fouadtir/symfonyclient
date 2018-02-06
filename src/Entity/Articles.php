<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ArticlesRepository")
 */
class Articles
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(name="numero_article" ,type="string", length=200)
     */
    private $numeroArticle;

    /**
     * @ORM\Column(name="nom_article", type="string", length=100)
     */
    private $nomArticle;

    /**
     * @ORM\Column(name="prix_unitaire", type="string", length=100)
     */
    private $prixUnitaire;

    /**
     * @ORM\Column(name="quantite", type="integer")
     */
    private $quantite;
    /**
      * @ORM\ManyToOne(targetEntity="App\Entity\Commandes", inversedBy="articles")
      * @ORM\JoinColumn(name="commande_id", referencedColumnName="id")
      */
    private $commandeId;

    public function getId()
  {
      return $this->id;
  }

  public function getNumeroArticle()
  {
      return $this->numeroArticle;
  }

  public function setNumeroArticle($numeroArticle)
  {
      $this->numeroArticle = $numeroArticle;
  }
  public function getNomArticle()
  {
      return $this->nomArticle;
  }

  public function setNomArticle($nomArticle)
  {
      $this->nomArticle = $nomArticle;
  }
  public function getPrixUnitaire()
  {
      return $this->prixUnitaire;
  }

  public function setPrixUnitaire($prixUnitaire)
  {
      $this->prixUnitaire = $prixUnitaire;
  }
  public function getQuantite()
  {
      return $this->quantite;
  }

  public function setQuantite($quantite)
  {
      $this->quantite = $quantite;
  }
}
