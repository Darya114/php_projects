<?php
// src/data_types.php

declare(strict_types=1);

require_once '../helpers/math_helpers.php';

function multiply(int|float $a, int|float $b): float {
	return $a*$b;
}

function isAdult(int $age): bool {
	return $age >= 18;
}

function calculateTax(float $price, float $tax): float {
    return addTax($price, $tax);
}

function getNamesLength(array $names): array {
	return array_map(function($name) {
        if (!is_string($name)) {
            throw new TypeError("All elements must be strings");
        }
        return strlen($name);
    }, $names);
}

function formatValue(int|float|string $a): string {
	return (string)$a;
}