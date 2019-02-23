<?php
/**
 * Created by PhpStorm.
 * User: kardah
 * Date: 2019-02-15
 * Time: 15:30
 */

namespace App\Controller;


use App\Entity\Offers;
use App\Entity\Order;
use App\Form\PersonnalizeOffersType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Routing\Annotation\Route;

class OffersController extends AbstractController
{
    /**
     * @Route("/offers", name="offers_page")
     */
    public function choiceOffer (Request $request, SessionInterface $session)
    {
//        $em = $this->getDoctrine()->getManager();
//
//        //pour remplir la pbase de donnée , il faut décommenté la ligne au dessus et les offer, offer2 , offer3 et les $em. Puis au  niveau du getRepository , il faut remplacer le $offer par $em, il faut mettre en commentaire le getRepository, le findAll et retiré l'array et ses parametres dans le return a la fin.
//
//
//        $offer = new Offers();
//        $offer->setOfferName('SILVER TROTT');
//        $offer->setPrice('29,99€');
//        $offer->setTimeLocation('3 mois');
//        $offer->setOptions('Assurance vol');
//        $offer->setPictures('trottinette-silver.jpg');
//        $offer->setNbScooterTotal('5');
//        $offer->setNbScooterAvailable('5');
//        $offer->setDescription('La trottinette électrique Carbone Spirit est parfaite pour les trajets urbains');
//
//        $em->persist($offer);
//
//
//        $offer2 = new Offers();
//        $offer2->setOfferName('GOLD TROTT');
//        $offer2->setPrice('49,99€');
//        $offer2->setTimeLocation('3 mois');
//        $offer2->setOptions('Assurance vol, casse, maintenance');
//        $offer2->setPictures('trottinette-gold.jpg');
//        $offer2->setNbScooterTotal('5');
//        $offer2->setNbScooterAvailable('5');
//        $offer2->setDescription('Conçue en aluminium aéronotique, cette trottinette est légère, rigide et maniable. Elle est très bien équipé avec son système d\'éclairage intégré, son large deck, son guidon réglable en hauteur, son système de pliage au pied');
//
//        $em->persist($offer2);
//
//        $offer3 = new Offers();
//        $offer3->setOfferName('PLATINIUM Trott');
//        $offer3->setPrice('79,99€');
//        $offer3->setTimeLocation('3 mois');
//        $offer3->setOptions('Assurance vol, casse, maintenance, remplacement du produit');
//        $offer3->setPictures('trottinette-platine.jpg');
//        $offer3->setNbScooterTotal('5');
//        $offer3->setNbScooterAvailable('5');
//        $offer3->setDescription('La trottinette électrique RS1600 est la nouvelle sportive de la gamme SpeedTrott');
//
//        $em->persist($offer3);
//        $em->flush();





        //Gestion affichage des 3 offres

        $offers = $this->getDoctrine()
            ->getRepository(Offers::class)
            ->findAll();


        return $this->render("front/offers.html.twig" , array('offers'=>$offers));

        //Gestion du formulaire de personnalisation de mon offre
        $form = $this->createForm(PersonnalizeOffersType::class)
            ->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()) {

            #Je déclare ma variable qui recupère les données de mon formulaire
            $data = $form->getData();

            # je fais un 'explode' de ma chaine de caractère dans mon OffersController,
            # je stock dans une variable avec un tableau (0,1) les deux chaines de caractère séparé par le explode,
            $time_location = explode('#', $data['time_location'])[0];
            $time_location_name = explode('#', $data['time_location'])[1];

            #comme au dessus
            $trottinettes = explode('#', $data['trottinettes'])[0];
            $trottinettes_name = explode('#', $data['trottinettes'])[1];

            #Ici, je fais le total de mes deux variables qui contiennent une valeur et le choice correspondant
            $total = $time_location + $trottinettes;

            #Ici, pour mon choix d'options, je stock un tableau vide dans une variable
            $options_name = [];
            #Je démarre une boucle foreach qui parcourt toute les options de mon formulaire
            foreach ($data['options'] as $option)
                {
                # je declare ma variable option, qui va contenir mon option choisi
                $option  = explode('#', $option);
                # je vais mettre dans mon tableau options_name l(option choisi et son tarif
                $options_name[ $option[1] ] = $option[0];
                #Ici, j'ajoute à mon calcul total, l'addition des options choisis
               $total += $option[0];
                }

            #Ici, je déclare une variable personnalize qui va contenir chacun des choix du client
            # $personnalize[$time_location_name] = $time_location;
            #$personnalize[$trottinettes_name] = $trottinettes;
            $personnalize['location_duration'] = $time_location_name;
            $personnalize['location_duration_price'] = $time_location;
            $personnalize['trottinettes_name'] = $trottinettes_name;
            $personnalize['trottinettes_price'] = $trottinettes;
            $personnalize['options'] = $options_name;
            $personnalize['total'] = $total;

            # J'ouvre une session temporaire qui stock les choix du user et j'indique la route ou ce sera envoyé
            $session->set('personnalize', $personnalize);
            return $this->redirectToRoute('offers_confirmation');

        }

        return $this->render("front/offers.html.twig", [
                'offers'=>$offers,
                'form'=>$form->createView()
            ]
        );
    }

    /**
     * @Route("/offers/confirmation", name="offers_confirmation")
     */
    public function confirmationOffer(SessionInterface $session)
    {
        #j'envoie une vue des informations du form remplis et présent dans la session, le tout grâce a la fonction ci-dessus.

        $personnalize = $session->get('personnalize');
        $offer = $this->getDoctrine()
            ->getRepository(Offers::class)
            ->findOneBy([
                'offer_name' => $personnalize['trottinettes_name']
            ]);

        #dump($offer);
        #die('aaa');

        return $this->render("front/offers-confirmation.html.twig", [
           'personnalize' => $personnalize,
            'offer' => $offer
        ]);

    }

}