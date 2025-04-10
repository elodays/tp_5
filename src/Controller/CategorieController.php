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
     * @Route("/categories", name="categories", methods={"GET"})
     */

    public function listeCategories(CategorieRepository $repo)
    {
        $Categories = $repo->findAll();
        dump($Categories);
        //dump($contacts); profialeur de debugage
        //dump($contacts); pour voir se qui se passe dans le debugage
        return $this->render('categorie/listeCategories.html.twig', [
            'lesCategories' => $Categories
        ]);
    }
}
