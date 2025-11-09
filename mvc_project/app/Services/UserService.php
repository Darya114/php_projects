<?php
declare(strict_types=1);

namespace App\Services;

use App\Repositories\UserRepository;
use App\Interfaces\UserRepositoryInterface;

class UserService {
    // private static ?UserRepository $userRepository = null;
    private static UserRepository $userRepository;


    // public function __construct(?UserRepository $userRepository = null) {
    //     self::$userRepository = $userRepository;
    // }
    // public function __construct(?UserRepositoryInterface $userRepository = null) {
    //     self::$userRepository = $userRepository;
    // }
    public function __construct(UserRepositoryInterface $userRepository) {
        self::$userRepository = $userRepository;
    }

    private static function checkRepository(): void {
        if (self::$userRepository === null) {
            self::$userRepository = new UserRepository(); //для вызова из индекса без routes
        }
    }

    private static function checkConnection(): void {
        if (self::$userRepository->getPdo() === null) {
            self::$userRepository->setPdo(); //для вызова из индекса без routes
        }
    }

    public static function getUsers(): array {
        // self::checkRepository();
        // self::checkConnection();
        return self::$userRepository->getAll();
    }
}
