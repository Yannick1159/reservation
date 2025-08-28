<?php

namespace App\DataFixtures;

use App\Entity\Location;
use App\Entity\Room;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class RoomFixtures extends Fixture implements DependentFixtureInterface
{
    public const ROOM_MEETING_1 = 'room-meeting-1';
    public const ROOM_MEETING_2 = 'room-meeting-2';
    public const ROOM_CONFERENCE = 'room-conference';
    public const ROOM_TRAINING = 'room-training';
    public const ROOM_BOARDROOM = 'room-boardroom';
    public const ROOM_WORKSHOP = 'room-workshop';
    public const ROOM_STUDY = 'room-study';
    public const ROOM_EVENT = 'room-event';

    public function load(ObjectManager $manager): void
    {
        // Amsterdam rooms - Premium location
        $meetingRoom1 = new Room();
        $meetingRoom1->setName('Meeting Room A1');
        $meetingRoom1->setDescription('Modern meeting room with panoramic city views and state-of-the-art technology.');
        $meetingRoom1->setCapacity(8);
        $meetingRoom1->setRoomType('meeting_room');
        $meetingRoom1->setArea('25.50');
        $meetingRoom1->setFloor('15');
        $meetingRoom1->setRoomNumber('A1-1501');
        $meetingRoom1->setAmenities(['projector', 'screen', 'whiteboard', 'tv_monitor', 'video_conferencing', 'sound_system', 'coffee_machine']);
        $meetingRoom1->setFeatures(['natural_light', 'windows', 'soundproof', 'movable_furniture', 'parking_available']);
        $meetingRoom1->setIsActive(true);
        $meetingRoom1->setAllowsFood(true);
        $meetingRoom1->setHasAirConditioning(true);
        $meetingRoom1->setHasHeating(true);
        $meetingRoom1->setHasWifi(true);
        $meetingRoom1->setHasProjector(true);
        $meetingRoom1->setHasWhiteboard(true);
        $meetingRoom1->setNotes('Premium meeting room with excellent natural lighting. Coffee and tea facilities included.');
        $meetingRoom1->setLocation($this->getReference(LocationFixtures::LOCATION_AMSTERDAM, Location::class));
        $meetingRoom1->setCreatedAt(new \DateTimeImmutable('2024-01-05'));
        $manager->persist($meetingRoom1);
        $this->addReference(self::ROOM_MEETING_1, $meetingRoom1);

        $conferenceRoom = new Room();
        $conferenceRoom->setName('Conference Room A2');
        $conferenceRoom->setDescription('Large conference room ideal for presentations and board meetings with professional setup.');
        $conferenceRoom->setCapacity(20);
        $conferenceRoom->setRoomType('conference_room');
        $conferenceRoom->setArea('45.75');
        $conferenceRoom->setFloor('16');
        $conferenceRoom->setRoomNumber('A2-1601');
        $conferenceRoom->setAmenities(['projector', 'screen', 'whiteboard', 'flipchart', 'tv_monitor', 'video_conferencing', 'sound_system', 'microphone', 'phone', 'catering_setup']);
        $conferenceRoom->setFeatures(['natural_light', 'windows', 'soundproof', 'high_ceiling', 'storage_space', 'parking_available']);
        $conferenceRoom->setIsActive(true);
        $conferenceRoom->setAllowsFood(true);
        $conferenceRoom->setHasAirConditioning(true);
        $conferenceRoom->setHasHeating(true);
        $conferenceRoom->setHasWifi(true);
        $conferenceRoom->setHasProjector(true);
        $conferenceRoom->setHasWhiteboard(true);
        $conferenceRoom->setNotes('Executive conference room with full catering support and advanced AV equipment.');
        $conferenceRoom->setLocation($this->getReference(LocationFixtures::LOCATION_AMSTERDAM, Location::class));
        $conferenceRoom->setCreatedAt(new \DateTimeImmutable('2024-01-05'));
        $manager->persist($conferenceRoom);
        $this->addReference(self::ROOM_CONFERENCE, $conferenceRoom);

        // Rotterdam rooms - Business district
        $meetingRoom2 = new Room();
        $meetingRoom2->setName('Meeting Room R1');
        $meetingRoom2->setDescription('Compact meeting room with harbor views, perfect for small team meetings.');
        $meetingRoom2->setCapacity(6);
        $meetingRoom2->setRoomType('meeting_room');
        $meetingRoom2->setArea('18.25');
        $meetingRoom2->setFloor('17');
        $meetingRoom2->setRoomNumber('R1-1701');
        $meetingRoom2->setAmenities(['projector', 'whiteboard', 'tv_monitor', 'video_conferencing', 'coffee_machine']);
        $meetingRoom2->setFeatures(['natural_light', 'windows', 'movable_furniture', 'parking_available']);
        $meetingRoom2->setIsActive(true);
        $meetingRoom2->setAllowsFood(false);
        $meetingRoom2->setHasAirConditioning(true);
        $meetingRoom2->setHasHeating(true);
        $meetingRoom2->setHasWifi(true);
        $meetingRoom2->setHasProjector(true);
        $meetingRoom2->setHasWhiteboard(true);
        $meetingRoom2->setNotes('Cozy meeting room with harbor views. No food allowed to maintain cleanliness.');
        $meetingRoom2->setLocation($this->getReference(LocationFixtures::LOCATION_ROTTERDAM, Location::class));
        $meetingRoom2->setCreatedAt(new \DateTimeImmutable('2024-01-06'));
        $manager->persist($meetingRoom2);
        $this->addReference(self::ROOM_MEETING_2, $meetingRoom2);

        $boardroom = new Room();
        $boardroom->setName('Executive Boardroom R2');
        $boardroom->setDescription('Prestigious boardroom with premium furnishing for high-level executive meetings.');
        $boardroom->setCapacity(12);
        $boardroom->setRoomType('conference_room');
        $boardroom->setArea('35.00');
        $boardroom->setFloor('18');
        $boardroom->setRoomNumber('R2-1801');
        $boardroom->setAmenities(['tv_monitor', 'video_conferencing', 'sound_system', 'microphone', 'phone', 'catering_setup']);
        $boardroom->setFeatures(['natural_light', 'windows', 'soundproof', 'high_ceiling', 'private_entrance', 'storage_space']);
        $boardroom->setIsActive(true);
        $boardroom->setAllowsFood(true);
        $boardroom->setHasAirConditioning(true);
        $boardroom->setHasHeating(true);
        $boardroom->setHasWifi(true);
        $boardroom->setHasProjector(false);
        $boardroom->setHasWhiteboard(false);
        $boardroom->setNotes('Executive boardroom with leather chairs and mahogany table. Private entrance for confidential meetings.');
        $boardroom->setLocation($this->getReference(LocationFixtures::LOCATION_ROTTERDAM, Location::class));
        $boardroom->setCreatedAt(new \DateTimeImmutable('2024-01-06'));
        $manager->persist($boardroom);
        $this->addReference(self::ROOM_BOARDROOM, $boardroom);

        // Utrecht rooms - Central location
        $trainingRoom = new Room();
        $trainingRoom->setName('Training Room U1');
        $trainingRoom->setDescription('Spacious training room with flexible seating arrangements and modern teaching facilities.');
        $trainingRoom->setCapacity(15);
        $trainingRoom->setRoomType('training_room');
        $trainingRoom->setArea('42.00');
        $trainingRoom->setFloor('2');
        $trainingRoom->setRoomNumber('U1-201');
        $trainingRoom->setAmenities(['projector', 'screen', 'whiteboard', 'flipchart', 'sound_system', 'coffee_machine', 'water_cooler']);
        $trainingRoom->setFeatures(['natural_light', 'windows', 'movable_furniture', 'storage_space']);
        $trainingRoom->setIsActive(true);
        $trainingRoom->setAllowsFood(true);
        $trainingRoom->setHasAirConditioning(false);
        $trainingRoom->setHasHeating(true);
        $trainingRoom->setHasWifi(true);
        $trainingRoom->setHasProjector(true);
        $trainingRoom->setHasWhiteboard(true);
        $trainingRoom->setNotes('Flexible training space with movable desks. Natural lighting and break facilities available.');
        $trainingRoom->setLocation($this->getReference(LocationFixtures::LOCATION_UTRECHT, Location::class));
        $trainingRoom->setCreatedAt(new \DateTimeImmutable('2024-01-07'));
        $manager->persist($trainingRoom);
        $this->addReference(self::ROOM_TRAINING, $trainingRoom);

        $workshopRoom = new Room();
        $workshopRoom->setName('Workshop Space U2');
        $workshopRoom->setDescription('Creative workshop space designed for brainstorming sessions and collaborative work.');
        $workshopRoom->setCapacity(10);
        $workshopRoom->setRoomType('workshop');
        $workshopRoom->setArea('32.50');
        $workshopRoom->setFloor('1');
        $workshopRoom->setRoomNumber('U2-101');
        $workshopRoom->setAmenities(['whiteboard', 'flipchart', 'coffee_machine', 'water_cooler']);
        $workshopRoom->setFeatures(['natural_light', 'windows', 'movable_furniture', 'high_ceiling']);
        $workshopRoom->setIsActive(true);
        $workshopRoom->setAllowsFood(true);
        $workshopRoom->setHasAirConditioning(false);
        $workshopRoom->setHasHeating(true);
        $workshopRoom->setHasWifi(true);
        $workshopRoom->setHasProjector(false);
        $workshopRoom->setHasWhiteboard(true);
        $workshopRoom->setNotes('Creative space with multiple whiteboards and flexible furniture for innovative sessions.');
        $workshopRoom->setLocation($this->getReference(LocationFixtures::LOCATION_UTRECHT, Location::class));
        $workshopRoom->setCreatedAt(new \DateTimeImmutable('2024-01-07'));
        $manager->persist($workshopRoom);
        $this->addReference(self::ROOM_WORKSHOP, $workshopRoom);

        // Den Haag rooms - Government district
        $studyRoom = new Room();
        $studyRoom->setName('Study Room DH1');
        $studyRoom->setDescription('Quiet study room perfect for focused work and small consultations.');
        $studyRoom->setCapacity(4);
        $studyRoom->setRoomType('study_room');
        $studyRoom->setArea('15.00');
        $studyRoom->setFloor('3');
        $studyRoom->setRoomNumber('DH1-301');
        $studyRoom->setAmenities(['whiteboard', 'water_cooler']);
        $studyRoom->setFeatures(['natural_light', 'windows', 'soundproof', 'storage_space']);
        $studyRoom->setIsActive(true);
        $studyRoom->setAllowsFood(false);
        $studyRoom->setHasAirConditioning(true);
        $studyRoom->setHasHeating(true);
        $studyRoom->setHasWifi(true);
        $studyRoom->setHasProjector(false);
        $studyRoom->setHasWhiteboard(true);
        $studyRoom->setNotes('Quiet environment for concentrated work. Soundproof for confidential discussions.');
        $studyRoom->setLocation($this->getReference(LocationFixtures::LOCATION_DEN_HAAG, Location::class));
        $studyRoom->setCreatedAt(new \DateTimeImmutable('2024-01-08'));
        $manager->persist($studyRoom);
        $this->addReference(self::ROOM_STUDY, $studyRoom);

        // Eindhoven rooms - Tech hub
        $eventSpace = new Room();
        $eventSpace->setName('Event Space E1');
        $eventSpace->setDescription('Large flexible event space suitable for conferences, exhibitions, and corporate events.');
        $eventSpace->setCapacity(50);
        $eventSpace->setRoomType('event_space');
        $eventSpace->setArea('120.00');
        $eventSpace->setFloor('G');
        $eventSpace->setRoomNumber('E1-G01');
        $eventSpace->setAmenities(['projector', 'screen', 'tv_monitor', 'sound_system', 'microphone', 'coffee_machine', 'water_cooler', 'catering_setup']);
        $eventSpace->setFeatures(['natural_light', 'windows', 'high_ceiling', 'movable_furniture', 'storage_space', 'kitchen_access', 'parking_available']);
        $eventSpace->setIsActive(true);
        $eventSpace->setAllowsFood(true);
        $eventSpace->setHasAirConditioning(true);
        $eventSpace->setHasHeating(true);
        $eventSpace->setHasWifi(true);
        $eventSpace->setHasProjector(true);
        $eventSpace->setHasWhiteboard(false);
        $eventSpace->setNotes('Versatile event space with full catering kitchen access. Perfect for product launches and conferences.');
        $eventSpace->setLocation($this->getReference(LocationFixtures::LOCATION_EINDHOVEN, Location::class));
        $eventSpace->setCreatedAt(new \DateTimeImmutable('2024-01-09'));
        $manager->persist($eventSpace);
        $this->addReference(self::ROOM_EVENT, $eventSpace);

        $manager->flush();
    }

    public function getDependencies(): array
    {
        return [
            LocationFixtures::class,
        ];
    }
}
