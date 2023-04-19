<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class UserFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        // $product = new Product();
        // $manager->persist($product);
        $admin = new User();
        $admin->setEmail('supermarket@supermarket.com');
        $admin->setPassword('supermarket');
        $admin->setRoles((array)'admin');
        $manager->persist($admin);
        $manager->flush();
    }
}
