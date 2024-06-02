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

class FactureType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
    ->add('reference', TextType::class, [
        'label' => 'Référence',
    ])
    ->add('date', DateType::class, [
        'label' => 'Date',
        'widget' => 'single_text',
        'format' => 'dd-MM-yyyy', // Format de date, ajuste selon tes besoins
    ])
    ->add('prestation', EntityType::class, [
        'class' => Prestation::class,
        'choice_label' => 'nom', // Utilise une propriété pertinente à afficher
        'label' => 'Prestation',
    ])
    ->add('user', EntityType::class, [
        'class' => User::class,
        'choice_label' => 'username', // Utilise une propriété pertinente à afficher
        'label' => 'Utilisateur',
    ])
    ->add('contact', EntityType::class, [
        'class' => Contact::class,
        'choice_label' => 'nom_complet', // Utilise une propriété pertinente à afficher
        'label' => 'Contact',
    ])
    ->add('adresse', EntityType::class, [
        'class' => Adresse::class,
        'choice_label' => 'adresse_complete', // Utilise une propriété pertinente à afficher
        'label' => 'Adresse',
    ])
;

    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Facture::class,
        ]);
    }
}
