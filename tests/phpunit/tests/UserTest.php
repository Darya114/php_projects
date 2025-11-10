<?php

use PHPUnit\Framework\TestCase;
require_once __DIR__ . "/User.php";

class UserTest extends TestCase {
    private function makeUser(): User{
        $user = new User();
        $user->firstname = 'Дарья';
        $user->lastname = 'Васильчук';
        $user->email = 'darya@example.com';
        return $user;
    }
    public function testUserCanBeCreated() {
        $user = $this->makeUser();
        $this->assertEquals('Дарья', $user->firstname);
        $this->assertEquals('Васильчук', $user->lastname);
        $this->assertEquals('darya@example.com', $user->email);
        $this->assertInstanceOf(User::class, $user);
    }

    public function testUserFullName() {
        $user = $this->makeUser();
        $this->assertEquals('Васильчук Дарья', $user->getFullName());
    }
}
