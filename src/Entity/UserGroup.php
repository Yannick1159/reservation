<?php

namespace App\Entity;

use App\Repository\UserGroupRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: UserGroupRepository::class)]
class UserGroup
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\Column(length: 500, nullable: true)]
    private ?string $description = null;

    #[ORM\Column]
    private ?\DateTimeImmutable $createdAt = null;

    #[ORM\ManyToMany(targetEntity: User::class, mappedBy: 'userGroups')]
    private Collection $users;

    #[ORM\ManyToMany(targetEntity: Location::class, inversedBy: 'userGroups')]
    #[ORM\JoinTable(name: 'user_group_location')]
    private Collection $locations;

    #[ORM\ManyToMany(targetEntity: Room::class, inversedBy: 'userGroups')]
    #[ORM\JoinTable(name: 'user_group_room')]
    private Collection $rooms;

    public function __construct()
    {
        $this->locations = new ArrayCollection();
        $this->users = new ArrayCollection();
        $this->rooms = new ArrayCollection();
        $this->createdAt = new \DateTimeImmutable();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(?string $name): void
    {
        $this->name = $name;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): void
    {
        $this->description = $description;
    }

    public function getCreatedAt(): ?\DateTimeImmutable
    {
        return $this->createdAt;
    }

    public function setCreatedAt(?\DateTimeImmutable $createdAt): void
    {
        $this->createdAt = $createdAt;
    }

    public function getUsers(): Collection
    {
        return $this->users;
    }

    public function addUser(User $user): static
    {
        if (!$this->users->contains($user)) {
            $this->users->add($user);
            $user->addUserGroup($this);
        }
        return $this;
    }

    public function setUsers(Collection $users): void
    {

        foreach ($this->users as $user) {
            $user->removeUserGroup($this);
        }

        $this->users->clear();

        foreach ($users as $user) {
            $this->addUser($user);
        }
    }

    public function removeUser(User $user): static
    {
        if ($this->users->removeElement($user)) {
            $user->removeUserGroup($this);
        }
        return $this;
    }

    public function getLocations(): Collection
    {
        return $this->locations;
    }

    public function addLocation(Location $location): static
    {
        if (!$this->locations->contains($location)) {
            $this->locations->add($location);
        }
        return $this;
    }

    public function removeLocation(Location $location): static
    {
        $this->locations->removeElement($location);
        return $this;
    }

    public function hasAccessToLocation(Location $location): bool
    {
        return $this->locations->contains($location);
    }

    public function addRoom(Room $room): static
    {
        if (!$this->hasAccessToLocation($room->getLocation())) {
            throw new \InvalidArgumentException(
                sprintf(
                    'UserGroup "%s" heeft geen toegang tot location "%s" voor room "%s"',
                    $this->name,
                    $room->getLocation()->getName(),
                    $room->getName()
                )
            );
        }

        if (!$this->rooms->contains($room)) {
            $this->rooms->add($room);
        }
        return $this;
    }

    public function removeRoom(Room $room): static
    {
        $this->rooms->removeElement($room);
        return $this;
    }

    public function getRooms(): Collection
    {
        return $this->rooms;
    }

    public function getRoomsInLocation(Location $location): array
    {
        if (!$this->hasAccessToLocation($location)) {
            return [];
        }

        $roomsInLocation = [];
        foreach ($this->rooms as $room) {
            if ($room->getLocation() === $location) {
                $roomsInLocation[] = $room;
            }
        }
        return $roomsInLocation;
    }
}
