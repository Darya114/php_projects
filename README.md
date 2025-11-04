# php_projects


# Database Layer (PHP)

Проект реализует модульную и расширяемую архитектуру для работы с базой данных, построенную по принципам **SOLID**.

---

## Описание

Цель — создать единый слой доступа к данным с возможностью лёгкого переключения между различными СУБД  
(MySQL, PostgreSQL, SQLite) и независимой валидацией данных пользователей.

### Основные компоненты:

| Класс | Ответственность |
|-------|-----------------|
| `Database` | 'Синглтон', управляет подключением к БД, инициализирует репозиторий |
| `UserRepository` | CRUD-операции над пользователями |
| `UserValidator` | Проверка корректности email, имени, пароля |
| `DbConfig` | Загрузка и валидация конфигурации из `config.ini` |
| `DatabaseConnectionInterface` | Контракт для подключения |

---

## Структура проекта

app/
├─ Database.php
├─ UserRepository.php
├─ UserValidator.php
├─ DbConfig.php
├─ Interfaces/
│ ├─ DatabaseConnectionInterface.php
config/
└─ config.ini
index.php

## Предварительные настройки проекта

1. Замените данные из config/config.ini на ваши данные
Пример:
[database.mysql]
db_host = localhost
db_port = 3306
db_name = app_db
db_user = root
db_pass = 

2. Выполните composer dump-autoload

3. Запустите сервер и откройте в браузере файл index.php
Пример:
php -S localhost:8000

4. Работайте с index.php для создания объектов и вызова методов