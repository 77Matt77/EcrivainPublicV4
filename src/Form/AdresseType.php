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

class AdresseType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
    ->add('numero_de_la_voie', TextType::class, [
        'label' => 'Numéro de la voie',
    ])
    ->add('voie', TextType::class, [
        'label' => 'Nom de la voie',
    ])
    ->add('code_postal', TextType::class, [
        'label' => 'Code postal',
    ])
    ->add('ville', TextType::class, [
        'label' => 'Ville',
    ])
    ->add('contact', EntityType::class, [
        'class' => Contact::class,
        'choice_label' => 'nom_complet', // Choisir une propriété pertinente à afficher
        'label' => 'Contact', // Utiliser un label explicite
    ])
    ->add('facture', EntityType::class, [
        'class' => Facture::class,
        'choice_label' => 'numero', // Choisir une propriété pertinente à afficher
        'label' => 'Facture', // Utiliser un label explicite
    ])
    ->add('prestation', EntityType::class, [
        'class' => Prestation::class,
        'choice_label' => 'nom', // Choisir une propriété pertinente à afficher
        'label' => 'Prestation', // Utiliser un label explicite
    ])
    ->add('user', EntityType::class, [
        'class' => User::class,
        'choice_label' => 'username', // Choisir une propriété pertinente à afficher
        'label' => 'Utilisateur', // Utiliser un label explicite
    ])
;

    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Adresse::class,
        ]);
    }
}
