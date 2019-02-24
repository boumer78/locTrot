<?php
/**
 * Created by PhpStorm.
 * User: carrefour
 * Date: 19/02/2019
 * Time: 10:24
 */

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\FormError;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;



class AccountController extends AbstractController
{

    /**
     * Formulaire pour s'inscrire
     * @Route("/edit", name="edit_clients")
     */
    public function editAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $client = $this->getUser();
        $form = $this->createForm(PasswordType::class, $client);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {

            $passwordEncoder = $this->get('security.password_encoder');
            $oldPassword = $request->request->get('etiquettebundle_user')['oldPassword'];

            // Si l'ancien mot de passe est bon
            if ($passwordEncoder->isPasswordValid($client, $oldPassword)) {
                $newEncodedPassword = $passwordEncoder->encodePassword($client, $client->getPlainPassword());
                $client->setPassword($newEncodedPassword);

                $em->persist($client);
                $em->flush();

                $this->addFlash('notice', 'Votre mot de passe à bien été changé !');

                return $this->redirectToRoute('profile');
            } else {
                $form->addError(new FormError('Ancien mot de passe incorrect'));
            }
        }

        return $this->render('account/edit.html.twig', array(
            'form' => $form->createView(),
        ));
    }

}