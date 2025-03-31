<?php

namespace App\DataFixtures;

use Faker\Factory;
use App\Entity\Contact;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class ContactsFixtures extends Fixture
{
    public function load(ObjectManager $manager):void
    {
       $fake = Factory::create('fr_FR');
        $genres  = ['men' ,'women'];

for ($i=0; $i<10; $i++)
     {
        $sexe =mt_rand(0,1);
        if ($sexe==0){
            $type="men";
        }else {
            $type="women";
        }
        $contact = new Contact();
        $contact->setNom($fake->lastname())
        ->setPrenon($fake->firstname($genres[$sexe]))
        ->setRue($fake->streetAddress())
       ->setCp($fake->numberBetween(75000, 75020))
        ->setVille($fake->city())
        ->setMail($fake->email())
        ->setSexe($sexe)
        ->setAvatar("https://randomuser.me/api/portraits/". $type ."/". $i .".jpg");
        $manager->persist($contact);      
 }
        $manager->flush();
    }
}
