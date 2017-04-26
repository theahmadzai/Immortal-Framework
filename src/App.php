<?php

namespace Immortal;

use Immortal\Container;
use Immortal\Interfaces\ContainerInterface;
use InvalidArgumentException;

class App
{
    private $container = [];

    public function __construct(array $container = [])
    {
        if (is_array($container)) {
            $container = new Container($container);
        }
        if (!$container instanceof ContainerInterface) {
            throw new InvalidArgumentException('Expected a ContainerInterface');
        }
        $this->container = $container;
    }

    public function getContainer(): Container
    {

        return $this->container;
    }

    public function get(string $pattern, $callable)
    {
        return $this->map(['GET'], $pattern, $callable);
    }

    public function post(string $pattern, $callable)
    {
        return $this->map(['POST'], $pattern, $callable);
    }

    public function put(string $pattern, $callable)
    {
        return $this->map(['PUT'], $pattern, $callable);
    }

    public function patch(string $pattern, $callable)
    {
        return $this->map(['PATCH'], $pattern, $callable);
    }

    public function delete(string $pattern, $callable)
    {
        return $this->map(['DELETE'], $pattern, $callable);
    }

    public function options(string $pattern, $callable)
    {
        return $this->map(['OPTIONS'], $pattern, $callable);
    }

    public function any(string $pattern, $callable)
    {
        return $this->map(['GET', 'POST', 'PUT', 'PATCH', 'DELETE', 'OPTIONS'], $pattern, $callable);
    }

    public function map(array $methods, string $pattern, $callable)
    {
        if ($callable instanceof \Closure) {
            $callable = $callable->bindTo($this->container);
        }

        $route = $this->container->get('router')->map($methods, $pattern, $callable);
        echo 'passed';
        if (is_callable([$route, 'setContainer'])) {
            $route->setContainer($this->container);
        }

        if (is_callable([$route, 'setOutputBuffering'])) {
            $route->setOutputBuffering($this->container->get('settings')['outputBuffering']);
        }

        return $route;
    }
}
