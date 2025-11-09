<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Persistence\ObjectManager;

class UserFixtures extends AbstractFixture {
    public function load(ObjectManager $manager): void {
        $user1 = new User();
        $user1->setName('Иван');
        $user1->setEmail('ivan@example.com');

        $manager->persist($user1);

        $user2 = new User();
        $user2->setName('Мария');
        $user2->setEmail('maria@example.com');
        $manager->persist($user2);

        $manager->flush();
    }
}
