<?php
// src/functions.php

declare(strict_types=1);

require_once '../helpers/math_helpers.php';

function greetUser(string $name, string $lang = "ru"): string {
    return match ($lang) {
        "ru" => "Привет, $name!",
        "en" => "Hello, $name!"
    };
}

function calculateDiscount(float $price, int $discount = 10): float {
    return applyDiscount($price, $discount);
}

function orderPizza(
    string $size = "medium",
    string $crust = "thin",
    array $toppings = ["cheese"]
): string {
    return "Заказ: $size пицца на " . ($crust==="thin"? "тонком":"толстом") . " тесте с " . implode(", ", $toppings);
}

function formatText(string $text, bool $uppercase = false): string {
    return $uppercase ? strtoupper($text) : $text;
}

function buildCharSet(bool $includeNumbers, bool $includeSpecialChars): string {
    $letters = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $numbers = '0123456789';
    $specials = '!@#$%^&*()-_=+[]{};:,.<>?';

    return $letters . ($includeNumbers ? $numbers : '') . ($includeSpecialChars ? $specials : '');
}

function passwordMeetsRequirements(string $password, array $requirements): bool {
    foreach ($requirements as $pattern => $required) {
        if ($required && !preg_match($pattern, $password)) {
            return false;
        }
    }
    return true;
}

function generatePassword(
    int $length = 8,
    bool $includeNumbers = true,
    bool $includeSpecialChars = false
): string {
    $chars = buildCharSet($includeNumbers, $includeSpecialChars);

    $requirements = [
        '/\d/' => $includeNumbers,
        '/[' . preg_quote('!@#$%^&*()-_=+[]{};:,.<>?', '/') . ']/' => $includeSpecialChars
    ];

	do {
        $password = substr(str_shuffle(str_repeat($chars, $length)), 0, $length);
    } while (!passwordMeetsRequirements($password, $requirements));

    return $password;
}