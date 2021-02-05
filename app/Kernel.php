<?php
namespace app;

use app\middleware\AdminMiddleware;
use app\middleware\AuthMiddleware;
use app\middleware\RedirectIfAuthenticatedMiddleware;

class Kernel
{
    protected $routeMiddlewares = [
        'auth' => AuthMiddleware::class,
        'guest' => RedirectIfAuthenticatedMiddleware::class,
        'admin' => AdminMiddleware::class,
    ];
}