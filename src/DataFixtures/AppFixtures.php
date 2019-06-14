<?php

namespace App\DataFixtures;

use App\Entity\Offers;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        // $product = new Product();
        // $manager->persist($product);

        //pour remplir la pbase de donnée , il faut décommenté la ligne au dessus et les offer, offer2 , offer3 et les $em. Puis au  niveau du getRepository , il faut remplacer le $offer par $em, il faut mettre en commentaire le getRepository, le findAll et retiré l'array et ses parametres dans le return a la fin.


        $offer = new Offers();
        $offer->setOfferName('BRONZE TROTT');
        $offer->setPrice('29,99€');
        $offer->setTimeLocation('3 mois');
        $offer->setOptions('Assurance vol');
        $offer->setPictures('trottinette-silver.jpg');
        $offer->setNbScooterTotal('5');
        $offer->setNbScooterAvailable('5');
        $offer->setDescription('La trottinette électrique Carbone Spirit est parfaite pour les trajets urbains');

        $manager->persist($offer);


        $offer2 = new Offers();
        $offer2->setOfferName('GOLD TROTT');
        $offer2->setPrice('49,99€');
        $offer2->setTimeLocation('3 mois');
        $offer2->setOptions('Assurance vol, casse, maintenance');
        $offer2->setPictures('trottinette-gold.jpg');
        $offer2->setNbScooterTotal('5');
        $offer2->setNbScooterAvailable('5');
        $offer2->setDescription('Conçue en aluminium aéronotique, cette trottinette est légère, rigide et maniable. Elle est très bien équipé avec son système d\'éclairage intégré, son large deck, son guidon réglable en hauteur, son système de pliage au pied');

        $manager ->persist($offer2);

        $offer3 = new Offers();
        $offer3->setOfferName('PLATINIUM Trott');
        $offer3->setPrice('79,99€');
        $offer3->setTimeLocation('3 mois');
        $offer3->setOptions('Assurance vol, casse, maintenance, remplacement du produit');
        $offer3->setPictures('trottinette-platine.jpg');
        $offer3->setNbScooterTotal('5');
        $offer3->setNbScooterAvailable('5');
        $offer3->setDescription('La trottinette électrique RS1600 est la nouvelle sportive de la gamme SpeedTrott');

        $manager ->persist($offer3);

        $manager->flush();
    }
}
