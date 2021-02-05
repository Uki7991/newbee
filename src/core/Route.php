<?php
namespace src\core;

class Route
{
    protected static $routes;

    public static function get($url, $controller, $action)
    {
        self::add($url, $controller, $action, 'get');
        return new self();
    }

    public static function post($url, $controller, $action)
    {
        self::add($url, $controller, $action, 'post');
        return new self();
    }

    public static function delete($url, $controller, $action)
    {
        self::add($url, $controller, $action, 'delete');
        return new self();
    }

    public static function getRouteList()
    {
        return self::$routes;
    }

    private static function add($url, $controller, $action, $method)
    {
        self::$routes[] = [
            'url' => '#^'.$url.'$#',
            'method' => $method,
            'controller' => $controller,
            'action' => $action,
            'middleware' => null,
        ];
    }

    public function middleware($middleware)
    {
        self::$routes[count(self::$routes)-1]['middleware'] = $middleware;
        return new self();
    }

    public static function to($url, $options)
    {
        if (!empty($options)) {
            $url .= '?';

            foreach ($options as $key => $option) {
                $url .= implode('=', [$key, $option]);
                $url .= '&';
            }
        }

        return $url;
    }
}