<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\ProductRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * @ApiResource(
 *     attributes={
 *          "order"={"launchedAt":"DESC"}
 *     },
 *     normalizationContext={"groups"={"read:product"}},
 *     collectionOperations={
 *          "get",
 *          "post"={
 *              "access_control"="is_granted('ROLE_ADMIN')"
 *          }
 *     },
 *    itemOperations={
 *        "get"={
 *             "normalization_context"={"groups"={"read:product","read:product:detail"}}
 *         },
 *        "delete"={
 *            "access_control"="is_granted('ROLE_ADMIN')"
 *        },
 *        "put"={
 *            "access_control"="is_granted('ROLE_ADMIN')"
 *        },
 *        "patch"={
 *            "access_control"="is_granted('ROLE_ADMIN')"
 *        }
 *    }
 * )
 * @ORM\Entity(repositoryClass=ProductRepository::class)
 */
class Product
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\Length(min=4, minMessage="Le nom doit faire au moins 2 caractères")
     * @Groups({"read:product"})
     */
    private $name;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\Length(min=5, minMessage="La référence doit faire au moins 5 caractères")
     * @Groups({"read:product"})
     */
    private $reference;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Groups({"read:product:detail"})
     */
    private $picturePath;

    /**
     * @ORM\Column(type="float")
     * @Groups({"read:product:detail"})
     */
    private $price;

    /**
     * @ORM\Column(type="float")
     * @Groups({"read:product:detail"})
     */
    private $display;

    /**
     * @ORM\Column(type="float")
     * @Groups({"read:product:detail"})
     */
    private $height;

    /**
     * @ORM\Column(type="float")
     * @Groups({"read:product:detail"})
     */
    private $width;

    /**
     * @ORM\Column(type="float")
     * @Groups({"read:product:detail"})
     */
    private $depth;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"read:product:detail"})
     */
    private $camera;

    /**
     * @ORM\Column(type="text", nullable=true)
     * @Groups({"read:product:detail"})
     */
    private $description;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     * @Groups({"read:product:detail"})
     */
    private $launchedAt;

    /**
     * @Gedmo\Timestampable (on="create")
     * @ORM\Column(type="datetime")
     */
    private $createdAt;

    /**
     * @Gedmo\Timestampable(on="update")
     * @ORM\Column(type="datetime")
     */
    private $updatedAt;

    /**
     * @ORM\ManyToMany(targetEntity=Color::class, inversedBy="products")
     * @Groups({"read:product:detail"})
     */
    private $colors;

    /**
     * @ORM\ManyToMany(targetEntity=Capacity::class, inversedBy="products")
     * @Groups({"read:product:detail"})
     */
    private $capacitys;

    public function __construct()
    {
        $this->productColors = new ArrayCollection();
        $this->colors = new ArrayCollection();
        $this->capacitys = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getReference(): ?string
    {
        return $this->reference;
    }

    public function setReference(string $reference): self
    {
        $this->reference = $reference;

        return $this;
    }

    public function getPicturePath(): ?string
    {
        return $this->picturePath;
    }

    public function setPicturePath(?string $picturePath): self
    {
        $this->picturePath = $picturePath;

        return $this;
    }

    public function getPrice(): ?float
    {
        return $this->price;
    }

    public function setPrice(float $price): self
    {
        $this->price = $price;

        return $this;
    }

    public function getDisplay(): ?float
    {
        return $this->display;
    }

    public function setDisplay(float $display): self
    {
        $this->display = $display;

        return $this;
    }

    public function getHeight(): ?float
    {
        return $this->height;
    }

    public function setHeight(float $height): self
    {
        $this->height = $height;

        return $this;
    }

    public function getWidth(): ?float
    {
        return $this->width;
    }

    public function setWidth(float $width): self
    {
        $this->width = $width;

        return $this;
    }

    public function getDepth(): ?float
    {
        return $this->depth;
    }

    public function setDepth(float $depth): self
    {
        $this->depth = $depth;

        return $this;
    }

    public function getCamera(): ?string
    {
        return $this->camera;
    }

    public function setCamera(string $camera): self
    {
        $this->camera = $camera;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getLaunchedAt(): ?\DateTimeInterface
    {
        return $this->launchedAt;
    }

    public function setLaunchedAt(?\DateTimeInterface $launchedAt): self
    {
        $this->launchedAt = $launchedAt;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeInterface
    {
        return $this->createdAt;
    }

    public function setCreatedAt(\DateTimeInterface $createdAt): self
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    public function getUpdatedAt(): ?\DateTimeInterface
    {
        return $this->updatedAt;
    }

    public function setUpdatedAt(\DateTimeInterface $updatedAt): self
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    /**
     * @return Collection|Color[]
     */
    public function getColors(): Collection
    {
        return $this->colors;
    }

    public function addColor(Color $color): self
    {
        if (!$this->colors->contains($color)) {
            $this->colors[] = $color;
        }

        return $this;
    }

    public function removeColor(Color $color): self
    {
        $this->colors->removeElement($color);

        return $this;
    }

    /**
     * @return Collection|Capacity[]
     */
    public function getCapacitys(): Collection
    {
        return $this->capacitys;
    }

    public function addCapacity(Capacity $capacity): self
    {
        if (!$this->capacitys->contains($capacity)) {
            $this->capacitys[] = $capacity;
        }

        return $this;
    }

    public function removeCapacity(Capacity $capacity): self
    {
        $this->capacitys->removeElement($capacity);

        return $this;
    }
}
