<?php
namespace src\core;


use app\models\User;
use src\core\models\UserModel;

abstract class Auth
{
    public static function attempt($email, $password)
    {
        $user = new User();
        $user = $user->findByEmail($email);

        if ($user) {
            if (password_verify($password, $user->password)) {
                Session::getInstance()->set('USER_ID', $user->id);
                return $user;
            }
        }

        Session::getInstance()->flash('errors', ['email' => 'Credentials not found']);
        Session::getInstance()->flash('old', ['email' => $email]);

        return false;
    }

    public static function user()
    {
        $user = new User();
        $user = $user->findById(Session::getInstance()->get('USER_ID'));
        return $user;
    }
}