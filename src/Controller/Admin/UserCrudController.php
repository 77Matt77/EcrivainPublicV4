<?php

namespace App\Controller\Admin;

use App\Entity\User;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ChoiceField;
use EasyCorp\Bundle\EasyAdminBundle\Field\EmailField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class UserCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return User::class;
    }

    
    
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnForm(),
            EmailField::new('email')->setLabel('Adresse email'),
            ChoiceField::new('roles')->setLabel('Rôles')
                ->setChoices([
                    'Utilisateur' => 'ROLE_USER',
                    'Administrateur' => 'ROLE_ADMIN',
                ])
                ->allowMultipleChoices(true)
                ->renderExpanded(true),
            TextField::new('password')->setLabel('Mot de passe')
                ->setFormTypeOption('attr.type', 'password')
                ->setHelp('Le mot de passe doit contenir au moins 8 caractères.'),
            TextField::new('nom')->setLabel('Nom'),
            TextField::new('prenom')->setLabel('Prénom'),
            AssociationField::new('adresse')->setLabel('Adresse')->setCrudController(AdresseCrudController::class),
            AssociationField::new('contact')->setLabel('Contact')->setCrudController(ContactCrudController::class),
            AssociationField::new('facture')->setLabel('Facture')->setCrudController(FactureCrudController::class),
            AssociationField::new('prestation')->setLabel('Prestation')->setCrudController(PrestationCrudController::class),
        ];
    }
}



    

