<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class AccueilController extends AbstractController
{
    /**
     * @Route("/accueil", name="accueil", methode={"GET"})
     */
   public function index() //methode index
    {
        return $this->render('accueil/index.html.twig'); //chemin de la vue
            
    }
 }