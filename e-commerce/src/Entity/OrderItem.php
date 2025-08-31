<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use App\Repository\OrderItemRepository;
use DateTimeImmutable;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Uid\Uuid;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: OrderItemRepository::class)]
#[ApiResource(
    validationContext: ['groups' => ['orderItem:write']],
    normalizationContext: ['groups' => ['orderItem:read']]
)]
class OrderItem
{
    #[ORM\Id]
    #[ORM\Column(type: 'uuid')]
    #[Groups(groups: ['orderItem:read', 'order:read'])]
    private ?Uuid $id = null;

    #[ORM\Column]
    #[Assert\NotBlank(message: 'The quantity field should not be blank.', groups: ['orderItem:write'])]
    #[Groups(groups: ['orderItem:read', 'orderItem:write'])]
    private ?int $quantity = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 10, scale: 2)]
    #[Assert\NotBlank(message: 'The unit price field should not be blank.', groups: ['orderItem:write'])]
    #[Groups(groups: ['orderItem:read', 'orderItem:write'])]
    private ?string $unitPrice = null;

    #[ORM\Column]
    #[Groups(groups: ['orderItem:read'])]
    private ?\DateTimeImmutable $createdAt = null;

    #[ORM\Column(nullable: true)]
    private ?\DateTimeImmutable $updatedAt = null;

    #[ORM\ManyToOne(inversedBy: 'orderItem')]
    #[ORM\JoinColumn(name: 'order_id', referencedColumnName: 'id', nullable: false, onDelete: 'CASCADE')]
    #[Assert\NotBlank(message: 'The solicit field should not be blank.', groups: ['orderItem:write'])]
    #[Groups(groups: ['orderItem:read', 'orderItem:write'])]
    private ?Order $solicit = null;

    #[ORM\ManyToOne(inversedBy: 'orderItem')]
    #[ORM\JoinColumn(name: 'product_id', referencedColumnName: 'id', nullable: false)]
    #[Assert\NotBlank(message: 'The product field should not be blank.', groups: ['orderItem:write'])]
    #[Groups(groups: ['orderItem:read', 'orderItem:write'])]
    private ?Product $product = null;

    public function __construct()
    {
        $this->id = Uuid::v4();
        $this->createdAt = new DateTimeImmutable('now');
    }

    public function getId(): ?Uuid
    {
        return $this->id;
    }

    public function getQuantity(): ?int
    {
        return $this->quantity;
    }

    public function setQuantity(int $quantity): static
    {
        $this->quantity = $quantity;

        return $this;
    }

    public function getUnitPrice(): ?string
    {
        return $this->unitPrice;
    }

    public function setUnitPrice(string $unitPrice): static
    {
        $this->unitPrice = $unitPrice;

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

    public function getSolicit(): ?Order
    {
        return $this->solicit;
    }

    public function setSolicit(?Order $solicit): static
    {
        $this->solicit = $solicit;

        return $this;
    }

    public function getProduct(): ?Product
    {
        return $this->product;
    }

    public function setProduct(?Product $product): static
    {
        $this->product = $product;

        return $this;
    }
}
