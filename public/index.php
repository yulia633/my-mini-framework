<?php

require_once dirname(__DIR__) . '/vendor/autoload.php';

use Dotenv\Dotenv;

$dotenv = Dotenv::createImmutable(dirname(__DIR__));
$dotenv->load();

$app = new App\App();

$container = $app->getContainer();

$container['errorHandler'] = function () {
    return function ($response) {
        return $response->setBody('Страница не найдена')->withStatus(404);
    };
};

$container['config'] = function () {
    return [
        'MYSQL_USER' => $_ENV['MYSQL_USER'],
        'MYSQL_ROOT_PASSWORD' => $_ENV['MYSQL_ROOT_PASSWORD'],
        'MYSQL_HOST' => $_ENV['MYSQL_HOST'],
        'MYSQL_DATABASE' => $_ENV['MYSQL_DATABASE'],
        "DATABASE_CHAR" => 'utf8'
    ];
};

$container['db'] = function ($c) {
    $DB_HOST = $c->config['MYSQL_HOST'];
    $DB_NAME = $c->config['MYSQL_DATABASE'];
    $DB_USER = $c->config['MYSQL_USER'];
    $DB_PASSWORD = $c->config['MYSQL_ROOT_PASSWORD'];
    $DB_CHARSET = $c->config['DATABASE_CHAR'];

    $DSN = "mysql:host={$DB_HOST};dbname={$DB_NAME};charset={$DB_CHARSET}";

    $options = [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ,
    ];

    return new PDO($DSN, $DB_USER, $DB_PASSWORD, $options);
};

$app->get('/', [new App\Controllers\BaseController(), 'index']);
$app->get('/users', [new App\Controllers\UserController($container->db), 'index']);

$app->run();
