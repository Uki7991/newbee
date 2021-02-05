<?php

namespace src\core;


class Request extends Response
{
    public $core;
    public $query;
    public $method;
    public $request = [];
    public $session;
    public $server;

    public function __construct()
    {
        $this->session = Session::getInstance();
        $this->session->set('token', bin2hex(random_bytes(24)));
        $this->server = $_SERVER;
        $this->core = preg_split('/\?/', $_SERVER['REQUEST_URI'])[0];
        $this->method = $_SERVER['REQUEST_METHOD'];
        if ($this->method === 'POST') {
            $this->request = $_POST;
        }

        if ($_SERVER['QUERY_STRING'] !== '') {
            foreach (explode('&', $_SERVER['QUERY_STRING']) as $item) {
                $query = explode('=', $item);
                $this->query[$query[0]] = isset($query[1]) ? $query[1] : true;
            }
        } else {
            $this->query = [];
        }
    }
}