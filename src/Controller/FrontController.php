<?php
/**
 * Created by PhpStorm.
 * User: akim
 * Date: 14/02/2019
 * Time: 12:10
 */

namespace App\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;


class FrontController extends AbstractController
{
    /**
     * @Route("/", name="home_page")
     */
    public function index()
    {
        return $this->render('front/home.html.twig');
    }
}