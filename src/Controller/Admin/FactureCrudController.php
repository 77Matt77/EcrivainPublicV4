<?php

namespace App\Controller\Admin;

use App\Entity\Facture;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class FactureCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Facture::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnForm(),
            TextField::new('reference')->setLabel('Référence'),
            DateTimeField::new('date')->setLabel('Date')->setFormat('dd-MM-yyyy'), // Assure-toi d'importer DateField
            AssociationField::new('prestation')->setLabel('Prestation')->setCrudController(PrestationCrudController::class),
            AssociationField::new('user')->setLabel('Utilisateur')->setCrudController(UserCrudController::class),
            AssociationField::new('contact')->setLabel('Contact')->setCrudController(ContactCrudController::class),
            AssociationField::new('adresse')->setLabel('Adresse')->setCrudController(AdresseCrudController::class),
        ];
    }
    
    
}
