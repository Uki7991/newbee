<?php
namespace app\middleware;

use src\core\Auth;
use src\core\Request;

class RedirectIfAuthenticatedMiddleware
{
    public function handle(Request $request)
    {
        if (Auth::user()) {
            $request->redirect('/');
        }

        return true;
    }
}