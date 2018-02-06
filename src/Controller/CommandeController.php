<?php

namespace App\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;

class CommandeController extends Controller
{
    /**
    * Affichage informations commande
     * @Route("/commande", name="commande")
     */
    public function index(Request $request)
    {
      $em = $this->getDoctrine()->getManager();
      $commandes = $em->getRepository('App:Commandes')->selectCommande($_GET['id']);
        return $this->render('commande.html.twig', [
          'commandes' => $commandes
        ]);
    }
}
