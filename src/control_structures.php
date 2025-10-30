<?php
// src/control_structures.php

declare(strict_types=1);

require_once '../helpers/general_helpers.php';

function checkNumber(int|float $num): string {
    if ($num > 0) {
        return "Положительное";
    } elseif ($num < 0) {
        return "Отрицательное";
    } else {
        return "Ноль";
    }
}

function getAgeCategory(int $age): string {
    return match (true) {
        $age >= 0 && $age <= 12 => "Ребенок",
        $age >= 13 && $age <= 17 => "Подросток",
        $age >= 18 && $age <= 64 => "Взрослый",
        $age >= 65 => "Пожилой",
        default => throw new InvalidArgumentException("Invalid age value"),
    };
}

function printNumbers(int $n): void {
    for ($i = 1; $i <= $n; $i++) {
        printLine($i);
    }
}

function factorial(int $n): int {
    if ($n < 0) {
        throw new InvalidArgumentException("Factorial is defined only for non-negative numbers");
    }

    $result = 1;
    $i = 1;

    while ($i <= $n) {
        $result *= $i;
        $i++;
    }

    return $result;
}

function printArrayItems(array $items): void {
    foreach ($items as $item) {
        printLine($item);
    }
}

function printEvenNumbers(int $n): void {
    $i = 1;
    while ($i <= $n) {
        if ($i % 2 !== 0) {
            $i++;
            continue;
        }
        printLine($i);
        $i++;
    }
}