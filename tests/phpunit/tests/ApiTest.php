<?php

use PHPUnit\Framework\TestCase;

class ApiTest extends TestCase {
    public function testUserApiReturnsUsers() {
        $url = 'http://127.0.0.1:8000/users';

        $response = file_get_contents($url);

        $this->assertNotFalse($response, 'Не удалось получить ответ от API');

        $data = json_decode($response, true);

        $this->assertIsArray($data, 'Ответ не является массивом');

        if (!empty($data)) {
            $this->assertArrayHasKey('id', $data[0]);
            $this->assertArrayHasKey('name', $data[0]);
            $this->assertArrayHasKey('email', $data[0]);
        }
    }
}
