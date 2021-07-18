up:
	docker-compose up -d --build

down:
	docker-compose down


compose-bash:
	docker-compose run --rm app bash


compose-bash-mysql:
	docker exec -it my-own-framework-container bash


compose-install:
	docker-compose run --rm app make install

install:
	composer install


validate:
	composer validate


start:
	php -S 0.0.0.0:8080 index.php


lint:
	composer exec phpcs -v -- --standard=PSR12 app -np

