# Laravel API Project — REST & GraphQL  

Проект реализует **REST API** и **GraphQL API** для управления пользователями.  
Внутри располагаются базовые CRUD-операции и работа с запросами/мутациями GraphQL на Laravel.  

## Предварительные настройки проекта  

1. Настройте Laravel проект  
Выполните: composer install  
cp .env.example .env  
php artisan key:generate  
  
2. Создайте тестовую базу данных, отредактируйте .env и config/database.php файлы  
Выполните: mysql -u user -p -P 3306 -h localhost < tasks.sql  
  
3. Выполните миграции  
Выполните: php artisan migrate  
  
4. Запустите сервер  
Выполните: php artisan serve  
  
## REST API  

### Эндпоинт: GET /api/users  

Описание: Возвращает список пользователей в формате JSON.  
  
Проверка:  
curl -X GET http://localhost:8000/api/users  
  
### Эндпоинт: POST /api/users  
  
Описание: Создает нового пользователя и сохраняет его в базу данных.  
  
Проверка:  
curl -X POST -H "Content-Type: application/json" \  
-d '{"name": "Иван"}' http://localhost:8000/api/users  
  
### Эндпоинт: PUT /api/users/{id}  
  
Описание: Обновляет данные пользователя по его ID.  
  
Проверка:  
curl -X PUT -H "Content-Type: application/json" \  
-d '{"name": "Алексей"}' http://localhost:8000/api/users/1  
  
### Эндпоинт: DELETE /api/users/{id}  
  
Описание: Удаляет пользователя из базы данных.  
  
Проверка:  
curl -X DELETE http://localhost:8000/api/users/1  
  
## GraphQL API  
  
Получение всех пользователей  
{  
  users {  
    id  
    name  
  }  
}  
  
Описание: Возвращает список всех пользователей.  
  
Получение пользователя по ID  
{  
  getUser(id: 1) {  
    name  
  }  
}  
  
Описание: Возвращает данные пользователя по указанному ID.  
  
Мутация — создание пользователя  
mutation {  
  createUser(name: "Мария") {  
    id  
    name  
  }  
}  
  
Описание: Создает нового пользователя и возвращает его данные.  
  
*GraphQL доступен по адресу http://127.0.0.1:800/grapihql  