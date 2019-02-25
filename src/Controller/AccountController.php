<?php
/**
 * Created by PhpStorm.
 * User: carrefour
 * Date: 19/02/2019
 * Time: 10:24
 */

namespace App\Controller;

use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorageInterface;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\FormError;
use Symfony\Component\Security\Core\User\UserInterface;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;


use App\Form\ResetPasswordType;
use App\Entity\Clients;



class AccountController extends Controller
{

    /**
     * Formulaire pour s'inscrire
     * @Route("/resetpassword", name="account_reset_password")
     */
    public function resetPassword(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $client = $this->getUser();
        $form = $this->createForm(ResetPasswordType::class, $client);


        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {

            $passwordEncoder = $this->get('security.password_encoder');
            $oldPassword = $request->request->get('reset_password')['oldPassword'];

            // Si l'ancien mot de passe est bon
            if ($passwordEncoder->isPasswordValid($client, $oldPassword)) {
                $newEncodedPassword = $passwordEncoder->encodePassword($client, $client->getPlainPassword());
                $client->setPassword($newEncodedPassword);

                $em->persist($client);
                $em->flush();

                $this->addFlash('notice', 'Votre mot de passe à bien été changé !');

                return $this->redirectToRoute('home_page');
            } else {
                $form->addError(new FormError('Ancien mot de passe incorrect'));
            }
        }

        return $this->render('account/edit.html.twig', array(
            'form' => $form->createView(),
        ));
    }
    /**
        * @Route("/deleteaccount", name="account_delete")
        * @param SessionInterface $session
        * @param TokenStorageInterface $tokenStorage
        * @return \Symfony\Component\HttpFoundation\Response
    */
    public function delete(SessionInterface $session, TokenStorageInterface $tokenStorage)
    {
        $client = $this->getUser();

        $em = $this->getDoctrine()->getManager();
        $em->remove($client);
        $em->flush();

        $tokenStorage->setToken(null);
        $session->invalidate();

        $this->addFlash('notice', 'Votre compte à été supprimé avec succès');

        return $this->redirectToRoute('home_page');
    }
}