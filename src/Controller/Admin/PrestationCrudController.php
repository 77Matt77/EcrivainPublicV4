<?php

namespace App\Controller\Admin;

use App\Entity\Prestation;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class PrestationCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Prestation::class;
    }

    
    public function configureFields(string $pageName): iterable
{
    return [
        IdField::new('id')->hideOnForm(),
        TextField::new('nom_de_la_prestation')->setLabel('Nom de la prestation'),
        TextareaField::new('description')->setLabel('Description'),
        DateField::new('createdAt')->setLabel('Date de création')->setFormat('dd-MM-yyyy'), // Assure-toi d'importer DateField
        AssociationField::new('user')->setLabel('Utilisateur')->setCrudController(UserCrudController::class),
        AssociationField::new('adresse')->setLabel('Adresse')->setCrudController(AdresseCrudController::class),
        AssociationField::new('contact')->setLabel('Contact')->setCrudController(ContactCrudController::class),
        AssociationField::new('facture')->setLabel('Facture')->setCrudController(FactureCrudController::class),
    ];
}

    
}
