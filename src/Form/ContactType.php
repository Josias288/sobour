<?php

namespace App\Form;

use App\Entity\Contact;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

class ContactType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nom', TextType::class, array(
                'label' => "Επίθετο",
                'attr' => array('class' => 'form-control', 'id' => 'fname')
            ))
            ->add('prenom', TextType::class, array(
                'label' => "Ονομα",
                'attr' => array('class' => 'form-control', 'id' => 'lname')
            ))
            ->add('telephone', TextType::class, array(
                'label' => "Τηλεφωνικοί αριθμοί",
                'attr' => array('class' => 'form-control')
            ))
            ->add('email', TextType::class, array(
                'label' => "ΗΛΕΚΤΡΟΝΙΚΗ ΔΙΕΥΘΥΝΣΗ",
                'attr' => array('class' => 'form-control', 'id' => 'email')
            ))
            ->add('objet', TextType::class, array(
                'label' => "θέμα",
                'attr' => array('class' => 'form-control', 'id' => 'subject')
            ))
            ->add('message', TextareaType::class, array(
                'label' => "Μήνυμα",
                'attr' => array('class' => 'form-control', 'id' => 'message')
            ));
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Contact::class,
        ]);
    }
}
