<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class UserFixtures extends Fixture
{
    public const USER_ADMIN = 'user-admin';
    public const USER_MANAGER = 'user-manager';
    public const USER_EMPLOYEE_1 = 'user-employee-1';
    public const USER_EMPLOYEE_2 = 'user-employee-2';

    public function __construct(
        private UserPasswordHasherInterface $passwordHasher
    ) {
    }

    public function load(ObjectManager $manager): void
    {
        // Admin user
        $admin = new User();
        $admin->setEmail('admin@example.com');
        $admin->setUsername('admin');
        $admin->setFirstName('Admin');
        $admin->setLastName('User');
        $admin->setRoles(['ROLE_ADMIN']);
        $admin->setPassword($this->passwordHasher->hashPassword($admin, 'admin123'));
        $admin->setCreatedAt(new \DateTimeImmutable('2024-01-01'));
        $manager->persist($admin);
        $this->addReference(self::USER_ADMIN, $admin);

        // Manager user
        $manager_user = new User();
        $manager_user->setEmail('manager@example.com');
        $manager_user->setUsername('manager');
        $manager_user->setFirstName('John');
        $manager_user->setLastName('Manager');
        $manager_user->setRoles(['ROLE_MANAGER']);
        $manager_user->setPassword($this->passwordHasher->hashPassword($manager_user, 'manager123'));
        $manager_user->setCreatedAt(new \DateTimeImmutable('2024-01-02'));
        $manager->persist($manager_user);
        $this->addReference(self::USER_MANAGER, $manager_user);

        // Employee 1
        $employee1 = new User();
        $employee1->setEmail('jan.doe@example.com');
        $employee1->setUsername('jan.doe');
        $employee1->setFirstName('Jan');
        $employee1->setLastName('Doe');
        $employee1->setRoles(['ROLE_USER']);
        $employee1->setPassword($this->passwordHasher->hashPassword($employee1, 'user123'));
        $employee1->setCreatedAt(new \DateTimeImmutable('2024-01-03'));
        $manager->persist($employee1);
        $this->addReference(self::USER_EMPLOYEE_1, $employee1);

        // Employee 2
        $employee2 = new User();
        $employee2->setEmail('jane.smith@example.com');
        $employee2->setUsername('jane.smith');
        $employee2->setFirstName('Jane');
        $employee2->setLastName('Smith');
        $employee2->setRoles(['ROLE_USER']);
        $employee2->setPassword($this->passwordHasher->hashPassword($employee2, 'user123'));
        $employee2->setCreatedAt(new \DateTimeImmutable('2024-01-04'));
        $manager->persist($employee2);
        $this->addReference(self::USER_EMPLOYEE_2, $employee2);

        $manager->flush();
    }
}
