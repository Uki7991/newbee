<?php
namespace src\core;


class View
{
    public $errors;
    public $layout = 'app';

    public function render($path, $vars = [])
    {
        extract($vars);
        $errors = Session::getInstance()->getFlash('errors');
        $old = Session::getInstance()->getFlash('old');
        extract($errors ?: []);
        extract($old ?: []);
        if (file_exists(__VIEW_DIR__ . $path.'.php')) {
            ob_start();
            require __VIEW_DIR__ . $path . '.php';
            $content = ob_get_clean();
            require __VIEW_DIR__ . 'layouts/' . $this->layout . '.php';
        } else {
            self::errorCode(404);
//            echo "View not found: " . __VIEW_DIR__ . $path . '.php';
        }
        exit;
    }

    public static function errorCode($code)
    {
        http_response_code($code);
        require __VIEW_DIR__ . 'errors/' . $code . '.php';
        exit;
    }
}