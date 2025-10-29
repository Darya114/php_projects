<?php
// src/control_structures.php

declare(strict_types=1);

function checkNumber(int|float $num): string {
    if ($num > 0) {
        return "Положительное<br>";
    } elseif ($num < 0) {
        return "Отрицательное<br>";
    } else {
        return "Ноль<br>";
    }
}

function getAgeCategory(int $age): string {
    return match (true) {
        $age >= 0 && $age <= 12 => "Ребенок<br>",
        $age >= 13 && $age <= 17 => "Подросток<br>",
        $age >= 18 && $age <= 64 => "Взрослый<br>",
        $age >= 65 => "Пожилой<br>",
        default => throw new InvalidArgumentException("Invalid age value"),
    };
}

function printNumbers(int $n): void {
    for ($i = 1; $i <= $n; $i++) {
        echo $i . "<br>";
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
        echo $item . "<br>";
    }
}

function printEvenNumbers(int $n): void {
    $i = 1;
    while ($i <= $n) {
        if ($i % 2 !== 0) {
            $i++;
            continue;
        }
        echo $i . "<br>";
        $i++;
    }
}