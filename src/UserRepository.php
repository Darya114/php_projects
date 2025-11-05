<?php
declare(strict_types=1);

namespace App;

use PDO;
use App\Interfaces\DatabaseConnectionInterface; 

final class UserRepository {
    public function __construct(
        private readonly DatabaseConnectionInterface $db,
        private readonly UserValidator $validator
    ) {}

    private function execute(callable $operation, string $errorMessage): mixed {
        try {
            return $operation();
        } catch (\PDOException $e) {
            throw new \RuntimeException("$errorMessage: " . $e->getMessage());
        }
    }

    public function getUsers(): array {
        return $this->execute(function () {
            $stmt = $this->db->connect()->query("SELECT id, name, email, password FROM users");
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }, "Ошибка получения пользователей");
    }

    public function getUserByEmail(string $email, bool $allowEmpty = false): array|bool {
        $this->validator->validateEmail($email);

        return $this->execute(function () use ($email, $allowEmpty) {
            $stmt = $this->db->connect()->prepare("SELECT id, name, email, password FROM users WHERE email = :email");
            $stmt->execute(['email' => $email]);
            $user = $stmt->fetch(PDO::FETCH_ASSOC);

            if (!$user && !$allowEmpty) {
                throw new \RuntimeException("Пользователь с email `$email` не найден");
            }

            return $user;
        }, "Ошибка при поиске пользователя");
    }

    public function addUser(string $name, string $email, string $password = '123456'): void {
        if ($this->getUserByEmail($email, true)) {
            throw new \RuntimeException("Пользователь с таким email уже существует");
        }

        $this->validator->validateName($name);
        $this->validator->validatePasswordLength($password);

        $this->execute(function () use ($name, $email, $password) {
            $hashed = password_hash($password, PASSWORD_DEFAULT);
            $stmt = $this->db->connect()->prepare(
                "INSERT INTO users (name, email, password) VALUES (:name, :email, :password)"
            );
            $stmt->execute([
                'name' => $name,
                'email' => $email,
                'password' => $hashed
            ]);
        }, "Ошибка при добавлении пользователя");
    }

    public function deleteUser(int|string $id): void {
        $this->validator->checkId($id);

        $this->execute(function () use ($id) {
            $stmt = $this->db->connect()->prepare("DELETE FROM users WHERE id = :id");
            $stmt->execute(['id' => $id]);

            if ($stmt->rowCount() === 0) {
                throw new \RuntimeException("Пользователь с ID $id не найден");
            }
        }, "Ошибка при удалении пользователя");
    }
}
?>