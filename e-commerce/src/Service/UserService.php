<?php

namespace App\Service;

use App\Dto\UserDto;
use App\Entity\User;
use App\Helper\Helper;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Uid\Uuid;
use Symfony\Component\HttpKernel\Exception;
use Symfony\Component\HttpFoundation\File\File;
use Symfony\Component\Validator\Validator\ValidatorInterface;

class UserService
{
    public function __construct(
        private EntityManagerInterface $em,
        private ValidatorInterface $validator
    )
    {}

    public function getById(Uuid $id)
    {
        return $this->em->getRepository(User::class)->find($id);
    }

    public function updateUploadFile(File $file, Uuid $id)
    {
        $user = $this->getById($id);

        if (!$user) {
            throw new Exception\NotFoundHttpException('Product not found.');
        }
        $user->setFile($file);
        $this->em->flush();

        return $user;
    }

    public function validateUserDto(?File $file)
    {
        $userDto = new UserDto();
        $userDto->file = $file;
        $validated =  $this->validator->validate($userDto, null, ['user:file']);
        
        return Helper::errorsPropertiesValidation($validated);
    }
}