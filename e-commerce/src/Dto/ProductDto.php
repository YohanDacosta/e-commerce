<?php

namespace App\Dto;

use Symfony\Component\HttpFoundation\File\File;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Validator\Constraints as Assert;
use Vich\UploaderBundle\Mapping\Annotation as Vich;

class ProductDto
{
    #[Vich\UploadableField(mapping: 'product', fileNameProperty: 'filePath')]
    #[Assert\NotBlank(message: "The file field should not be blank.", groups: ['product:file'])]
    #[Assert\File(
        maxSize: "2M",
        mimeTypes: ["image/jpeg", "image/png"],
        mimeTypesMessage: "Only images of type JPG o PNG.",
        maxSizeMessage: "The image must not be major than 2MB.",
        groups: ['product:file']
    )]
    #[Groups(groups: ['product:file'])]
    public ?File $file = null;
}