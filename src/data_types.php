<?php
// src/data_types.php

declare(strict_types=1);

function multiply(int|float $a, int|float $b): string {
	return (string)$a*$b . "<br>";
}

function isAdult(int $age): bool {
	return match (true) {
		$age>=18 => true,
		default => false
	};
}

function calculateTax(float $price, float $tax): string {
    return (string)sprintf("%.2f",round($price + ($price * $tax), 2)) . "<br>";
}

function getNamesLength(array $names): array {
	return array_map(fn($name) => is_string($name) ? strlen($name) : throw new TypeError("All elements must be strings"), $names);
}

function formatValue(int|float|string $a): string {
	return (string)$a . '<br>';
}