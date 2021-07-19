<?php

require 'vendor/autoload.php';

$app = new App\App();

$container = $app->getContainer();

$container['config'] = function () {
    return [
        "DATABASE_HOST" => getenv('DATABASE_HOST'),
        "DATABASE_NAME" =>  getenv('DATABASE_NAME'),
        "DATABASE_USER" =>  getenv('DATABASE_USER'),
        "DATABASE_PASSWORD" =>  getenv('DATABASE_PASSWORD'),
        "DATABASE_CHAR" => 'utf8'
    ];
};

$container['db'] = function ($c) {
    $DB_HOST = $c->config['DATABASE_HOST'];
    $DB_NAME = $c->config['DATABASE_NAME'];
    $DB_USER = $c->config['DATABASE_USER'];
    $DB_PASSWORD = $c->config['DATABASE_PASSWORD'];
    $DB_CHARSET = $c->config['DATABASE_CHAR'];

    $DSN = "mysql:host={$DB_HOST};dbname={$DB_NAME};charset={$DB_CHARSET}";

    $options = [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ,
    ];

    return new PDO($DSN, $DB_USER, $DB_PASSWORD, $options);
};

$app->get('/', function () {
    echo 'Home';
});

$app->post('/signup', function () {
    echo 'Sign up';
});

$app->map('/users', function () {
    echo 'Users';
}, ['GET', 'POST']);

$app->run();
