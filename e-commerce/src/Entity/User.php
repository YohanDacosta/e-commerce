<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiProperty;
use DateTimeImmutable;
use Symfony\Component\Uid\Uuid;
use Symfony\Component\Serializer\Annotation\SerializedName;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;
use Doctrine\ORM\Mapping as ORM;
use App\Dto\UserDto;
use App\Repository\UserRepository;
use App\State\Processor\User\UserPostProcessor;
use ApiPlatform\Metadata\Get;
use ApiPlatform\Metadata\Post;
use ApiPlatform\Metadata\Patch;
use ApiPlatform\Metadata\Delete;
use ApiPlatform\Metadata\ApiResource;
use ApiPlatform\Metadata\GetCollection;
use App\Controller\UserUploadController;
use App\State\Processor\User\UserPatchProcessor;
use Symfony\Component\HttpFoundation\File\File;
use Symfony\Component\Serializer\Annotation\Groups;
use Vich\UploaderBundle\Mapping\Annotation as Vich;

#[Vich\Uploadable]
#[ORM\Entity(repositoryClass: UserRepository::class)]
#[ORM\UniqueConstraint(name: 'UNIQ_IDENTIFIER_EMAIL', fields: ['email'])]
#[ApiResource(
    operations: [
        new Get(),
        new GetCollection(),
        new Post(
            input: UserDto::class,
        	processor: UserPostProcessor::class,
            validationContext: ['groups' => ['user:create']],
            denormalizationContext: ['groups' => ['user:create']],
    	),
        new Post(
            uriTemplate: '/user/file/update',
            controller: UserUploadController::class,
            deserialize: true
        ),
        new Patch(
            input: UserDto::class,
        	processor: UserPatchProcessor::class,
            validationContext: ['groups' => ['user:update']],
            denormalizationContext: ['groups' => ['user:update']],
        ),
        new Delete()
    ],
    normalizationContext: ['groups' => ['user:read']],
)]
class User implements UserInterface, PasswordAuthenticatedUserInterface
{
    #[ORM\Id]
    #[ORM\Column(type: "uuid")]
    #[Groups(['user:read'])]
    private ?Uuid $id = null;

    #[ORM\Column(length: 255)]
    #[Groups(['user:read', 'user:write'])]
    private ?string $email = null;

    #[ORM\Column(length: 100)]
     #[Groups(groups: ['user:read', 'user:write'])]
    private ?string $firstname = null;

    #[ORM\Column(length: 200)]
     #[Groups(groups: ['user:read', 'user:write'])]
    private ?string $lastname = null;

    #[ORM\Column(length: 255)]
    #[Groups(groups: ['user:write'])]
    private ?string $password = null;

    #[SerializedName('password')] 
    #[Groups(['user:write'])]
    private ?string $plainPassword = null;

    #[ORM\Column]
    private array $roles = [];

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $address = null;

    #[ORM\Column]
    #[Groups(groups: ['user:read'])]
    private ?\DateTimeImmutable $createdAt = null;

    #[ORM\Column(nullable: true)]
    private ?\DateTimeImmutable $updatedAt = null;

    #[Vich\UploadableField(mapping: 'user', fileNameProperty: 'filePath')]
    private ?File $file = null;

    #[ApiProperty(writable: false)]
    #[ORM\Column(nullable: true)]
    public ?string $filePath = null;

    #[ApiProperty(types: ['https://schema.org/contentUrl'], writable: false)]
    #[Groups(groups: ['user:read'])]
    public ?string $contentUrl = null;

    public function __construct()
    {
        $this->id = Uuid::v4();
        $this->roles = $this->getRoles();
        $this->createdAt = new DateTimeImmutable("now");
    }

    public function getId(): ?Uuid
    {
        return $this->id;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): static
    {
        $this->email = $email;

        return $this;
    }

    public function getFirstname(): ?string
    {
        return $this->firstname;
    }

    public function setFirstname(string $firstname): static
    {
        $this->firstname = $firstname;

        return $this;
    }

    public function getLastname(): ?string
    {
        return $this->lastname;
    }

    public function setLastname(string $lastname): static
    {
        $this->lastname = $lastname;

        return $this;
    }

    /**
     * @see PasswordAuthenticatedUserInterface
     */
    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(string $password): static
    {
        $this->password = $password;

        return $this;
    }

    public function getPlainPassword(): ?string
    {
        return $this->plainPassword;
    }

    public function setPlainPassword(string $plainPassword): static
    {
        $this->plainPassword = $plainPassword;

        return $this;
    }

    /**
     * A visual identifier that represents this user.
     *
     * @see UserInterface
     */
    public function getUserIdentifier(): string
    {
        return (string) $this->email;
    }
    public function getRoles(): array
    {
        $roles = $this->roles;
        // guarantee every user at least has ROLE_USER
        $roles[] = "ROLE_USER";

        return array_unique($roles);
    }

    public function setRoles(array $roles): static
    {
        $this->roles = $roles;

        return $this;
    }

    public function getAddress(): ?string
    {
        return $this->address;
    }

    public function setAddress(?string $address): static
    {
        $this->address = $address;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeImmutable
    {
        return $this->createdAt;
    }

    public function setCreatedAt(\DateTimeImmutable $createdAt): static
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    public function getUpdatedAt(): ?\DateTimeImmutable
    {
        return $this->updatedAt;
    }

    public function setUpdatedAt(?\DateTimeImmutable $updatedAt): static
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    public function getFile(): ?File
    {
        return $this->file;
    }

    public function setFile(?File $file): static
    {
        $this->file = $file;

        if ($file !== null) {
            $this->updatedAt = new DateTimeImmutable('now');
        }

        return $this;
    }

    public function getContentUrl(): ?string
    {
        return $this->filePath ? '/uploads/users/' . $this->filePath : null;
    }

    public function eraseCredentials(): void
    {
        $this->plainPassword = null;
    }
}
