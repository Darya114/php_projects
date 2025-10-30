<?php

declare(strict_types=1);

function addTax(float $price, float $tax): float {
    return $price * ($tax < 1 ? (1 + $tax) : (1 + $tax / 100));
}

function applyDiscount(float $price, int $discount): float {
    return $price * (1 - $discount / 100);
}

function formatPrice(float $price, int $decimals = 2): string {
    return sprintf("%.2f", $price, $decimals);
}

function assertInt($value): int {
    if (!is_int($value)) {
        throw new TypeError("All elements must be numbers");
    }
    return $value;
}