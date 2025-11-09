<?php

declare(strict_types=1);

namespace Routes;

require __DIR__ . '/../config/container.php';

// use App\Models\User;
// use App\Controllers\UserController;
// use App\Repositories\UserRepository;
// use App\Services\UserService;
use PDO;


$pdo = new PDO("mysql:host=localhost;dbname=mydb;charset=utf8mb4", "dasha", "1234");


$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

switch ($uri) {
    case '/users':
        // $userModel = new User($pdo);
        // $controller = new UserController($userModel);
        // $userRepo = new UserRepository($pdo);
        // $userService = new UserService($userRepo);
        // $controller = new UserController($userService);

        // $userService = $container->get(UserService::class);
        // $controller = new UserController($userService);
        
        // $controller->showUsers();

        // $container->get('UserService')->getUsers();
        // echo '<pre>';
        // print_r($users);
        // echo '</pre>';

        // $service = $container->get('UserService');
        // print_r($service->getUsers()); 
        
        $container->get('UserServiceProvider');
        $service = $container->get('UserService');
        print_r($service->getUsers());

        break;
    default:
        throw new \RuntimeException("404 Not Found: Route '$uri' does not exist");
}

