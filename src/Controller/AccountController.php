<?php
/**
 * Created by PhpStorm.
 * User: carrefour
 * Date: 22/02/2019
 * Time: 10:43
 */

namespace App\Controller;



use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\FormError;
use Symfony\Component\Security\Core\User\UserInterface;

use App\form\ResetPasswordType;
use App\Entity\Clients;


class AccountController extends Controller
{


    public function resetPassword(Request $request)
    {

        $em = $this->getDoctrine()->getManager();
        $clients = $this->getUser();
        $form = $this->createForm(ResetPasswordType::class, $clients);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {

            $passwordEncoder = $this->get('security.password_encoder');
            $oldPassword = $request->request->get('reset_password')['oldPassword'];

            // Si l'ancien mot de passe est bon
            if ($passwordEncoder->isPasswordValid($clients, $oldPassword)) {
                $newEncodedPassword = $passwordEncoder->encodePassword($clients, $clients->getPlainPassword());
                $clients->setPassword($newEncodedPassword);

                $em->persist($clients);
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


}