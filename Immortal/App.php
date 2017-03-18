<?php
namespace Immortal;

class App
{
    public function __construct()
    {
        $this->runApp(Router::getInstance()->getParams());
    }

    private function runApp($params = [])
    {
        try {
            if ($params !== false) {
                extract($params);

                $controller = $this->runController($controller);

                if ($controller !== false || is_callable($method)) {
                    $method = $this->runMethod($controller, $method, $params);

                    if ($method !== false) {
                        Response::render($method);
                    } else {
                        throw new HttpException(['error' => 404, 'method' => $method]);
                    }
                } else {
                    throw new HttpException(['error' => 404, 'controller' => $controller]);
                }
            } else {
                throw new HttpException(['error' => 404, 'url' => Request::get('url')]);
            }
        } catch (HttpException $e) {
        };
    }

    private function runController($controller)
    {
        if (!class_exists($controller) && $controller !== false) {
            $controller = "App\Controllers\\$controller";
            if (class_exists($controller)) {
                return new $controller($this);
            }

            return false;
        }

        return false;
    }

    private function runMethod($controller, $method, $params)
    {
        if (is_callable($method)) {
            return call_user_func_array($method, $params);
        } elseif (method_exists($controller, $method)) {
            return call_user_func_array([$controller, $method], $params);
        }

        return false;
    }
}
