![linter](https://github.com/yulia633/my-mini-framework/workflows/linter/badge.svg)

### О коде

Разработка микрофреймворка, реализованного на **php** без зависимостей, включая контейнер, маршрутизацию, контроллеры и работу с моделью, в целях изучения базовой работы микрофреймворков.

### Docker

Вы можете использовать этот проект с помощью **docker** и **docker-compose**:

**Минимальная версия Docker:**

- Engine: 18.03+
- Compose: 1.21+

**Команды:**

```bash
# Запустить приложение - это псевдоним для docker-compose up -d --build.
$ make up

# Проверить приложение.
$ http://localhost:8080

# Остановить и удалить контейнеры, псевдоним для docker-compose down.
$ make down
```
