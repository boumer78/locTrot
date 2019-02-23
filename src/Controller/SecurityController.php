<?php
/**
 * Created by PhpStorm.
 * User: Etudiant
 * Date: 11/02/2019
 * Time: 15:28
 */

namespace App\Controller;


use App\Form\LoginFormType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class SecurityController  extends AbstractController
{
    /**
     * Created by PhpStorm.
     * User: Etudiant
     * Date: 11/02/2019
     * Time: 09:42
     */
    /**
     * formulaire de connexion
     * @Route("/connexion", name="security_connexion")
     *
     */
    public function connexion(AuthenticationUtils $authenticationUtils)
    {

        #Récuperation du formulaire de connexion
        $form = $this->createForm(LoginFormType::class,[
            'mail' => $authenticationUtils->getLastUsername()
        ]);
        #récupération du message d'erreur
        $error =$authenticationUtils->getLastAuthenticationError();

        $lastUsername = $authenticationUtils->getLastUsername();

        return $this->render('clientform/connexion.html.twig', [
            'form'=>$form->createView(),
            'last_username' => $lastUsername,
            'error'=>$error

        ]);

    }

    /**
     * formulaire de deconnexion
     * @Route("/deconnexion", name="security_deconnexion")
     */
    public function deconnexion()
    {
    }



}