<?php
/**
 * Created by PhpStorm.
 * User: Aks
 * Date: 15/02/2019
 * Time: 19:17
 */

namespace App\Form;


use App\Entity\Scooter;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;


class ScooterFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('scooter_name',TextType::class,[
                'required'=>true,
                'label'=>"Scooter name"
            ])
            ->add('scooter_model',TextType::class,[
                'required'=>true,
                'label'=>'scooter model'
            ])
            ->add('id_offer',ChoiceType::class,[
                'required'=>true,
                'choices'=>[
                    'Offre 1'=> 0,
                    'Offre 2'=> 1,
                    'Offre 3'=> 2
                ]
            ]);
    }
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Scooter::class
        ]);
    }



}