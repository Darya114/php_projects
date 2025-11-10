<?php

declare(strict_types=1);

class User {
    public string $lastname;
    public string $firstname;
    public string $email;

    public function getFullName(): string {
        return "$this->lastname $this->firstname";
    }
}
