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
                'label' => "Montant avec un intérêt de  3%.",
                'attr' => array('class' => 'form-control',),
                'translation_domain' => 'messages'
            ))
            ->add('duree', TextType::class, array(
                'label' => "Durée en année",

                'attr' => array('class' => 'form-control', 'placeholder' => '4'),
                'translation_domain' => 'messages'
            ))
            ->add('type', ChoiceType::class, array(
                'label' => "Type de prêt",
                'choices'  => [
                    'Investissement' => 'Investissement',
                    'Prêt immobilier' => 'Prêt immobilier',
                    'Prêt étudiant' => 'Prêt étudiant',
                    'Prêt personnel' => 'Prêt personnel',
                    'Prêt professionnel' => 'Prêt professionnel',

                ],
                'attr' => array('class' => 'form-control', 'id' => 'fname'),
                'translation_domain' => 'messages'
            ))
            ->add('nom', TextType::class, array(
                'label' => "Nom",

                'attr' => array('class' => 'form-control'),
                'translation_domain' => 'messages'
            ))
            ->add('email', TextType::class, array(
                'label' => "Email",

                'attr' => array('class' => 'form-control'),
                'translation_domain' => 'messages'
            ))
            ->add('telephone', TextType::class, array(
                'label' => "telephone",

                'attr' => array('class' => 'form-control'),
                'translation_domain' => 'messages'
            ));
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Pret::class,
        ]);
    }
}
