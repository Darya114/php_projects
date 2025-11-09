# Doctrine User & Post Management

Проект на PHP с использованием Doctrine ORM, демонстрирующий управление пользователями и постами, а также взаимодействие между ними через реляционную базу данных.

## Описание

Цель проекта — создать сущности User и Post, настроить миграции и сидирование данных через фикстуры, а также поработать с MySQL через Doctrine ORM.

Приложение включает две основные сущности:

- **User** — модель пользователя с полями `name` и `email`.  
- **Post** — модель поста, связанная с пользователем через `user_id`.  

### Функционал:

- Создание и хранение пользователей;  
- Создание постов и привязка их к авторам;  
- Управление структурой базы данных через миграции Doctrine;  
- Наполнение тестовыми данными через Fixtures.  

---

## Структура проекта

doctrine/  
├── bin/  
│ └── console # CLI для работы с Doctrine  
├── src/  
│ ├── Entity/  
│ │ ├── User.php # Сущность пользователя  
│ │ └── Post.php # Сущность поста  
│ │  
│ ├── Repository/  
│ │ └── UserRepository.php # CRUD для пользователей  
│ │  
│ └── DataFixtures/  
|   └── UserFixtures.php # # Fixtures для тестовых данных пользователей  
│  
├── migrations/ # Миграции Doctrine  
├── migrations.php # Настройки миграций  
├── proxies/ # Генерируемые прокси-классы Doctrine  
├── bootstrap.php # Инициализация Doctrine  
├── create_user.php # Пример скрипта для создания пользователя  
├── tasks.sql # Дамп MySQL для быстрой настройки  
├── composer.json # PHP-зависимости  
└── composer.lock # Зафиксированные версии зависимостей  

## Предварительные настройки проекта

1. Установка зависимостей  
Выполните: composer install  

## Настройка подключения к MySQL

1. В файле bootstrap укажите свои параметры:  
[  
    'dbname'   => 'my_database',  
    'user'     => 'dasha',  
    'password' => '1234',  
    'host'     => 'localhost',  
    'driver'   => 'pdo_mysql',  
    'charset' => 'utf8mb4',  
]  

2. Импортируйте дамп базы данных  
Выполните: mysql -u user -p -P 3306 -h localhost < tasks.sql  

## Работа с базой данных

1. Применить миграции  
Выполните: php bin/console doctrine:migrations:migrate  

2. Засеять тестовыми данными  
Выполните: php bin/console doctrine:fixtures:load  

## Работа с приложением

1. Перейдите в корень проекта doctrine  
Выполните: php -S localhost:8000  

2. Откройте в браузере:  
http://localhost:8000/create_user.php  