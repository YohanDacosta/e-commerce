<?php

namespace App\Entity;

use DateTimeImmutable;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\Collection;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Uid\Uuid;
use Symfony\Component\HttpFoundation\File\File;
use App\Controller\ProductUploadController;
use App\Repository\ProductRepository;
use Vich\UploaderBundle\Mapping\Annotation as Vich;
use ApiPlatform\Metadata\ApiProperty;
use ApiPlatform\Metadata\ApiResource;
use ApiPlatform\Metadata\Delete;
use ApiPlatform\Metadata\Get;
use ApiPlatform\Metadata\GetCollection;
use ApiPlatform\Metadata\Patch;
use ApiPlatform\Metadata\Post;

#[Vich\Uploadable]
#[ORM\Entity(repositoryClass: ProductRepository::class)]
#[ApiResource(
    normalizationContext: ['groups' => ['product:read']],
    operations: [
        new GetCollection(),
        new Get(),
        new Post(
            validationContext: ['groups' => ['product:create']],
        ),
        new Post(
            uriTemplate: '/product/file/update',
            controller: ProductUploadController::class,
            deserialize: false
        ),
        new Patch(
            validationContext: ['groups' => ['product:update']],
        ),
        new Delete(),
    ]
)]
class Product
{
    #[ORM\Id]
    #[ORM\Column(type: 'uuid')]
    #[Groups(groups: ['product:read', 'orderItem:read', 'category:read'])]
    private ?Uuid $id = null;

    #[ORM\Column(length: 100)]
    #[Assert\NotBlank(message: 'The name field should not be blank.', groups: ['product:create', 'product:update'])]
    #[Groups(groups: ['product:read', 'product:create'])]
    private ?string $name = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    #[Groups(groups: ['product:read', 'product:create'])]
    private ?string $description = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 10, scale: 2)]
    #[Assert\NotBlank(message: 'The price field should not be blank.', groups: ['product:create', 'product:update'])]
    #[Groups(groups: ['product:read', 'product:create'])]
    private ?string $price = null;

    #[ORM\Column(nullable: true)]
    #[Groups(groups: ['product:read', 'product:create'])]
    private ?int $stock = null;

    #[ORM\Column]
    #[Groups(groups: ['product:read'])]
    private ?\DateTimeImmutable $createdAt = null;

    #[ORM\Column(nullable: true)]
    #[Groups(groups: ['product:create'])]
    private ?\DateTimeImmutable $updatedAt = null;

    #[ORM\ManyToOne(inversedBy: 'product')]
    #[Assert\NotBlank(message: 'The category field should not be blank.', groups: ['product:create'])]
    #[Groups(groups: ['product:read', 'product:create'])]
    private ?Category $category = null;

    /**
     * @var Collection<int, OrderItem>
     */
    #[ORM\OneToMany(targetEntity: OrderItem::class, mappedBy: 'product')]
    #[Groups(groups: ['product:create'])]
    private Collection $orderItem;

    #[ApiProperty(types: ['https://schema.org/contentUrl'], writable: false)]
    #[Groups(groups: ['product:read'])]
    public ?string $contentUrl = null;

    #[Vich\UploadableField(mapping: 'product', fileNameProperty: 'filePath')]
    #[Assert\NotNull(message: "The file field should not be blank.", groups: ['product:create', 'product:file'])]
    #[Assert\File(
        maxSize: "2M",
        mimeTypes: ["image/jpeg", "image/png"],
        mimeTypesMessage: "Only images of type JPG o PNG.",
        maxSizeMessage: "The image must not be major than 2MB.",
        groups: ['product:create', 'product:file']
    )]
    #[Groups(groups: ['product:create', 'product:file'])]
    public ?File $file = null;

    #[ApiProperty(writable: false)]
    #[ORM\Column(nullable: true)]
    public ?string $filePath = null;

    public function __construct()
    {
        $this->id = Uuid::v4();
        $this->stock = 0;
        $this->orderItem = new ArrayCollection();
        $this->createdAt = new DateTimeImmutable('now');
    }

    public function getId(): ?Uuid
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): static
    {
        $this->name = $name;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): static
    {
        $this->description = $description;

        return $this;
    }

    public function getPrice(): ?string
    {
        return $this->price;
    }

    public function setPrice(string $price): static
    {
        $this->price = $price;

        return $this;
    }

    public function getStock(): ?int
    {
        return $this->stock;
    }

    public function setStock(?int $stock): static
    {
        $this->stock = $stock;

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

    public function getCategory(): ?Category
    {
        return $this->category;
    }

    public function setCategory(?Category $category): static
    {
        $this->category = $category;

        return $this;
    }

    public function getFile(): ?File
    {
        return $this->file;
    }

    public function setFile(File $file): static
    {
        $this->file = $file;

        if ($file !== null) {
            $this->updatedAt = new DateTimeImmutable('now');
        }

        return $this;
    }

    public function getContentUrl(): ?string
    {
        return $this->filePath ? '/uploads/products/' . $this->filePath : null;
    }

    /**
     * @return Collection<int, OrderItem>
     */
    public function getOrderItem(): Collection
    {
        return $this->orderItem;
    }

    public function addOrderItem(OrderItem $orderItem): static
    {
        if (!$this->orderItem->contains($orderItem)) {
            $this->orderItem->add($orderItem);
            $orderItem->setProduct($this);
        }

        return $this;
    }

    public function removeOrderItem(OrderItem $orderItem): static
    {
        if ($this->orderItem->removeElement($orderItem)) {
            // set the owning side to null (unless already changed)
            if ($orderItem->getProduct() === $this) {
                $orderItem->setProduct(null);
            }
        }

        return $this;
    }
}
