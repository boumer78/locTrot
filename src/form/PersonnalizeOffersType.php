<?php
/**
 * Created by PhpStorm.
 * User: kardah
 * Date: 2019-02-20
 * Time: 15:23
 */

namespace App\Form;


use App\Entity\Offers;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class PersonnalizeOffersType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('time_location', ChoiceType::class,[
                'label' => 'Choisissez la durée de location',
                'choices' => [ //le # va permettre de separé ma chaine de caractère avec un explode dans mon OffersController
                    '1 mois' => '45#1 mois',
                    '3 mois' => '25#3 mois',
                    '6 mois' => '20#6 mois',
                    '12 mois' => '15#12 mois'
                ]
             ])
            ->add('trottinettes', ChoiceType::class,[
                'label' => 'Selectionner votre Trott',
                'choices' => [
                    'Silver Trott' => '10#Silver Trott',
                    'Gold Trott' => '20#Gold Trott',
                    'Platinium Trott' => '40#Platinium Trott'
                ]])
            ->add('options', ChoiceType::class,[
                'label' => 'Sélectionner vos options',
                'choices' => [
                    'Assurances vol' => '3#Assurances vol',
                    'Assurance casse'=> '3#Assurances casse',
                    'Maintenance' => '5#Maintenance',
                    'Intervention sous 24H ou remplacement du produit' => '5#Intervention sous 24H ou remplacement du produit'
                ],
                'expanded' => true,
                'multiple' => true
            ])
        ->add('calculer',SubmitType::class,[
            'label' => 'Cliquez ici pour connaître le tarif'
        ]);
    }

    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => null,
        ]);
    }
}