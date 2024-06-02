<?php

namespace App\Controller\Admin;

use App\Entity\Contact;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class ContactCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Contact::class;
    }

    
    public function configureFields(string $pageName): iterable
{
    return [
        IdField::new('id')->hideOnForm(),
        TextareaField::new('message')->setLabel('Message'),
        AssociationField::new('facture')->setLabel('Facture')->setCrudController(FactureCrudController::class),
        AssociationField::new('prestation')->setLabel('Prestation')->setCrudController(PrestationCrudController::class),
        AssociationField::new('adresse')->setLabel('Adresse')->setCrudController(AdresseCrudController::class),
        AssociationField::new('user')->setLabel('Utilisateur')->setCrudController(UserCrudController::class),
    ];
}

    
}
