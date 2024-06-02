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
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

class PrestationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
    ->add('nom_de_la_prestation', TextType::class, [
        'label' => 'Nom de la prestation',
    ])
    ->add('description', TextareaType::class, [
        'label' => 'Description',
    ])
    ->add('createdAt', DateType::class, [
        'label' => 'Date de création',
        'widget' => 'single_text',
        'format' => 'dd-MM-yyyy', // Format de date, ajuste selon tes besoins
    ])
    ->add('user', EntityType::class, [
        'class' => User::class,
        'choice_label' => 'username', // Utilise une propriété pertinente à afficher
        'label' => 'Utilisateur',
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
;

    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Prestation::class,
        ]);
    }
}
