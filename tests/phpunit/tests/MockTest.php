<?php

use PHPUnit\Framework\TestCase;
require_once __DIR__ . "/UserRepository.php";

class UserRepositoryMockTest extends TestCase {
    public function testFindUserByEmail() {
        $mock = $this->createMock(UserRepository::class);
        $mock->method('findUserByEmail')->willReturn(['id' => 1, 'email' => 'darya@example.com']);

        $this->assertEquals(['id' => 1, 'email' => 'darya@example.com'], $mock->findUserByEmail('darya@example.com'));
    }
}
