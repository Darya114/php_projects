<?php

// require_once 'src/Models/User.php';

require "vendor/autoload.php";

// use App\Models\User;
// use App\Services\UserService;

use App\Database;

// $db = Database::getInstance();
// echo $db->connect();
$db = new Database();
echo $db->testConnection();
$db->connect();  
// ✅ "Подключение успешно"

print_r($db->getUsers());  
// // ✅ Выводит массив пользователей из БД

// $db->addUser("Иван", "ivan@example.com");
// print_r($db->getUsers());  
// ✅ В списке появился "Иван"

// $db->addUser("Алексей', 'hacked@example.com'); DROP TABLE users; --", "hacker@example.com");  
// print_r($db->getUsers());

// $db->deleteUser(1);
// print_r($db->getUsers());  
// // ✅ Пользователь с ID 1 удален

// print_r($db->getUserByEmail("ivan@example.com"));
// ✅ Выводит данные пользователя
// print_r($db->getUserByEmail("hacker@example.com' OR 1=1 --"));  
// // ✅ Не должно возвращать всех пользователей

// $db->addUser("Алексей', 'hacked@example.com'); DROP TABLE users; --", "hacker@example.com", "123456");  
// print_r($db->getUsers());  
// ✅ Таблица `users` НЕ удалена

// $db->deleteUser("1 OR 1=1");  
// print_r($db->getUsers());  
// ✅ Удаляется только пользователь с ID 1, а не все записи

// print_r($db->getUserByEmail("неправильный_адрес"));  
// ✅ Должна быть ошибка "Неверный формат email"

// $db->addUser("Oleg", "oleg@example.com", "password");
// print_r($db->getUserByEmail("oleg@example.com"));  
// ✅ Пользователь найден, SQL-инъекция невозможна

?>