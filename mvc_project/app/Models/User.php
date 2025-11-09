<?php
declare(strict_types=1);

namespace App\Models;

// use PDO;

// class User {
//     private static ?PDO $pdo = null;
//     public readonly string $name;
//     public readonly string $email;

//     public function __construct(?PDO $pdo = null) {
//         self::$pdo = $pdo;
//     }

//     private static function checkConnection(): void {
//         if (self::$pdo === null) {
//             self::$pdo = new PDO("mysql:host=localhost;dbname=mydb;charset=utf8mb4", "dasha", "1234");
//         }
//     }

//     public static function getAll(): array {
//         self::checkConnection();
//         $stmt = self::$pdo->query("SELECT name, email FROM users");
//         return $stmt->fetchAll(PDO::FETCH_CLASS, User::class) ?: [];
//     }
// }

final class User
{   
    public readonly string $name;
    public readonly string $email;
}
