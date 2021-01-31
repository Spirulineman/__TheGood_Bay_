<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
/* ============================ */

use App\Entity\Annonce;
use App\Entity\Categorie;
use App\Entity\Utilisateur;
use Faker;

class AnnonceFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        // $product = new Product();
        // $manager->persist($product);

        //Localiser Faker en français
        $faker = Faker\Factory::create('fr_FR');
        $categorie = new Categorie();
        $categorie->setId($faker->numberBetween($min = 1, $max = 50));
        $categorie->setTitre($faker->word);

        $vendeur = new Utilisateur();
        $vendeur->setId('1');
        $vendeur->setPseudo($faker->word);
        $vendeur->setMail($faker->email);
        $vendeur->setMDP($faker->word);
        $vendeur->setVendeur($faker->boolean);


        /* ============== */
        $manager->persist($categorie);
        $manager->flush();

        $manager->persist($vendeur);
        $manager->flush();

    

        /* ===============  Générer les données faker  ============ */
        for ($i = 0; $i < 40; $i++) {
            $annonce = new Annonce();

            $annonce->setTitre($faker->word);
            $annonce->setDescription($faker->text($maxNbChars = 250));
            $annonce->setDateFin($faker->dateTimeBetween($startDate = 'now', $endDate = '+30 days', $timezone = null));
            $annonce->setPrixDepart($faker->numberBetween($min = 1, $max = 50));
            $annonce->setDateDebut($faker->dateTimeBetween($startDate = 'now', $endDate = '+30 days', $timezone = null));
            $annonce->setPrixPlafond($faker->numberBetween($min = 1, $max = 50));
            $annonce->setVenteImmediate($faker->boolean);
            $annonce->setIdCategorie($categorie);
            $annonce->setIdVendeur($vendeur);

            $manager->persist($annonce);
        }
        
        $manager->flush();
    }
}
