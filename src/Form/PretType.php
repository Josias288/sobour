<?php

namespace App\Form;

use App\Entity\Pret;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class PretType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('montant', TextType::class, array(
                'label' => "Montant avec un intérêt de  3%",
                'attr' => array('class' => 'form-control',),
                'translation_domain' => 'messages.en.xlf'
            ))
            ->add('duree', TextType::class, array(
                'label' => "Durée en année",

                'attr' => array('class' => 'form-control', 'placeholder' => '4'),
                'translation_domain' => 'messages.en.xlf'
            ))
            ->add('type', TextType::class, array(
                'label' => "Type de prêt", 
                'attr' => array('class' => 'form-control', 'id' => 'fname'),
                'translation_domain' => 'messages.en.xlf'
            ))
            ->add('nom', TextType::class, array(
                'label' => "Nom",

                'attr' => array('class' => 'form-control'),
                'translation_domain' => 'messages.en.xlf'
            ))
            ->add('email', TextType::class, array(
                'label' => "Email",

                'attr' => array('class' => 'form-control'),
                'translation_domain' => 'messages.en.xlf'
            ))
            ->add('telephone', TextType::class, array(
                'label' => "telephone",

                'attr' => array('class' => 'form-control'),
                'translation_domain' => 'messages.en.xlf'
            ));
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Pret::class,
        ]);
    }
}
