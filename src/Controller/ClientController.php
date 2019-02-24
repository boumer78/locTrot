<?php
/**
 * Created by PhpStorm.
 * User: carrefour
 * Date: 15/02/2019
 * Time: 14:33
 */

namespace App\Controller;


use App\Form\ClientFormType;
use App\Entity\Clients;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;


class ClientController extends AbstractController
{
    /**
     * Formulaire pour s'inscrire
     * @Route("/inscription", name="new_clients")
     */
    public function newClients(Request $request, UserPasswordEncoderInterface $encoder)
    {

        #Creation d'un membre
        $client = new Clients();
        $client->setRoles(['ROLE_CLIENT']);
        #création du formulaire

        /**
         * les champs du formulaire vont correspondre avec les propriétés de votre entité Client::class
         *
         */
        $form = $this->createForm(ClientFormType::class, $client);
        #Traitement du Formulaire
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            #Encodage du mot de passe
            $client->setPassword($encoder->encodePassword($client, $client->getPassword()));

            #Sauvegarde en BDD
            $em = $this->getDoctrine()->getManager();
            $em->persist($client);
            $em->flush();

            #Notification
            $this->addFlash('notice', 'Félicitation, vous pouvez vous connecter !');
            #Redirection
            return $this->redirectToRoute('security_connexion');
        }
#Passage à la vue du formulaire
        return $this->render('clientform/forminscription.html.twig', [
            'form' => $form->createView()
        ]);
    }
    /**
     * page du backoffice de gestion des cliens
     * @Route("/gestionClient", name="gestion_client")
     */
    public function gestionClient()
    {
        $client = $this->getDoctrine()
            ->getRepository(Clients::class)
            ->findAll();

        return $this->render('clientBack/clientBack.html.twig',[
            'client'=>$client
        ]);
    }
}