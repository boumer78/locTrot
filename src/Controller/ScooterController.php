<?php
/**
 * Created by PhpStorm.
 * User: Aks
 * Date: 15/02/2019
 * Time: 18:49
 */

namespace App\Controller;


use App\Entity\Scooter;
use App\form\ScooterFormType;
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
        $repository = $this->getDoctrine()->getRepository(Scooter::class);
        $scooter = $repository->findAll();

        return $this->render('scooter/scooter.html.twig', [
            'scooter' => $scooter,
        ]);
    }


    /**
     * @Route("/scooter/new", name="scooter_new", condition="request.isXmlHttpRequest()")
     */
    public function newScooter(Request $request)
    {
        # Récupération d'un Membre
        #$membre = $this->getDoctrine()
        #    ->getRepository(Membre::class)
        #    ->find(1);

        # Création d'un Nouvel Article
        $scooter = new Scooter();

        # Création du Formulaire
        $form = $this->createForm(ScooterFormType::class, $scooter, array(
            'action'=> $this->generateUrl($request->get('_route'))
        ))
            ->handleRequest($request);

        # Traitement des données POST
        #$form->handleRequest($request);

        # Si le formulaire est soumis et valide
        if($form->isSubmitted() && $form->isValid()) {


            # Sauvegarde en BDD
            $em = $this->getDoctrine()->getManager();
            $em->persist($scooter);
            $em->flush();
            return new Response('success');


            # Redirection
           /** return $this->redirectToRoute('front_scooter', [
                'categorie' => $scooter->getCategorie(),
                'id' => $scooter->getId()
            ])*/
        }

        # Affichage dans la vue
        return $this->render('scooter/form.html.twig', [
            'form' => $form->createView()
        ]);

    }
}