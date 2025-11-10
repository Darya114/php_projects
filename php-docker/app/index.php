<?php
echo "Hello from PHP in Docker!\n";
$pdo = new PDO("mysql:host=db;dbname=test_db", "dasha", "1234");
echo "Подключение успешно!";
