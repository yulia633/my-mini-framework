install:
	composer install


validate:
	composer validate


start:
	php -S 0.0.0.0:8080 index.php


lint:
	composer exec phpcs -v -- --standard=PSR12 public app -np

