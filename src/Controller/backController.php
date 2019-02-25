<?php
/**
 * Created by PhpStorm.
 * User: Aks
 * Date: 23/02/2019
 * Time: 02:57
 */

namespace App\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;

use Symfony\Component\Routing\Annotation\Route;

class backController extends AbstractController
{
    /**
     * @Route("/admin", name="back_office")
     * @Security("has_role('ROLE_ADMIN')")
     */
    public function index()
    {
        return $this->render('back/backHome.html.twig');
    }

    public function sidebar()
    {
        return $this->render('back/backSideBar.html.twig');
    }
}