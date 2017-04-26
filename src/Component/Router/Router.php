<?php

namespace Immortal\Components\Router;

use FastRoute\RouteCollector;
use FastRoute\RouteParser;
use FastRoute\RouteParser\Std as StdParser;
use Immortal\Components\Router\Interfaces\RouterInterface;

class Router implements RouterInterface
{
    protected $container;
    protected $routeParser;
    protected $cacheFile = false;

    public function __construct(RouteParser $parser = null)
    {
        $this->routeParser = $parser ?: new StdParser;
    }

    public function setCacheFile($cacheFile)
    {
        if (!is_string($cacheFile) && $cacheFile !== false) {
            throw new InvalidArgumentException('Router cacheFile must be a string or false');
        }

        $this->cacheFile = $cacheFile;

        if ($cacheFile !== false && !is_writable(dirname($cacheFile))) {
            throw new RuntimeException('Router cacheFile directory must be writable');
        }

        return $this;
    }

    public function map($methods, $pattern, $handler)
    {
        if (!is_string($pattern)) {
            throw new InvalidArgumentException('Route pattern must be a string');
        }

        // Prepend parent group pattern(s)
        // if ($this->routeGroups) {
        //     $pattern = $this->processGroups() . $pattern;
        // }

        // According to RFC methods are defined in uppercase (See RFC 7231)
        $methods = array_map("strtoupper", $methods);

        // Add route
        $route = $this->createRoute($methods, $pattern, $handler);
        $this->routes[$route->getIdentifier()] = $route;
        $this->routeCounter++;

        return $route;
    }

    protected function createRoute($methods, $pattern, $callable)
    {
        $route = new Route($methods, $pattern, $callable, $this->routeGroups, $this->routeCounter);
        if (!empty($this->container)) {
            $route->setContainer($this->container);
        }

        return $route;
    }
}
