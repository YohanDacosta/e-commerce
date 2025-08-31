<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use App\Repository\ProductRepository;
use DateTimeImmutable;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Uid\Uuid;

#[ORM\Entity(repositoryClass: ProductRepository::class)]
#[ApiResource(
    validationContext: ['groups' => ['product:write']],
    normalizationContext: ['groups' => ['product:read']]
)]
class Product
{
    #[ORM\Id]
    #[ORM\Column(type: 'uuid')]
     #[Groups(groups: ['product:read', 'orderItem:read', 'category:read'])]
    private ?Uuid $id = null;

    #[ORM\Column(length: 100)]
    #[Assert\NotBlank(message: 'The name field should not be blank.', groups: ['product:write'])]
     #[Groups(groups: ['product:read', 'product:write'])]
    private ?string $name = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
     #[Groups(groups: ['product:read', 'product:write'])]
    private ?string $description = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 10, scale: 2)]
     #[Assert\NotBlank(message: 'The price field should not be blank.', groups: ['product:write'])]
     #[Groups(groups: ['product:read', 'product:write'])]
    private ?string $price = null;

    #[ORM\Column(nullable: true)]
     #[Groups(groups: ['product:read', 'product:write'])]
    private ?int $stock = null;

    #[ORM\Column]
     #[Groups(groups: ['product:read'])]
    private ?\DateTimeImmutable $createdAt = null;

    #[ORM\Column(nullable: true)]
     #[Groups(groups: ['product:write'])]
    private ?\DateTimeImmutable $updatedAt = null;

    #[ORM\ManyToOne(inversedBy: 'product')]
     #[Assert\NotBlank(message: 'The category field should not be blank.', groups: ['product:write'])]
     #[Groups(groups: ['product:read', 'product:write'])]
    private ?Category $category = null;

    /**
     * @var Collection<int, OrderItem>
     */
    #[ORM\OneToMany(targetEntity: OrderItem::class, mappedBy: 'product')]
     #[Groups(groups: ['product:write'])]
    private Collection $orderItem;

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
