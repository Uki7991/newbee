<?php

namespace app\middleware;

use src\core\Auth;
use src\core\Request;

class AuthMiddleware
{
    public function handle(Request $request)
    {
        if (!Auth::user()) {
            $request->redirect('/login');
        }

        return true;
    }
}