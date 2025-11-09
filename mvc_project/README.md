# PHP MVC Project with Service Layer and Dependency Injection  

Проект демонстрирует архитектурный подход **MVC** с внедрением **сервисного слоя**, **сервис-провайдера** и **контейнера зависимостей (DI)**. Содержит правильную организацию PHP-кода с разделением ответственности.

---

## 📂 Структура проекта  

mvc_project/  
│  
├─ app/  
│ ├─ controllers/ # Контроллеры  
│ ├─ models/ # Модели данных  
│ ├─ services/ # Бизнес-логика (сервисный слой)  
│ ├─ views/ # Представления (HTML/PHP)  
│ ├─ repositories/ # Репозитории  
│ ├─ interfaces/ # Интерфейсы  
│ └─ providers/ # Провайдеры  
│  
├─ routes/ # Определение маршрутов  
├─ public/ # Точка входа (index.php)  
├─ tasks/ # SQL код для бд  
├─ composer.lock  
├─ README.md/ # Этот файл  
└─ composer.json  

## Предварительные настройки проекта  

1.Установите зависимости через Composer:  
Выполните: composer install  
  
2. Создайте тестовую базу данных с таблицей users  
Выполните: mysql -u user -p -P 3306 -h localhost < tasks.sql  
  
3. Запустите сервер  
Выполните: php -S 127.0.0.1:8000 -t public  
  
4. Перейдите по ссылке http://127.0.0.1:8000/users  