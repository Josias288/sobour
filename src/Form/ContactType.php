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
                'label' => "Nom",
                'attr' => array('class' => 'form-control', 'id' => 'fname'),
                'translation_domain' => 'messages',
            ))
            ->add('prenom', TextType::class, array(
                'label' => "Prenom",
                'attr' => array('class' => 'form-control', 'id' => 'lname'),
                'translation_domain' => 'messages'
            ))
            ->add('telephone', TextType::class, array(
                'label' => "Telephone",
                'attr' => array('class' => 'form-control'),
                'translation_domain' => 'messages'
            ))
            ->add('email', TextType::class, array(
                'label' => "Email",
                'attr' => array('class' => 'form-control', 'id' => 'email'),
                'translation_domain' => 'messages'
            ))
            ->add('objet', TextType::class, array(
                'label' => "Sujet",
                'attr' => array('class' => 'form-control', 'id' => 'subject'),
                'translation_domain' => 'messages'
            ))
            ->add('message', TextareaType::class, array(
                'label' => "Message",
                'attr' => array('class' => 'form-control', 'id' => 'message'),
                'translation_domain' => 'messages'
            ));
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Contact::class,
        ]);
    }
}
