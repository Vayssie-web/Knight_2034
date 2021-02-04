<?php

namespace App\DataFixtures;

use App\Entity\Knight;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        // $product = new Product();
        // $manager->persist($product);
        $kay = new Knight();
        $kay->setLastname('MacTavish');
        $kay->setFirstname('Helena');
        $kay->setSection('Ogre');
        $kay->setDescription('Kay était, avant de rentrer à la Table Ronde, 
        la demi-sœur d’Arthur, Helena MacTavish. 
        Elle est maintenant devenue la chef de la section Ogre spécialisée dans la lutte contre les ténèbres. 
        C’est un personnage très discret, avare de mots et préférant agir plutôt que parler. 
        Elle porte constamment Fantôme, sa méta-armure de prestige façonnée sur le châssis de l’armure Rogue, 
        lui permettant de rester discrète en toutes circonstances et de se jouer des sens de tous ses ennemis.');
        $kay->setRoundTable('true');
        $manager->flush();
    }
}
