<?php
// src/functions.php

declare(strict_types=1);

function greetUser(string $name, string $lang = "ru"): string {
    return match ($lang) {
        "ru" => "Привет, $name!<br>",
        "en" => "Hello, $name!<br>"
    };
}

function calculateDiscount(float $price, int $discount = 10): string {
    return (string)$price * (1 - $discount / 100) . "<br>";
}

function orderPizza(
    string $size = "medium",
    string $crust = "thin",
    array $toppings = ["cheese"]
): string {
    return "Заказ: $size пицца на " . ($crust==="thin"? "тонком":"толстом") . " тесте с " . implode(", ", $toppings) . "<br>";
}

function formatText(string $text, bool $uppercase = false): string {
    return ($uppercase ? strtoupper($text) : $text) . "<br>";
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

    return $password . "<br>";
}