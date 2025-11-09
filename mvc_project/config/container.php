<?php

// use DI\Container;

// use PDO;
// use App\Services\UserService;
// use App\Providers\UserServiceProvider;
use App\Repositories\UserRepository;
use App\Interfaces\UserRepositoryInterface;
use DI\ContainerBuilder;

$builder = new ContainerBuilder();
$builder->useAutowiring(true);
$builder->addDefinitions([
    PDO::class => function () {
        return new PDO(
            "mysql:host=localhost;dbname=mydb;charset=utf8mb4",
            "dasha",
            "1234",
            [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
            ]
        );
    },
    UserRepositoryInterface::class => \DI\autowire(UserRepository::class),
    'UserServiceProvider' => \DI\get(App\Providers\UserServiceProvider::class),
    'UserService' => \DI\get(App\Services\UserService::class),
]);
$container = $builder->build();


// $container = new Container();

// $container->set(PDO::class, function () {
//     return new PDO(
//         "mysql:host=localhost;dbname=mydb;charset=utf8mb4",
//         "dasha",
//         "1234"
//     );
// });

// $container->set(UserRepositoryInterface::class, function($c) {
//     return new UserRepository($c->get(PDO::class));
// });

// $container->set(UserService::class, function($c) {
//     return new UserService($c->get(UserRepositoryInterface::class));
// });

// $container->set('UserService', \DI\get(UserService::class));

// $container->set('UserServiceProvider', function ($c) {
//     return new UserServiceProvider($c);
// });