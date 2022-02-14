<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Character;
use App\Entity\Player;
use DateTime;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        for ($i = 0; $i < 10; $i++) {
            $character = new Character();
            $character
                ->setKind(rand(0, 1) ? 'Dame' : 'Seigneur')
                ->setName('Eldalótë' . $i)
                ->setSurname('Fleur elfique')
                ->setCaste('Elfe')
                ->setKnowledge('Arts')
                ->setIntelligence(mt_rand(100, 200))
                ->setLife(mt_rand(10, 20))
                ->setImage('/images/eldalote.jpg')
                ->setIdentifier(hash('sha1', uniqid()))
                ->setCreation(new DateTime())
                ->setModification(new DateTime());

            $player = new Player();
            $player
                ->setFirstname('Firstname' . $i)
                ->setLastname('Lastname')
                ->setEmail('test@email.com')
                ->setMirian(100)
                ->setIdentifier(hash('sha1', uniqid()))
                ->setCreation(new \DateTime())
                ->setModification(new \DateTime());

            $manager->persist($character);
            $manager->persist($player);

        }
        $manager->flush();
    }
}
