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
        $offers = $this->getDoctrine()
            ->getRepository(Offers::class)
            ->findAll();

    return $this->render("front/offers.html.twig", array('offers'=>$offers));
    }

}