![linter](https://github.com/yulia633/my-mini-framework/workflows/linter/badge.svg)

### О коде

Разработка микрофреймворка, реализованного на **php** без зависимостей, включая контейнер, маршрутизацию, контроллеры и работу с моделью, в целях изучения базовой работы микрофреймворков.

### Docker

Вы можете использовать этот проект с помощью **docker** и **docker-compose**:

**Команды:**

```bash
# Запустить приложение - это псевдоним для docker-compose up -d --build.
$ make up

# Проверить приложение.
$ http://localhost:80

# Остановить контейнеры, псевдоним для docker-compose down.
$ make down

# Зайти в контейнер в базу, псевдоним для docker exec -it.
$ make docker-compose-bash-mysql
```
