<?php
namespace src\core;


class Response
{
    public function json($var)
    {
        header('Content-Type: application/json');
        echo json_encode($var);
    }

    public function redirect($url)
    {
        header('location: '.$url);
        exit;
    }

    public function back()
    {
        header('location: '.$_SERVER['HTTP_REFERER']);
        exit;
    }
}