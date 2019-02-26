<?php
namespace App\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\Session\Flash\FlashBag;
use App\Entity\Contact;

    class ContactController extends Controller
    {
        /**
         * @Route("/contact", name="contact")
         */
        public function createAction(Request $request)
        {
            $contact = new Contact;
            $form = $this->createFormBuilder($contact)
                ->add('name', TextType::class, array('required'=>true,'label' => 'name', 'attr' => array('class' => 'form-control', 'style' => 'margin-bottom:15px')))
                ->add('email', EmailType::class, array('required'=>true,'label' => 'email', 'attr' => array('class' => 'form-control', 'style' => 'margin-bottom:15px')))
                ->add('message', TextareaType::class, array('required'=>true,'label' => 'message', 'attr' => array('class' => 'form-control')))
                ->add('Save', SubmitType::class, array('label' => 'submit', 'attr' => array('class' => 'btn btn-dark', 'style' => 'margin-top:15px')))
                ->getForm();
            # Handle form response
            $form->handleRequest($request);

            # check if form is submitted
            if ($form->isSubmitted() && $form->isValid()) {
                $name = $form['name']->getData();
                $email = $form['email']->getData();
                $message = $form['message']->getData();
                # set form data
                $contact->setName($name);
                $contact->setEmail($email);
                $contact->setMessage($message);
                # finally add data in database
                $sn = $this->getDoctrine()->getManager();
                $sn->persist($contact);
                $sn->flush();


                $message = (new \Swift_Message('Confirmation de Message à LocTaTrott'))
                    ->setFrom('loctatrott@gmail.com')
                    ->setTo($email)
                    ->setBody($this->renderView('component/sendemail.html.twig',array('name' => $name)),'text/html');
                $this->get('mailer')->send($message);
            }
            return $this->render('component/contact.html.twig',array('form' => $form->createView()));



        }

    }