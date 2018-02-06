<?php

namespace App\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;

class ModifClientController extends Controller
{
  /**
   * Page modification clients
   * @Route("/modifClient", name="modifClient")
   */
    public function index(Request $request)
    {
      $em = $this->getDoctrine()->getManager();
      $clients = $em->getRepository('App:Clients')->selectClient($_GET['id']);
        if($request->isMethod('POST')){
          $dataPost = array(
                'idClient' => $request->request->get("submit"),
                'nomClient' => $request->request->get("nom"),
                'prenomClient' => $request->request->get("prenom"),
                'emailClient' => $request->request->get("email"),
                'dateNaissanceClient' => $request->request->get("dateNaissance")
            );
            $this->getDoctrine()->getManager()->getRepository('App:Clients')->updateClient($dataPost);
            return $this->redirect("/index.php");
        }
      return $this->render('modifClient.html.twig', [
        'clients' => $clients]);
    }
}
