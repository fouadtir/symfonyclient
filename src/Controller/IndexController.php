<?php

namespace App\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;

class IndexController extends Controller
{
  /**
   * Page d'accueil, affichage informations clients
   * @Route("/")
   */
    public function index()
    {
      $em = $this->getDoctrine()->getManager();
      $clients = $em->getRepository('App:Clients')->selectAllClient();
      return $this->render('base.html.twig', [
        'clients' => $clients
      ]);
    }
    /**
     * Fonction, pour supprimer un client
     * @Route("/delete")
     */
    public function delete(Request $request){
      if($request->request->has("delete")){
      $this->getDoctrine()->getManager()->getRepository('App:Articles')->deleteArticle($request->request->get('dA'));
      $this->getDoctrine()->getManager()->getRepository('App:Commandes')->deleteCommande($request->request->get('delete'));
      $this->getDoctrine()->getManager()->getRepository('App:Clients')->deleteClient($request->request->get('delete'));
      return $this->redirect("/");
    }
  }

}
