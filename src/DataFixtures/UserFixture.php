<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class UserFixture extends Fixture 
{
    private $passwordhasher;

    public function __construct(UserPasswordHasherInterface $userPasswordHasherInterface)
    {
        $this->passwordhasher= $userPasswordHasherInterface;
    }

    public function load(ObjectManager $manager): void
    {
        $newUser = new User();
        $newUser->setEmail('supermarket@supermarket.com');
        $newUser->setRoles(["ROLE_ADMIN"]);
        $passwd = $this->passwordhasher->hashPassword($newUser, 'supermarket');
        $newUser->setPassword($passwd);
        $manager->persist($newUser);
        $manager->flush();
    }
}
