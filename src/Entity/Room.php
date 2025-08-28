<?php

namespace App\Entity;

use App\Repository\RoomRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: RoomRepository::class)]
class Room
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $description = null;

    #[ORM\Column]
    private ?int $capacity = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $roomType = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 10, scale: 2, nullable: true)]
    private ?string $area = null; // in square meters

    #[ORM\Column(length: 5, nullable: true)]
    private ?string $floor = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $roomNumber = null;

    #[ORM\Column(type: Types::JSON, nullable: true)]
    private ?array $amenities = null; // Available amenities/equipment

    #[ORM\Column(type: Types::JSON, nullable: true)]
    private ?array $features = null;

    #[ORM\Column(options: ['default' => true])]
    private bool $isActive = true;

    #[ORM\Column(options: ['default' => false])]
    private bool $allowsFood = false;

    #[ORM\Column(options: ['default' => false])]
    private bool $hasAirConditioning = false;

    #[ORM\Column(options: ['default' => false])]
    private bool $hasHeating = false;

    #[ORM\Column(options: ['default' => false])]
    private bool $hasWifi = false;

    #[ORM\Column(options: ['default' => false])]
    private bool $hasProjector = false;

    #[ORM\Column(options: ['default' => false])]
    private bool $hasWhiteboard = false;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $notes = null;

    #[ORM\ManyToOne(inversedBy: 'rooms')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Location $location = null;

    #[ORM\Column]
    private \DateTimeImmutable $createdAt;

    #[ORM\OneToMany(targetEntity: Reservation::class, mappedBy: 'room', orphanRemoval: true)]
    private Collection $reservations;

    public function __construct()
    {
        $this->createdAt = new \DateTimeImmutable();
        $this->reservations = new ArrayCollection();
    }

    public function getId(): ?int
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


    public function getCapacity(): ?int
    {
        return $this->capacity;
    }

    public function setCapacity(int $capacity): static
    {
        $this->capacity = $capacity;

        return $this;
    }

    public function getRoomType(): ?string
    {
        return $this->roomType;
    }

    public function setRoomType(?string $roomType): static
    {
        $this->roomType = $roomType;
        return $this;
    }

    public function getRoomNumber(): ?string
    {
        return $this->roomNumber;
    }

    public function setRoomNumber(?string $roomNumber): static
    {
        $this->roomNumber = $roomNumber;
        return $this;
    }

    public function getAmenities(): ?array
    {
        return $this->amenities;
    }

    public function setAmenities(?array $amenities): static
    {
        $this->amenities = $amenities;
        return $this;
    }

    public function getFeatures(): ?array
    {
        return $this->features;
    }

    public function setFeatures(?array $features): static
    {
        $this->features = $features;
        return $this;
    }

    public function isActive(): bool
    {
        return $this->isActive;
    }

    public function setIsActive(bool $isActive): static
    {
        $this->isActive = $isActive;
        return $this;
    }

    public function allowsFood(): bool
    {
        return $this->allowsFood;
    }

    public function setAllowsFood(bool $allowsFood): static
    {
        $this->allowsFood = $allowsFood;
        return $this;
    }

    public function hasAirConditioning(): bool
    {
        return $this->hasAirConditioning;
    }

    public function setHasAirConditioning(bool $hasAirConditioning): static
    {
        $this->hasAirConditioning = $hasAirConditioning;
        return $this;
    }

    public function hasHeating(): bool
    {
        return $this->hasHeating;
    }

    public function setHasHeating(bool $hasHeating): static
    {
        $this->hasHeating = $hasHeating;
        return $this;
    }

    public function getNotes(): ?string
    {
        return $this->notes;
    }

    public function setNotes(?string $notes): void
    {
        $this->notes = $notes;
    }

    public function hasWhiteboard(): bool
    {
        return $this->hasWhiteboard;
    }

    public function setHasWhiteboard(bool $hasWhiteboard): void
    {
        $this->hasWhiteboard = $hasWhiteboard;
    }

    public function hasProjector(): bool
    {
        return $this->hasProjector;
    }

    public function setHasProjector(bool $hasProjector): void
    {
        $this->hasProjector = $hasProjector;
    }

    public function hasWifi(): bool
    {
        return $this->hasWifi;
    }

    public function setHasWifi(bool $hasWifi): void
    {
        $this->hasWifi = $hasWifi;
    }

    public function getFloor(): ?string
    {
        return $this->floor;
    }

    public function setFloor(?string $floor): void
    {
        $this->floor = $floor;
    }

    public function getArea(): ?string
    {
        return $this->area;
    }

    public function setArea(?string $area): void
    {
        $this->area = $area;
    }

    public function getLocation(): ?Location
    {
        return $this->location;
    }

    public function setLocation(?Location $location): static
    {
        $this->location = $location;

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

    /**
     * @return Collection<int, Reservation>
     */
    public function getReservations(): Collection
    {
        return $this->reservations;
    }

    public function addReservation(Reservation $reservation): static
    {
        if (!$this->reservations->contains($reservation)) {
            $this->reservations->add($reservation);
            $reservation->setRoom($this);
        }

        return $this;
    }

    public function removeReservation(Reservation $reservation): static
    {
        if ($this->reservations->removeElement($reservation)) {
            // set the owning side to null (unless already changed)
            if ($reservation->getRoom() === $this) {
                $reservation->setRoom(null);
            }
        }

        return $this;
    }
}
