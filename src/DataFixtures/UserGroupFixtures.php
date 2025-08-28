<?php

namespace App\DataFixtures;

use App\Entity\Location;
use App\Entity\Room;
use App\Entity\User;
use App\Entity\UserGroup;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class UserGroupFixtures extends Fixture implements DependentFixtureInterface
{
    public const GROUP_MANAGEMENT = 'group-management';
    public const GROUP_DEVELOPMENT = 'group-development';
    public const GROUP_SALES = 'group-sales';
    public const GROUP_MARKETING = 'group-marketing';
    public const GROUP_HR = 'group-hr';
    public const GROUP_TECH_LEADS = 'group-tech-leads';
    public const GROUP_INTERNS = 'group-interns';

    public function load(ObjectManager $manager): void
    {
        // Executive Management Group - Full access to all premium locations
        $managementGroup = new UserGroup();
        $managementGroup->setName('Executive Management');
        $managementGroup->setDescription('C-level executives and senior management with full access to all locations and premium facilities.');
        $managementGroup->setCreatedAt(new \DateTimeImmutable('2024-01-10'));

        // All locations access for management
        $managementGroup->addLocation($this->getReference(LocationFixtures::LOCATION_AMSTERDAM, Location::class));
        $managementGroup->addLocation($this->getReference(LocationFixtures::LOCATION_ROTTERDAM, Location::class));
        $managementGroup->addLocation($this->getReference(LocationFixtures::LOCATION_UTRECHT, Location::class));
        $managementGroup->addLocation($this->getReference(LocationFixtures::LOCATION_DEN_HAAG, Location::class));
        $managementGroup->addLocation($this->getReference(LocationFixtures::LOCATION_EINDHOVEN, Location::class));

        // Premium rooms for management
        $managementGroup->addRoom($this->getReference(RoomFixtures::ROOM_CONFERENCE, Room::class));
        $managementGroup->addRoom($this->getReference(RoomFixtures::ROOM_BOARDROOM, Room::class));
        $managementGroup->addRoom($this->getReference(RoomFixtures::ROOM_MEETING_1, Room::class));
        $managementGroup->addRoom($this->getReference(RoomFixtures::ROOM_STUDY, Room::class));

        // Add management users
        $managementGroup->addUser($this->getReference(UserFixtures::USER_ADMIN, User::class));
        $managementGroup->addUser($this->getReference(UserFixtures::USER_MANAGER, User::class));

        $manager->persist($managementGroup);
        $this->addReference(self::GROUP_MANAGEMENT, $managementGroup);

        // Development Team - Tech hubs and collaborative spaces
        $developmentGroup = new UserGroup();
        $developmentGroup->setName('Development Team');
        $developmentGroup->setDescription('Software developers and engineers with access to tech-focused locations and collaborative workspaces.');
        $developmentGroup->setCreatedAt(new \DateTimeImmutable('2024-01-11'));

        // Tech-focused locations
        $developmentGroup->addLocation($this->getReference(LocationFixtures::LOCATION_AMSTERDAM, Location::class));
        $developmentGroup->addLocation($this->getReference(LocationFixtures::LOCATION_UTRECHT, Location::class));
        $developmentGroup->addLocation($this->getReference(LocationFixtures::LOCATION_EINDHOVEN, Location::class));

        // Development-friendly rooms
        $developmentGroup->addRoom($this->getReference(RoomFixtures::ROOM_MEETING_1, Room::class));
        $developmentGroup->addRoom($this->getReference(RoomFixtures::ROOM_TRAINING, Room::class));
        $developmentGroup->addRoom($this->getReference(RoomFixtures::ROOM_WORKSHOP, Room::class));
        $developmentGroup->addRoom($this->getReference(RoomFixtures::ROOM_EVENT, Room::class));

        // Add development team users
        $developmentGroup->addUser($this->getReference(UserFixtures::USER_EMPLOYEE_1, User::class));

        $manager->persist($developmentGroup);
        $this->addReference(self::GROUP_DEVELOPMENT, $developmentGroup);

        // Sales Team - Business locations
        $salesGroup = new UserGroup();
        $salesGroup->setName('Sales Team');
        $salesGroup->setDescription('Sales representatives and account managers with access to business district locations for client meetings.');
        $salesGroup->setCreatedAt(new \DateTimeImmutable('2024-01-12'));

        // Business-focused locations
        $salesGroup->addLocation($this->getReference(LocationFixtures::LOCATION_AMSTERDAM, Location::class));
        $salesGroup->addLocation($this->getReference(LocationFixtures::LOCATION_ROTTERDAM, Location::class));
        $salesGroup->addLocation($this->getReference(LocationFixtures::LOCATION_DEN_HAAG, Location::class));

        // Client-meeting appropriate rooms
        $salesGroup->addRoom($this->getReference(RoomFixtures::ROOM_MEETING_2, Room::class));
        $salesGroup->addRoom($this->getReference(RoomFixtures::ROOM_BOARDROOM, Room::class));
        $salesGroup->addRoom($this->getReference(RoomFixtures::ROOM_CONFERENCE, Room::class));

        // Add sales team users
        $salesGroup->addUser($this->getReference(UserFixtures::USER_EMPLOYEE_2, User::class));

        $manager->persist($salesGroup);
        $this->addReference(self::GROUP_SALES, $salesGroup);

        // Marketing Team - Creative and event spaces
        $marketingGroup = new UserGroup();
        $marketingGroup->setName('Marketing Team');
        $marketingGroup->setDescription('Marketing professionals with access to creative spaces and event venues for campaigns and product launches.');
        $marketingGroup->setCreatedAt(new \DateTimeImmutable('2024-01-13'));

        // Creative and event locations
        $marketingGroup->addLocation($this->getReference(LocationFixtures::LOCATION_AMSTERDAM, Location::class));
        $marketingGroup->addLocation($this->getReference(LocationFixtures::LOCATION_UTRECHT, Location::class));
        $marketingGroup->addLocation($this->getReference(LocationFixtures::LOCATION_EINDHOVEN, Location::class));

        // Creative and presentation rooms
        $marketingGroup->addRoom($this->getReference(RoomFixtures::ROOM_WORKSHOP, Room::class));
        $marketingGroup->addRoom($this->getReference(RoomFixtures::ROOM_EVENT, Room::class));
        $marketingGroup->addRoom($this->getReference(RoomFixtures::ROOM_CONFERENCE, Room::class));
        $marketingGroup->addRoom($this->getReference(RoomFixtures::ROOM_TRAINING, Room::class));

        $manager->persist($marketingGroup);
        $this->addReference(self::GROUP_MARKETING, $marketingGroup);

        // Human Resources - All locations for recruitment and training
        $hrGroup = new UserGroup();
        $hrGroup->setName('Human Resources');
        $hrGroup->setDescription('HR team with company-wide access for recruitment, training, and employee engagement activities.');
        $hrGroup->setCreatedAt(new \DateTimeImmutable('2024-01-14'));

        // All locations for HR activities
        $hrGroup->addLocation($this->getReference(LocationFixtures::LOCATION_AMSTERDAM, Location::class));
        $hrGroup->addLocation($this->getReference(LocationFixtures::LOCATION_ROTTERDAM, Location::class));
        $hrGroup->addLocation($this->getReference(LocationFixtures::LOCATION_UTRECHT, Location::class));
        $hrGroup->addLocation($this->getReference(LocationFixtures::LOCATION_DEN_HAAG, Location::class));

        // Training and meeting rooms
        $hrGroup->addRoom($this->getReference(RoomFixtures::ROOM_TRAINING, Room::class));
        $hrGroup->addRoom($this->getReference(RoomFixtures::ROOM_WORKSHOP, Room::class));
        $hrGroup->addRoom($this->getReference(RoomFixtures::ROOM_MEETING_1, Room::class));
        $hrGroup->addRoom($this->getReference(RoomFixtures::ROOM_MEETING_2, Room::class));

        $manager->persist($hrGroup);
        $this->addReference(self::GROUP_HR, $hrGroup);

        // Tech Leads - Senior technical staff
        $techLeadsGroup = new UserGroup();
        $techLeadsGroup->setName('Technical Leads');
        $techLeadsGroup->setDescription('Senior technical staff and team leads with access to premium meeting spaces and all tech locations.');
        $techLeadsGroup->setCreatedAt(new \DateTimeImmutable('2024-01-15'));

        // Tech and premium locations
        $techLeadsGroup->addLocation($this->getReference(LocationFixtures::LOCATION_AMSTERDAM, Location::class));
        $techLeadsGroup->addLocation($this->getReference(LocationFixtures::LOCATION_EINDHOVEN, Location::class));
        $techLeadsGroup->addLocation($this->getReference(LocationFixtures::LOCATION_UTRECHT, Location::class));

        // Premium and tech rooms
        $techLeadsGroup->addRoom($this->getReference(RoomFixtures::ROOM_CONFERENCE, Room::class));
        $techLeadsGroup->addRoom($this->getReference(RoomFixtures::ROOM_MEETING_1, Room::class));
        $techLeadsGroup->addRoom($this->getReference(RoomFixtures::ROOM_WORKSHOP, Room::class));
        $techLeadsGroup->addRoom($this->getReference(RoomFixtures::ROOM_EVENT, Room::class));

        $manager->persist($techLeadsGroup);
        $this->addReference(self::GROUP_TECH_LEADS, $techLeadsGroup);

        // Interns & Trainees - Limited access including Den Haag for study room
        $internsGroup = new UserGroup();
        $internsGroup->setName('Interns & Trainees');
        $internsGroup->setDescription('Interns and trainees with access to training facilities and study rooms for learning and development.');
        $internsGroup->setCreatedAt(new \DateTimeImmutable('2024-01-16'));

        // Basic locations with good training facilities + Den Haag for study room
        $internsGroup->addLocation($this->getReference(LocationFixtures::LOCATION_UTRECHT, Location::class));
        $internsGroup->addLocation($this->getReference(LocationFixtures::LOCATION_EINDHOVEN, Location::class));
        $internsGroup->addLocation($this->getReference(LocationFixtures::LOCATION_DEN_HAAG, Location::class)); // COMPLETE this line!

        // Training, workshop and study rooms
        $internsGroup->addRoom($this->getReference(RoomFixtures::ROOM_TRAINING, Room::class));
        $internsGroup->addRoom($this->getReference(RoomFixtures::ROOM_WORKSHOP, Room::class));
        $internsGroup->addRoom($this->getReference(RoomFixtures::ROOM_STUDY, Room::class)); // Now works because Den Haag is added

        $manager->persist($internsGroup);
        $this->addReference(self::GROUP_INTERNS, $internsGroup);

        $manager->flush();
    }

    public function getDependencies(): array
    {
        return [
            LocationFixtures::class,
            RoomFixtures::class,
            UserFixtures::class,
        ];
    }
}
