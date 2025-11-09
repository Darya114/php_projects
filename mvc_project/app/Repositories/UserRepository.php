<?php
declare(strict_types=1);

namespace App\Repositories;

use PDO;
use App\Models\User;
use App\Interfaces\UserRepositoryInterface;

class UserRepository implements UserRepositoryInterface {
    // private static ?PDO $pdo = null;
    private static PDO $pdo;

    // public function __construct(?PDO $pdo = null) {
    //     self::$pdo = $pdo;
    // }
    public function __construct(PDO $pdo) {
        self::$pdo = $pdo;
    }

    public function getPdo(): ?PDO {
        return self::$pdo;
    }

    public function setPdo(): void {
        self::$pdo = new PDO("mysql:host=localhost;dbname=mydb;charset=utf8mb4", "dasha", "1234");
    }

    public static function getAll(): array {
        $stmt = self::$pdo->query("SELECT name, email FROM users");
        return $stmt->fetchAll(PDO::FETCH_CLASS, User::class) ?: [];
    }
}

