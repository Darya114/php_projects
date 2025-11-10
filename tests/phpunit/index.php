<?php

header('Content-Type: application/json');

$uri = $_SERVER['REQUEST_URI'];

if ($uri === '/users') {
    echo json_encode([
        ['id' => 1, 'name' => 'User 1', 'email' => 'user1@example.com'],
        ['id' => 2, 'name' => 'User 2', 'email' => 'user2@example.com'],
    ]);
} else {
    echo json_encode(['error' => 'Not found']);
}
