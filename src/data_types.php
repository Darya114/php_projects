<?php
// src/data_types.php

declare(strict_types=1);

function multiply(int|float $a, int|float $b): float {
	return $a*$b;
}

function isAdult(int $age): bool {
	return match (true) {
		$age>=18 => true,
		default => false
	};
}

function calculateTax(float $price, float $tax): float {
    return sprintf("%.2f",round($price + ($price * $tax), 2));
}

function getNamesLength(array $names): array {
	return array_map(fn($name) => is_string($name) ? strlen($name) : throw new TypeError("All elements must be strings"), $names);
}

function formatValue(int|float|string $a): string {
	return (string)$a;
}