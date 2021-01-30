<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
/* ============================ */

use App\Entity\Annonce;
use App\Entity\Categorie;
use Faker;

class CategorieFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        // $product = new Product();
        // $manager->persist($product);

        //Localiser Faker en français
        $faker = Faker\Factory::create('fr_FR');

        /* ===============  Générer les données faker  ============ */
        for ($i = 0; $i < 40; $i++) {
            $categorie = new Categorie();

            $categorie->setTitre($faker->word);
            
            $manager->persist($categorie);
        }
        
        $manager->flush();
    }
}
