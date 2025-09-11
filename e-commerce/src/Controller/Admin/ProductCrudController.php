<?php

namespace App\Controller\Admin;

use App\Entity\Product;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\MoneyField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use Symfony\Component\Security\Http\Attribute\IsGranted;

#[IsGranted('ROLE_ADMIN')]
class ProductCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Product::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('name'),
            MoneyField::new('price')->setCurrency('CHF'),
            AssociationField::new('category')->autocomplete(),
            IntegerField::new('stock')->onlyOnForms(), 
            TextField::new('description'),
            ImageField::new('filePath', 'File')
                ->setBasePath('uploads/products')
                ->formatValue(fn($value, $entity) => $value ? $entity->getContentUrl() : 'uploads/default.jpg')
                ->setUploadDir('public/uploads/products'),
            DateTimeField::new('createdAt')->onlyOnIndex(),
        ];
    }
}
