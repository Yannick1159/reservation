<?php

namespace App\DataFixtures;

use App\Entity\Location;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class LocationFixtures extends Fixture
{
    public const LOCATION_AMSTERDAM = 'location-amsterdam';
    public const LOCATION_ROTTERDAM = 'location-rotterdam';
    public const LOCATION_UTRECHT = 'location-utrecht';
    public const LOCATION_DEN_HAAG = 'location-den-haag';
    public const LOCATION_EINDHOVEN = 'location-eindhoven';

    public function load(ObjectManager $manager): void
    {
        // Amsterdam Office - Premium location
        $amsterdam = new Location();
        $amsterdam->setName('Amsterdam Office');
        $amsterdam->setDescription('Modern office space in the heart of Amsterdam with state-of-the-art facilities and excellent public transport connections.');
        $amsterdam->setAddress('Hoofdstraat 123');
        $amsterdam->setPostalCode('1012 AB');
        $amsterdam->setCity('Amsterdam');
        $amsterdam->setCountry('Netherlands');
        $amsterdam->setLatitude(52.3676);
        $amsterdam->setLongitude(4.9041);
        $amsterdam->setCurrency('EUR');
        $amsterdam->setOpeningTime(new \DateTimeImmutable('08:00'));
        $amsterdam->setClosingTime(new \DateTimeImmutable('20:00'));
        $amsterdam->setOpeningDays(['monday', 'tuesday', 'wednesday', 'thursday', 'friday', 'saturday']);
        $amsterdam->setHourlyRate(25.00);
        $amsterdam->setDailyRate(180.00);
        $amsterdam->setIsActive(true);
        $amsterdam->setRequiresKeycard(true);
        $amsterdam->setNotes('Premium location with 24/7 security. Parking available in underground garage.');
        $amsterdam->setCreatedAt(new \DateTimeImmutable('2024-01-01'));
        $manager->persist($amsterdam);
        $this->addReference(self::LOCATION_AMSTERDAM, $amsterdam);

        // Rotterdam Office - Business district
        $rotterdam = new Location();
        $rotterdam->setName('Rotterdam Office');
        $rotterdam->setDescription('Professional office space located in the business district of Rotterdam with panoramic city views.');
        $rotterdam->setAddress('Coolsingel 456');
        $rotterdam->setPostalCode('3012 CD');
        $rotterdam->setCity('Rotterdam');
        $rotterdam->setCountry('Netherlands');
        $rotterdam->setLatitude(51.9244);
        $rotterdam->setLongitude(4.4777);
        $rotterdam->setCurrency('EUR');
        $rotterdam->setOpeningTime(new \DateTimeImmutable('07:30'));
        $rotterdam->setClosingTime(new \DateTimeImmutable('19:00'));
        $rotterdam->setOpeningDays(['monday', 'tuesday', 'wednesday', 'thursday', 'friday']);
        $rotterdam->setHourlyRate(22.00);
        $rotterdam->setDailyRate(160.00);
        $rotterdam->setIsActive(true);
        $rotterdam->setRequiresKeycard(true);
        $rotterdam->setNotes('Located on floors 15-18. Elevator access required. Catering services available.');
        $rotterdam->setCreatedAt(new \DateTimeImmutable('2024-01-02'));
        $manager->persist($rotterdam);
        $this->addReference(self::LOCATION_ROTTERDAM, $rotterdam);

        // Utrecht Office - Central location
        $utrecht = new Location();
        $utrecht->setName('Utrecht Office');
        $utrecht->setDescription('Centrally located office space near Utrecht Central Station with excellent accessibility.');
        $utrecht->setAddress('Oudegracht 789');
        $utrecht->setPostalCode('3511 EF');
        $utrecht->setCity('Utrecht');
        $utrecht->setCountry('Netherlands');
        $utrecht->setLatitude(52.0907);
        $utrecht->setLongitude(5.1214);
        $utrecht->setCurrency('EUR');
        $utrecht->setOpeningTime(new \DateTimeImmutable('08:30'));
        $utrecht->setClosingTime(new \DateTimeImmutable('18:30'));
        $utrecht->setOpeningDays(['monday', 'tuesday', 'wednesday', 'thursday', 'friday']);
        $utrecht->setHourlyRate(20.00);
        $utrecht->setDailyRate(145.00);
        $utrecht->setIsActive(true);
        $utrecht->setRequiresKeycard(false);
        $utrecht->setNotes('Historic building with modern amenities. Limited parking - public transport recommended.');
        $utrecht->setCreatedAt(new \DateTimeImmutable('2024-01-03'));
        $manager->persist($utrecht);
        $this->addReference(self::LOCATION_UTRECHT, $utrecht);

        // Den Haag Office - Government district
        $denHaag = new Location();
        $denHaag->setName('Den Haag Office');
        $denHaag->setDescription('Prestigious office location in the government district, perfect for official meetings and conferences.');
        $denHaag->setAddress('Lange Voorhout 12');
        $denHaag->setPostalCode('2514 ED');
        $denHaag->setCity('Den Haag');
        $denHaag->setCountry('Netherlands');
        $denHaag->setLatitude(52.0705);
        $denHaag->setLongitude(4.3007);
        $denHaag->setCurrency('EUR');
        $denHaag->setOpeningTime(new \DateTimeImmutable('09:00'));
        $denHaag->setClosingTime(new \DateTimeImmutable('17:30'));
        $denHaag->setOpeningDays(['monday', 'tuesday', 'wednesday', 'thursday', 'friday']);
        $denHaag->setHourlyRate(30.00);
        $denHaag->setDailyRate(220.00);
        $denHaag->setIsActive(true);
        $denHaag->setRequiresKeycard(true);
        $denHaag->setNotes('High-security location. ID verification required. Diplomatic parking available.');
        $denHaag->setCreatedAt(new \DateTimeImmutable('2024-01-04'));
        $manager->persist($denHaag);
        $this->addReference(self::LOCATION_DEN_HAAG, $denHaag);

        // Eindhoven Office - Tech hub
        $eindhoven = new Location();
        $eindhoven->setName('Eindhoven Office');
        $eindhoven->setDescription('Modern tech-focused workspace in the innovation district of Eindhoven with cutting-edge facilities.');
        $eindhoven->setAddress('High Tech Campus 1');
        $eindhoven->setPostalCode('5656 AE');
        $eindhoven->setCity('Eindhoven');
        $eindhoven->setCountry('Netherlands');
        $eindhoven->setLatitude(51.4416);
        $eindhoven->setLongitude(5.4697);
        $eindhoven->setCurrency('EUR');
        $eindhoven->setOpeningTime(new \DateTimeImmutable('07:00'));
        $eindhoven->setClosingTime(new \DateTimeImmutable('22:00'));
        $eindhoven->setOpeningDays(['monday', 'tuesday', 'wednesday', 'thursday', 'friday', 'saturday', 'sunday']);
        $eindhoven->setHourlyRate(18.00);
        $eindhoven->setDailyRate(130.00);
        $eindhoven->setIsActive(true);
        $eindhoven->setRequiresKeycard(false);
        $eindhoven->setNotes('24/7 access available. Startup-friendly environment. Free parking and bike storage.');
        $eindhoven->setCreatedAt(new \DateTimeImmutable('2024-01-05'));
        $manager->persist($eindhoven);
        $this->addReference(self::LOCATION_EINDHOVEN, $eindhoven);

        $manager->flush();
    }
}
