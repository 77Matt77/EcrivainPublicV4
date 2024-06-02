<?php

namespace App\Form;

use App\Entity\User;
use App\Entity\Adresse;
use App\Entity\Contact;
use App\Entity\Facture;
use App\Entity\Prestation;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;

class UserType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
        ->add('email', EmailType::class, [
            'label' => 'Adresse email',
        ])
        ->add('roles', ChoiceType::class, [
            'label' => 'Rôles',
            'choices' => [
                'Utilisateur' => 'ROLE_USER',
                'Administrateur' => 'ROLE_ADMIN',
            ],
            'multiple' => true,
            'expanded' => true,
        ])
        ->add('password', PasswordType::class, [
            'label' => 'Mot de passe',
        ])
        ->add('nom', TextType::class, [
            'label' => 'Nom',
        ])
        ->add('prenom', TextType::class, [
            'label' => 'Prénom',
        ])
        ->add('adresse', EntityType::class, [
            'class' => Adresse::class,
            'choice_label' => 'adresse_complete', // Utilise une propriété pertinente à afficher
            'label' => 'Adresse',
        ])
        ->add('contact', EntityType::class, [
            'class' => Contact::class,
            'choice_label' => 'nom_complet', // Utilise une propriété pertinente à afficher
            'label' => 'Contact',
        ])
        ->add('facture', EntityType::class, [
            'class' => Facture::class,
            'choice_label' => 'numero', // Utilise une propriété pertinente à afficher
            'label' => 'Facture',
        ])
        ->add('prestation', EntityType::class, [
            'class' => Prestation::class,
            'choice_label' => 'nom', // Utilise une propriété pertinente à afficher
            'label' => 'Prestation',
        ])
    ;
    
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
