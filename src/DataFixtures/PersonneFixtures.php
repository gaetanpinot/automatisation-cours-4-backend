<?php

namespace App\DataFixtures;

use App\Entity\Chien;
use App\Entity\Personne;
use Faker\Factory;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class PersonneFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $faker = Factory::create('fr_FR');
        for($i = 0; $i < 10; $i++) {
            $personne = new Personne();
            $personne->setNom($faker->firstName());
            $personne->setTaille($faker->randomFloat(2, 1.50, 2.00)."m");
            $personne->setAge($faker->randomNumber(2, true));
            $manager->persist($personne);
            for($j = 0; $j < $faker->numberBetween(1, 5); $j++) {
                $chien = new Chien();
                $chien->setNom($faker->lastName());
                $chien->setRace($faker->randomElement(['labrador', 'berger allemand', 'caniche', 'bulldog', 'beagle', 'chihuahua', 'dalmatien', 'dobermann', 'golden retriever', 'husky', 'rottweiler', 'saint-bernard', 'shih tzu', 'yorkshire']));
                $chien->setPoid($faker->numberBetween(5, 60));
                $personne->addChien($chien);
                $manager->persist($chien);
            }
            $manager->persist($personne);

        }
        // $product = new Product();
        // $manager->persist($product);

        $manager->flush();
    }
}
