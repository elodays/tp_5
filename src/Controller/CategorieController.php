<?php

namespace App\Controller;
use App\Entity\Categories;
use App\Repository\CategorieRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class CategorieController extends AbstractController
{
    /**
     * @Route("/categories", name="Categories", methods={"GET"})
     */

    public function listeCategories(CategorieRepository $repo): Response
    {
        $Categories = $repo->findAll();
        dump($Categories);
        //dump($contacts); profialeur de debugage
        //dump($contacts); pour voir se qui se passe dans le debugage
        return $this->render('categorie/listeCategories.html.twig', [
            'lesCategories' => $Categories
        ]);
    }


    /**
     * @Route("/fichecategorie", name="ficheCategorie", methods={"GET"})
     */
public function ficheCategorie(Categorie $categorie): Response
    {
     return $this->render('categorie/ficheCategorie.html.twig',[
            'laCategorie' => $categorie //url pour les contacts
     
        ]);
    }
    /**
     * @Route("/categories/nbContactsParCat", name="nbContactsParCat", methods={"GET"})
     */
public function nbContactsParCat(CategorieRepository $repo): Response
{
    $data="";
    $categories = $repo->nbContactsParCat();
    foreach ($categories as $ligne)
     {
        $data .= '{ y: '.$ligne["nbContacts"].',label: "'.$ligne["libelle"].'"},';
    }
    $data = substr($data, 0, -1); // supprime la dernière virgule
    // dd($data);
     return $this->render('categorie/nbContactsParCat.html.twig',[
            'lesCategories' => $categories, //url pour les contacts
            'data' => $data // pour le graphique
        ]);
    }
}