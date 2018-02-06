<?php

namespace App\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;

class ArticleController extends Controller
{
    /**
     * Affichage informations article
     * @Route("/article", name="article")
     */
    public function index(Request $request)
    {
      $em = $this->getDoctrine()->getManager();
      $articles = $em->getRepository('App:Articles')->selectArticle($_GET['id']);
        return $this->render('article.html.twig', [
          'articles' => $articles
        ]);
    }
}
