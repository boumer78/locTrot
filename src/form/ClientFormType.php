<?php
/**
 * Created by PhpStorm.
 * User: carrefour
 * Date: 15/02/2019
 * Time: 14:41
 */

namespace App\Form;


use App\Entity\Clients;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;



class ClientFormType extends AbstractType
{

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('lastname', TextType::class,[
                'required'=>true,
                'label'=>"Votre Nom",
                'attr' =>[
                    'placeholder' => " Votre Nom"
                ]
            ])
            ->add('firstname',TextType::class,[
                'required'=>true,
                'label'=>"Votre Prenom",
                'attr' =>[
                    'placeholder' => " Votre Prenom"
                ]
            ])
            ->add('mail',TextType::class,[
                'required'=>true,
                'label'=>"Votre email",
                'attr' =>[
                    'placeholder' => "Votre email"
                ]
            ])
            ->add('password', PasswordType::class,[
                'required'=>true,
                'label'=>"Votre mot de passe",
                'attr' =>[
                    'placeholder' => " Votre mot de passe"
                ]
            ])
            ->add('Envoyer', SubmitType::class, [
            'label' => 'Connexion',
                'attr' => array('class' => 'btn btn-dark')
            ]);

    }
    public function getBlockPrefix()
    {
        return 'form';
    }
    public function configureOptions(OptionsResolver $resolver)
    {
        #Mon formulaire s'attend a recevoir une instance de article
        #Tout autre date ne fonctionnera pas...
        $resolver->setDefault('data_class', Clients::class);
    }

}