<?php

declare(strict_types=1);

require_once dirname(__DIR__) . '/vendor/autoload.php';

$app = new App\App();

$container = $app->getContainer();

$container['errorHandler'] = function () {
    return function ($response) {
        return $response->setBody('Страница не найдена')->withStatus(404);
    };
};

require_once dirname(__DIR__) . '/app/Configs.php';

$app->get('/', [new App\Controllers\BaseController(), 'index']);
$app->get('/users', [new App\Controllers\UserController($container->db), 'index']);

$app->run();
