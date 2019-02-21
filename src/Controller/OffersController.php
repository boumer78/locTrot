<?php
/**
 * Created by PhpStorm.
 * User: kardah
 * Date: 2019-02-15
 * Time: 15:30
 */

namespace App\Controller;


use App\Entity\Offers;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class OffersController extends AbstractController
{
    /**
     * @Route("/offers", name="offers_page")
     */
    public function choiceOffer ()
    {
        /*$em = $this->getDoctrine()->getManager();*/

        //pour remplir la pbase de donnée , il faut décommenté la ligne au dessus et les offer, offer2 , offer3 et les $em. Puis au  niveau du getRepository , il faut remplacer le $offer par $em, il faut mettre en commentaire le getRepository, le findAll et retiré l'array et ses parametres dans le return a la fin.

        /*
        $offer = new Offers();
        $offer->setOfferName('SILVER TROTT');
        $offer->setPrice('29,99€');
        $offer->setTimeLocation('3 mois');
        $offer->setOptions('Assurance vol');
        $offer->setPictures('trottinette-silver.jpg');
        $offer->setNbScooterTotal('5');
        $offer->setNbScooterAvailable('5');
        $offer->setDescription('La trottinette électrique Carbone Spirit est parfaite pour les trajets urbains');

        $em->persist($offer);


        $offer2 = new Offers();
        $offer2->setOfferName('GOLD TROTT');
        $offer2->setPrice('49,99€');
        $offer2->setTimeLocation('3 mois');
        $offer2->setOptions('Assurance vol, casse, maintenance');
        $offer2->setPictures('trottinette-gold.jpg');
        $offer2->setNbScooterTotal('5');
        $offer2->setNbScooterAvailable('5');
        $offer2->setDescription('Conçue en aluminium aéronotique, cette trottinette est légère, rigide et maniable. Elle est très bien équipé avec son système d\'éclairage intégré, son large deck, son guidon réglable en hauteur, son système de pliage au pied');

        $em->persist($offer2);

        $offer3 = new Offers();
        $offer3->setOfferName('PLATINIUM Trott');
        $offer3->setPrice('79,99€');
        $offer3->setTimeLocation('3 mois');
        $offer3->setOptions('Assurance vol, casse, maintenance, remplacement du produit');
        $offer3->setPictures('trottinette-platine.jpg');
        $offer3->setNbScooterTotal('5');
        $offer3->setNbScooterAvailable('5');
        $offer3->setDescription('La trottinette électrique RS1600 est la nouvelle sportive de la gamme SpeedTrott');

        $em->persist($offer3);
        $em->flush();

        */

        $offers = $this->getDoctrine()
            ->getRepository(Offers::class)
            ->findAll();

        return $this->render("front/offers.html.twig" , array('offers'=>$offers));
    }

}