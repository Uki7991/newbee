<?php
namespace src\core;

use app\Kernel;
use src\core\Request;

class Router extends Kernel
{
    private $request = null;
    public $params = [];

    public function __construct(Request $request)
    {
        $this->request = $request;
        $this->run();
    }

    private function match()
    {
        foreach (Route::getRouteList() as $params) {
            if (preg_match($params['url'], $this->request->core, $matches)) {
                if ($this->request->method !== strtoupper($params['method'])) {
                    continue;
                }
                $params['params'] = preg_replace($params['url'], '$1', $this->request->core);
                $this->params = $params;
                $middleware = $this->params['middleware'] ? $this->routeMiddlewares[$this->params['middleware']] : null;

                return $middleware ? (new $middleware)->handle($this->request) : true;
            }
        }
        return false;
    }

    public function run()
    {
        if ($this->match()) {
            $controller = $this->params['controller'];
            if (class_exists($controller)) {
                $action = $this->params['action'];
                if (method_exists($controller, $action)) {
                    $controller = new $controller($this->request, $this);
                    if (!empty($this->params['params'])) {
                        $controller->$action($this->params['params']);
                        exit();
                    }
                    $controller->$action();
                } else {
                    View::errorCode(404);
                }
            } else {
                View::errorCode(404);
            }
        } else {
            View::errorCode(404);
        }
    }
}