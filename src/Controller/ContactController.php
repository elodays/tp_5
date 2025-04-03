<?php

namespace App\Controller;

use App\Entity\Contact;
use App\Repository\ContactRepository;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ContactController extends AbstractController
{
    /**
     * @Route("/contact", name="Contact" , methods={"GET"})
     */
    public function listeContact(ContactRepository $repo)
    {
        $contacts=$repo->finAll();
        return $this->render('Contact/listeContacts.html.twig',[
            'lesContacts' => $contacts
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
