<?php
// src/modern_php_features.php

function getStatusMessage(string $str): string {
    return match ($str) {
		'success' => "Операция выполнена успешно",
		'error' => 'Произошла ошибка',
		'pending' => 'Операция в ожидании',
		default => 'Неизвестный статус'
	};
}

function calculatePrice(int|float $basePrice, int $discount, int $tax): float {
    return $basePrice * (1 - $discount / 100) * (1 + $tax / 100);
}

class User {
    public function __construct(
        public readonly int $id,
        public readonly string $name,
        public readonly string $email
    ) {}
}

function getDeliveryMessage(OrderStatus $status): string {
    return $status->value;
}

enum OrderStatus: string {
    case Pending = 'Заказ в ожидании';
    case Shipped = 'Заказ отправлен';
	case Delivered = 'Заказ доставлен';
}

function getUserEmail(object $user): string {
    return $user?->profile?->email ?? 'Email не найден';
}