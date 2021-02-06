<?php


namespace app\middleware;


use src\core\Auth;
use src\core\Request;
use src\core\Session;
use src\core\View;

class AdminMiddleware
{
    public function handle(Request $request)
    {
        if (Auth::user() && Auth::user()->admin == true) {
            return true;
        }
        View::errorCode(403);
    }
}