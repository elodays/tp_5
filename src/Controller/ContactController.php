<?php

namespace App\Controller;

use App\Entity\Contact;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ContactController extends AbstractController
{
    /**
     * @Route("/contact", name="contact")
     */
    public function listeContact()
    {
        $manager=$this->getDoctrine()->getManager();
        $repo=$manager->getRepository(Contact::class);
        $Contacts=$repo->findAll();
//dd($Contacts);
        return $this->render('contact/listeContact.html.twig',[
            'lesContacts' => $Contacts
        ]);
    }
}
