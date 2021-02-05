<?php
namespace src\core;

class Session
{
    private static $instance = null;
    private function __construct()
    {
    }

    public static function getInstance()
    {
        if (is_null(self::$instance)) {
            self::$instance = new self();
        }

        return self::$instance;
    }

    public function get($attr)
    {
        return isset($_SESSION[$attr]) ? $_SESSION[$attr] : null;
    }

    public function set($attr, $value)
    {
        $_SESSION[$attr] = $value;
    }

    public function flash($attr, $value)
    {
        $this->set($attr, $value);
    }

    public function getFlash($attr)
    {
        $value = $this->get($attr);
        $this->forget($attr);
        return $value;
    }

    public function forget($attr)
    {
        unset($_SESSION[$attr]);
    }
}