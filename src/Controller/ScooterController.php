<?php
/**
 * Created by PhpStorm.
 * User: Aks
 * Date: 15/02/2019
 * Time: 18:49
 */

namespace App\Controller;


use App\Entity\Scooter;
use App\Form\ScooterFormType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


class ScooterController extends AbstractController
{

    /**
     * @Route("/scooter", name="scooter")
     */
    public function scooterIndex()
    {

        # Récupération du Repository
        $repository = $this->getDoctrine()
            ->getRepository(Scooter::class);


        $firstOffer = $repository->findFirstOffer();
        $secondOffer = $repository->findSecondOffer();
        $thirdOffer = $repository->findThirdOffer();

        // $secondOffer = $repository->findSecondOffer();

        # Rendu de la vue
        return $this->render('scooter/scooter.html.twig', [
            'firstOffer' => $firstOffer,
            'secondOffer'=> $secondOffer,
            'thirdOffer'=> $thirdOffer
        ]);
//        $repository = $this->getDoctrine()->getRepository(Scooter::class);
//        $scooter = $repository->findAll();
//
//        return $this->render('scooter/scooter.html.twig', [
//            'scooter' => $scooter,
//        ]);
    }

//    /**
//     * @Route("/scooter/tabStock", name="tab_stock")
//     * @param Scooter $scooter
//     * @return \Symfony\Component\HttpFoundation\JsonResponse
//     */
//    public function tabScooter(){
//
//        $repository = $this->getDoctrine()->getRepository(Scooter::class);
//
//        $scooter = $repository->findLastScooter();
//
//        return $this->json(['idScooter'=>$scooter["idScooter"]],200);
//    }



//    /**
//     * @Route("/scooter/tabStock", name="tab_stock")
//     */
//    public function tabScooter()
//    {
//        $scooter='';
//        # Récupération du Repository
//        $repository = $this->getDoctrine()
//            ->getRepository(Scooter::class);
//
//        if ($repository['id_offer'] === 0){
//            $scooter = $repository->findFirstOffer();
//         }
//        if ($repository['id_offer'] === 1){
//            $scooter = $repository->findSecondOffer();
//        }
//        if ($repository['id_offer'] === 2){
//            $scooter = $repository->findThirdOffer();
//        }
//
//
//        return $this->render('scooter/tabStock.html.twig',[
//            'scooter'=> $scooter
//        ]);
//
//    }


    /**
     * @Route("/scooter/new", name="scooter_new", condition="request.isXmlHttpRequest()")
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\JsonResponse|Response
     * @throws \Exception
     */
    public function newScooter(Request $request)
    {

        $scooter = new Scooter();


        $form = $this->createForm(ScooterFormType::class, $scooter, array(
            'action'=> $this->generateUrl($request->get('_route'))
        ))
            ->handleRequest($request);


        if($form->isSubmitted() && $form->isValid()) {


            $em = $this->getDoctrine()->getManager();
            $em->persist($scooter);
            $em->flush();
            return $this->json([
                'envoie'=>'ok',
                'id'=>$scooter->getIdscooter(),
                'name'=>$scooter->getScooterName(),
                'model'=>$scooter->getScooterModel(),
                'serialNumber'=>'50805',
                'date'=>$scooter->getScooterDateEntry(),
                'idoffer'=>$scooter->getIdOffer()
            ]);


        }


        return $this->render('scooter/form.html.twig', [
            'form' => $form->createView()
        ]);

    }

    /**
     * @Route("/scooter/delete/{id}", name="scooter_delete")
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\JsonResponse
     */
    public function deleteScooter(Request $request)
    {
        $idScooter = $request->get('idScooter');
        $scooter = $this->getDoctrine()
            ->getRepository(Scooter::class)
            ->find($idScooter);

        $em = $this->getDoctrine()->getManager();
        $em->remove($scooter);
        $em->flush();

        return $this->json(['delete'=>'ok','id'=>$request->get('idScooter')]);
    }
}