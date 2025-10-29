<?php
// src/modern_php_features.php

function getStatusMessage(string $str): string {
    return match ($str) {
		'success' => "Операция выполнена успешно<br>",
		'error' => 'Произошла ошибка<br>',
		'pending' => 'Операция в ожидании<br>',
		default => 'Неизвестный статус<br>'
	};
}

function calculatePrice(int|float $basePrice, int $discount, int $tax): string {
    return (string)($basePrice * (1 - $discount / 100) * (1 + $tax / 100)) . "<br>";
}

class User {
    public function __construct(
        public readonly int $id,
        public readonly string $name,
        public readonly string $email
    ) {}
}

function getDeliveryMessage(OrderStatus $status): string {
    return $status->value . '<br>';
}

enum OrderStatus: string {
    case Pending = 'Заказ в ожидании';
    case Shipped = 'Заказ отправлен';
	case Delivered = 'Заказ доставлен';
}

function getUserEmail(object $user): string {
    return (string)($user?->profile?->email ?? 'Email не найден') . '<br>';
}