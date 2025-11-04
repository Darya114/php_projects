<?php

declare(strict_types=1);

namespace App;

final class UserValidator {
    public function validateEmail(string $email): void
    {
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            throw new \InvalidArgumentException("Некорректный email: $email");
        }
    }

    public function validateName(string $name): void
    {
        if (trim($name) === '') {
            throw new \InvalidArgumentException("Имя не может быть пустым");
        }
    }

    public function validatePasswordLength(string $password): void
    {
        $len = strlen($password);
        if ($len < 6 || $len > 20) {
            throw new \InvalidArgumentException("Длина пароля должна быть от 6 до 20 символов");
        }
    }
    public function checkId(int|string &$id): void
    {
        $id = (int)$id;
        if ($id <= 0) {
            throw new \InvalidArgumentException("Некорректный ID: $id");
        }
    }
}


?>