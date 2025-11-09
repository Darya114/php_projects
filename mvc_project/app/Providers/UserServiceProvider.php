<?php
declare(strict_types=1);

namespace App\Providers;

// use App\Services\UserService;
// use App\Repositories\UserRepository;
// use App\Interfaces\UserRepositoryInterface;
// use PDO;
// use DI\ContainerBuilder;

// class UserServiceProvider {
//     protected $container;

//     public function __construct($container) {
//         $this->container = $container;
//         $this->register();
//         $this->boot();
//     }

//     public function register(): void {
//         $this->container->set(PDO::class, function () {
//             return new PDO(
//                 "mysql:host=localhost;dbname=mydb;charset=utf8mb4",
//                 "dasha",
//                 "1234",
//                 [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]
//             );
//         });

//         $this->container->set(UserRepositoryInterface::class, function ($c) {
//             return new UserRepository($c->get(PDO::class));
//         });

//         $this->container->set('UserService', function ($c) {
//             return new UserService($c->get(UserRepositoryInterface::class));
//         });
//     }

//     public function boot(): void {}
// }

class UserServiceProvider {
    public function register(): void {}

    public function boot(): void {}
}

