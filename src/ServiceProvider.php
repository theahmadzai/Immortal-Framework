<?php

namespace Immortal;

use Immortal\Components\Router\Router;
use Immortal\Interfaces\ServiceProviderInterface;

class ServiceProvider implements ServiceProviderInterface
{
    public function register($container)
    {
        if (!isset($container['environment'])) {
            $container['environment'] = function () {
                return new Environment($_SERVER);
            };
        }

        if (!isset($container['router'])) {
            $container['router'] = function ($container) {
                $routerCacheFile = false;
                if (isset($container->get('settings')['routerCacheFile'])) {
                    $routerCacheFile = $container->get('settings')['routerCacheFile'];
                }

                $router = (new Router)->setCacheFile($routerCacheFile);
                if (method_exists($router, 'setContainer')) {
                    $router->setContainer($container);
                }

                return $router;
            };
        }
    }
}
