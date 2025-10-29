<?php
// src/arrays.php

declare(strict_types=1);

function filterEvenNumbers(array $numbers): array {
	return array_values(array_filter(
		$numbers,
		fn($num) => is_int($num) ? $num % 2 === 0 : throw new TypeError("All elements must be numbers")
	));
}

function squareNumbers(array $numbers): array {
	return array_map(
		fn($num) => is_int($num) ? $num ** 2 : throw new TypeError("All elements must be numbers"),
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