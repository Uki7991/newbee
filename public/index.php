<?php
$lifetime = 40;
session_start([
    'cookie_lifetime' => $lifetime * 60,
]);
define('__ROOT__', dirname(dirname(__FILE__)));
define('__VIEW_DIR__', __ROOT__.'/app/views/');
define('__CONTROLLER_DIR__', __ROOT__.'/app/controllers/');
define('__PUBLIC_DIR__', __ROOT__.'/public');
define('__ASSETS_DIR__', __PUBLIC_DIR__.'/assets');

require(__ROOT__.'/src/lib/Debug.php');
use src\core\Router;
use src\core\Request;
use src\core\Validator;

spl_autoload_register(function ($class) {
    $path = str_replace('\\', '/', $class.'.php');
    if (file_exists('../'.$path)) {
        require '../'.$path;
    }
});
require(__ROOT__.'/routes.php');

$request = new Request();
$validator = new Validator();
$router = new Router($request);
