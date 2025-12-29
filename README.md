## TODO api laravel

```
composer install
php artisan migrate
composer run dev
```

## Для запросов установите Headers
Accept: application/json
Content-Type: application/json

## запросы
Создание задачи: POST /tasks (поля: title, description, status).
Просмотр списка задач: GET /tasks (возвращает все задачи).
Просмотр одной задачи: GET /tasks/{id}. (возвращает одну задачу или ошибку что задача не найдена)
Обновление задачи: PUT /tasks/{id}. (обновляет задачу, либо возвращает ошибку что задача не найдена)
Удаление задачи: DELETE /tasks/{id}. (удаляет задачу, либо возвращает ошибку что задача не найдена)

