<?php

namespace app\controllers;

use src\core\Request;
use src\core\Router;
use src\core\View;
use src\core\Response;

abstract class Controller
{
    protected $view;
    protected $route;
    protected $request;
    protected $response;

    public function __construct(Request $request, Router $route)
    {
        $this->request = $request;
        $this->route = $route->params;
        $this->view = new View();
        $this->response = new Response();
    }
}