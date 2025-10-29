<?php
// src/functions.php

declare(strict_types=1);

function greetUser(string $name, string $lang = "ru"): string {
    return match ($lang) {
        "ru" => "Привет, $name!",
        "en" => "Hello, $name!"
    };
}

function calculateDiscount(float $price, int $discount = 10): float {
    return $price * (1 - $discount / 100);
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

function generatePassword(
    int $length = 8,
    bool $includeNumbers = true,
    bool $includeSpecialChars = false
): string {
    $letters = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
	$numbers = '0123456789';
    $specials = '!@#$%^&*()-_=+[]{};:,.<>?';
	$chars = $letters . ($includeNumbers ? $numbers : '') . ($includeSpecialChars ? $specials : '');

	do {
        $password = substr(str_shuffle(str_repeat($chars, $length)), 0, $length);
    } while (
		($includeNumbers && !preg_match('/\d/', $password)) ||
		($includeSpecialChars && !preg_match('/[' . preg_quote($specials, '/') . ']/', $password))
	);

    return $password;
}