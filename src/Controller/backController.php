<?php
/**
 * Created by PhpStorm.
 * User: Aks
 * Date: 23/02/2019
 * Time: 02:57
 */

namespace App\Controller;


use App\Entity\Clients;
use App\Entity\Scooter;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class backController extends AbstractController
{
    /**
     * @Route("/admin", name="back_office")
     */
    public function index()
    {
        return $this->render('back/backHome.html.twig');
    }

    /**
     * @Route("/admin/countScooter", name="scooter_count")
     */
    public function scooterCountAll()
    {
        $count=$this->getDoctrine()
            ->getRepository(Scooter::class)
            ->countScooter();

        return $this->render('back/countScooter.html.twig',[
            'count'=>$count
        ]);
    }

    /**
     * @Route("/admin/countClient", name="client_count")
     */
    public function clientCountAll()
    {
        $count=$this->getDoctrine()
            ->getRepository(Clients::class)
            ->countClient();

        return $this->render('back/countClient.html.twig',[
            'count'=>$count
        ]);
    }


    public function sidebar()
    {
        return $this->render('back/backSideBar.html.twig');
    }
}