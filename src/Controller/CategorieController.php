<?php

namespace App\Controller;
use App\Entity\Categories;
use App\Repository\ContactRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class CategorieController extends AbstractController
{
    /**
     * @Route("/categorie", name="categorie", methods={"GET"})
     */

    public function listeCategories(ContactRepository $repo)
    {
        $Categories = $repo->findAll();
        //dump($contacts); profialeur de debugage
        //dump($contacts); pour voir se qui se passe dans le debugage
        return $this->render('categorie/index.html.twig', [
            'lesCategories' => $Categories
        ]);
    }
}
