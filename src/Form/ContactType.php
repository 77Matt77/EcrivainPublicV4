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
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

class ContactType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
    ->add('message', TextareaType::class, [
        'label' => 'Message',
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
    ->add('adresse', EntityType::class, [
        'class' => Adresse::class,
        'choice_label' => 'adresse_complete', // Utilise une propriété pertinente à afficher
        'label' => 'Adresse',
    ])
    ->add('user', EntityType::class, [
        'class' => User::class,
        'choice_label' => 'username', // Utilise une propriété pertinente à afficher
        'label' => 'Utilisateur',
    ])
;

    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Contact::class,
        ]);
    }
}
