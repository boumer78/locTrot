<?php
/**
 * Created by PhpStorm.
 * User: Aks
 * Date: 15/02/2019
 * Time: 19:17
 */

namespace App\form;


use App\Entity\Scooter;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
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
                'label'=>'scooter model'
            ]);
    }
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Scooter::class
        ]);
    }



}