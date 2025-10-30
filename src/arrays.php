<?php
// src/arrays.php

declare(strict_types=1);

require_once '../helpers/math_helpers.php';

function filterEvenNumbers(array $numbers): array {
	return array_values(array_filter(
		$numbers,
		fn($num) => assertInt($num) % 2 === 0
	));
}

function squareNumbers(array $numbers): array {
	return array_map(
		fn($num) => assertInt($num) ** 2,
		$numbers
	);
}

function getUserEmails(array $users): array {
    return array_map(
        fn($user) => is_array($user) && isset($user['email'])
            ? $user['email']
            : throw new TypeError("Each user must be an array with an 'email' key"),
        $users
    );
}