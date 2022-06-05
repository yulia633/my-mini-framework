<?php

declare(strict_types=1);

use Dotenv\Dotenv;

$dotenv = Dotenv::createImmutable(dirname(__DIR__));
$dotenv->load();

$container['config'] = function () {

    return [
        'MYSQL_USER' => $_ENV['MYSQL_USER'],
        'MYSQL_ROOT_PASSWORD' => $_ENV['MYSQL_ROOT_PASSWORD'],
        'MYSQL_HOST' => $_ENV['MYSQL_HOST'],
        'MYSQL_DATABASE' => $_ENV['MYSQL_DATABASE'],
        "DATABASE_CHAR" => 'utf8'
    ];
};
