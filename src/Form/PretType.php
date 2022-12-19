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
                'label' => "Ποσό σε ευρώ για τόκο 3%.",
                'attr' => array('class' => 'form-control',)
            ))
            ->add('duree', TextType::class, array(
                'label' => "Διάρκεια σε χρόνια",

                'attr' => array('class' => 'form-control', 'placeholder' => '4')
            ))
            ->add('type', ChoiceType::class, array(
                'label' => "Είδος δανείου",
                'choices'  => [
                    'Επένδυση' => 'Investissement',
                    'Στεγαστικό δάνειο' => 'Prêt immobilier',
                    'Φοιτητικό δάνειο' => 'Prêt étudiant',
                    'Προσωπικό δάνειο' => 'Prêt personnel',
                    'Επαγγελματικό δάνειο' => 'Prêt professionnel',

                ],
                'attr' => array('class' => 'form-control', 'id' => 'fname')
            ));
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Pret::class,
        ]);
    }
}
