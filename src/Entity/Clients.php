<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ClientsRepository")
 */
 class Clients
 {
     /**
      * @ORM\Id
      * @ORM\GeneratedValue
      * @ORM\Column(type="integer")
      */
     private $id;

     /**
      * @ORM\Column(name="numero_client" ,type="string" ,length=200)
      */
     private $numeroClient;

     /**
      * @ORM\Column(name= "nom" ,type="string", length=200)
      */
     private $nom;

     /**
      * @ORM\Column(name="prenom" ,type="string" ,length=200)
      */
     private $prenom;

     /**
      * @ORM\Column(name="email" ,type="string" ,length=200)
      */
     private $email;

     /**
      * @ORM\Column(name="date_naissance" ,type="date")
      */
     private $dateNaissance;

     /**
     * @var integer
     *
     * @ORM\OneToMany(targetEntity="App\Entity\Commandes", mappedBy="clientId")
     */
    private $commande;

     public function getId()
   {
       return $this->id;
   }

   public function getNumeroClient()
   {
       return $this->numeroClient;
   }

   public function setNumeroClient($numeroClient)
   {
       $this->numeroClient = $numeroClient;
   }

   public function getNom()
   {
       return $this->nom;
   }

   public function setNom($nom)
   {
       $this->nom = $nom;
   }
   public function getPrenom()
   {
       return $this->prenom;
   }

   public function setPrenom($prenom)
   {
       $this->prenom = $prenom;
   }
   public function getEmail()
   {
       return $this->email;
   }

   public function setEmail($email)
   {
       $this->email = $email;
   }
   public function getDateNaissance()
   {
       return $this->dateNaissance;
   }

   public function setDateNaissance($dateNaissance)
   {
       $this->dateNaissance = $dateNaissance;
   }

 }
