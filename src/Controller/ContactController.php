<?php

namespace App\Controller;

use App\Entity\Contact;
use App\Repository\ContactRepository;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ContactController extends AbstractController
{
    /**
     * @Route("/contacts", name="contact" , methods={"GET"})
     */
    public function listeContact(ContactRepository $repo)
    {
        $manager = $this->getDoctrine()->getManager();
        $repo = $manager->getRepository(Contact::class);
        $contacts=$repo->findAll();
        return $this->render('contact/listeContacts.html.twig',[
            'lesContacts' => $contacts //url pour les contacts
        ]);
    }
    
    /**
     * @Route("/contact/{id}", name="ficheContact" , methods={"GET"})
     */
    public function ficheContact($id, ContactRepository $repo)
    {
        $Contact=$repo->find($id);
        return $this->render('contact/ficheContact.html.twig',[
            'leContact' => $Contact 
        ]);
    }
}
