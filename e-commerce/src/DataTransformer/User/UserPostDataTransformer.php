<?php

namespace App\DataTransformer\User;

use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use App\Entity\User;
use App\Dto\UserDto;

class UserPostDataTransformer
{
    public function __construct(
        private UserPasswordHasherInterface $userPasswordHasher
    )
    {}

    public function transform(UserDto $data): User
    {
        $user = new User();
        $user->setFirstname($data->getFirstname());
        $user->setLastname($data->getLastname());
        $user->setEmail($data->getEmail());
        $user->setPassword($this->userPasswordHasher->hashPassword($user, $data->getPassword()));

        return $user;
    }
}