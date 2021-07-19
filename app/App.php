<?php

namespace App;

class App
{
    protected $container;

    public function __construct()
    {
        $this->container = new Container([
            'router' => function () {
                return new Router();
            }
        ]);
    }

    public function getContainer()
    {
        return $this->container;
    }

    public function get($uri, $handler)
    {
        $this->container->router->addRoute($uri, $handler, ['GET']);
    }

    public function post($uri, $handler)
    {
        $this->container->router->addRoute($uri, $handler, ['POST']);
    }

    public function map($uri, $handler, array $methods = ['GET'])
    {
        $this->container->router->addRoute($uri, $handler, $methods);
    }

    public function run()
    {
        $router = $this->container->router;
        $router->setPath($_SERVER['PATH_INFO'] ?? '/');

        $response = $router->getResponse();

        return $this->process($response);
    }

    protected function process($callable)
    {
        return $callable();
    }
}
