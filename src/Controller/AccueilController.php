<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class AccueilController extends AbstractController
{
    /**
     * @Route("/accueil", name="accueil", methods={"GET"})
     */
   public function index() //methode index
    {
        $nom = ["jean", "paul", "marie"];
        $prenom = ["dupont", "durand", "martin"];
        $age = [25, 30, 35];
        return $this->render('accueil/index.html.twig',[
            'lesNoms' => $nom,
            'lesPrenoms' => $prenom,
            'lesAges' => $age,
        ]); //chemin de la vue
            
    }
 }