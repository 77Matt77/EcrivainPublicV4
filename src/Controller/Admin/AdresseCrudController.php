<?php

namespace App\Controller\Admin;

use App\Entity\Adresse;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class AdresseCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Adresse::class;
    }

    
    public function configureFields(string $pageName): iterable
{
    return [
        IdField::new('id')->hideOnForm(),
        TextField::new('numero_de_la_voie')->setLabel('Numéro de la voie'),
        TextField::new('voie')->setLabel('Nom de la voie'),
        TextField::new('code_postal')->setLabel('Code postal'),
        TextField::new('ville')->setLabel('Ville'),
        AssociationField::new('contact')->setLabel('Contact')->setCrudController(ContactCrudController::class),
        AssociationField::new('facture')->setLabel('Facture')->setCrudController(FactureCrudController::class),
        AssociationField::new('prestation')->setLabel('Prestation')->setCrudController(PrestationCrudController::class),
        AssociationField::new('user')->setLabel('Utilisateur')->setCrudController(UserCrudController::class),
    ];
}

    
}
