<?php
namespace app\controllers;

use app\models\User;
use app\validators\LoginValidator;
use app\validators\RegisterValidator;
use src\core\Session;
use src\core\Auth;

class LoginController extends Controller
{
    public function loginForm()
    {
        $this->view->layout = 'empty';
        $this->view->render('auth/login');
    }

    public function login()
    {
        $errors = (new LoginValidator())->validate($this->request->request);

        if (!empty($errors)) {
            $this->response->back();
        }

        $name = $this->request->request['name'];
        $password = $this->request->request['password'];

        $user = new User();
        $user = Auth::attempt($name, $password) ?: $this->response->back();

        $this->response->redirect('/');
    }

    public function registerForm()
    {
        $this->view->layout = 'empty';
        $this->view->render('auth/register');
    }

    public function register()
    {
        $errors = (new RegisterValidator)->validate($this->request->request);
        if (!empty($errors)) {
            $this->response->back();
        }

        $user = new User([
            'name' => $this->request->request['name'],
            'email' => $this->request->request['email'],
            'password' => password_hash($this->request->request['password'], PASSWORD_BCRYPT),
        ]);
        $user->save();

        $user = Auth::attempt($this->request->request['name'], $this->request->request['password']);

        $this->response->redirect('/');
    }

    public function logout()
    {
        Session::getInstance()->forget('USER_ID');

        $this->response->back();
    }
}