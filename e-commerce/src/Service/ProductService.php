<?php

namespace App\Service;

use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Uid\Uuid;
use Symfony\Component\HttpKernel\Exception;
use Symfony\Component\HttpFoundation\File\File;
use Symfony\Component\Validator\Validator\ValidatorInterface;
use App\Helper\Helper;
use App\Entity\Product;
use App\Dto\ProductDto;

class ProductService
{
    public function __construct(
        private EntityManagerInterface $em,
        private ValidatorInterface $validator
    )
    {}

    public function getById(Uuid $id)
    {
        return $this->em->getRepository(Product::class)->find($id);
    }

    public function updateUploadFile(File $file, Uuid $id)
    {
        $product = $this->getById($id);

        if (!$product) {
            throw new Exception\NotFoundHttpException('Product not found.');
        }
        $product->setFile($file);
        $this->em->flush();

        return $product;
    }

    public function validateProductDto(?File $file)
    {
        $productDto = new ProductDto();
        $productDto->file = $file;
        $validated =  $this->validator->validate($productDto, null, ['product:file']);
        
        return Helper::errorsPropertiesValidation($validated);
    }
}