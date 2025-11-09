<?php
declare(strict_types=1);

namespace App\Controllers;

// use App\Models\User;
use App\Services\UserService;

class UserController {
    // private User $userModel;
    private UserService $userService;

    // public function __construct(User $userModel) {
    //     $this->userModel = $userModel;
    // }

    public function __construct(UserService $userService) {
        $this->userService = $userService;
    }


    public function showUsers(): void {
        // $users = $this->userModel->getAll();
        $users = $this->userService->getUsers();
        require __DIR__ . "/../Views/user.php";
    }
}
