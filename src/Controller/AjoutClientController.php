<?php

namespace App\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use App\Entity\Clients;
use App\Form\AjoutClientType;

class AjoutClientController extends Controller
{
    /**
     * Page creation clients
     * @Route("/ajoutClient", name="ajoutClient")
     */
    public function index(Request $request)
    {
        $em = $this->getDoctrine()->getEntityManager();
        $client = Clients::class;
        $form = $this->createForm(AjoutClientType::class);
        if($request->isMethod('POST')){
          $form->handleRequest($request);
          $client=$form->getData();
          $em->persist($client);
          $em->flush();
          return $this->redirect("/");
        }
        return $this->render('ajoutClient.html.twig',array(
        'form' => $form -> createView(),
      ));
    }
}
