<?php

namespace App\DataFixtures;

use App\Entity\Categorie;
use Faker\Factory;
use App\Entity\Contact;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class ContactsFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $faker = Factory::create('fr_FR');      

        $categorie = new Categorie();
        $categorie->setLibelle("professionnel")
            ->setDescription($faker->sentence(50))
            ->setImage("https://picsum.photos/400/200?category=professionnel");
        $manager->persist($categorie);

        $categorie = new Categorie();
        $categorie->setLibelle("people")
            ->setDescription($faker->sentence(50))
            ->setImage("https://picsum.photos/400/200?category=people");
        $manager->persist($categorie);

        $categorie = new Categorie();
        $categorie->setLibelle("sport")
            ->setDescription($faker->sentence(50))
            ->setImage("https://picsum.photos/400/200?category=people");
        $manager->persist($categorie);

        $genres = ['men', 'women'];

        for ($i = 0; $i < 10; $i++) {
            $sexe = mt_rand(0, 1);
            $type = $sexe === 0 ? "men" : "women";

            $contact = new Contact();
            $contact->setNom($faker->lastName()) // Correction ici : $faker au lieu de $fake
                ->setPrenon($faker->firstName($genres[$sexe])) // Correction ici : $faker au lieu de $fake
                ->setRue($faker->streetAddress()) // Correction ici : $faker au lieu de $fake
                ->setCp($faker->numberBetween(75000, 75020)) // Correction ici : $faker au lieu de $fake
                ->setVille($faker->city()) // Correction ici : $faker au lieu de $fake
                ->setMail($faker->email()) // Correction ici : $faker au lieu de $fake
                ->setSexe($sexe)
                ->setAvatar("https://randomuser.me/api/portraits/" . $type . "/" . $i . ".jpg");
            $manager->persist($contact);
        }

        $manager->flush();
    }
}