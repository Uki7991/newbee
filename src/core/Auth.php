<?php
namespace src\core;


use app\models\User;
use src\core\models\UserModel;

abstract class Auth
{
    public static function attempt($username, $password)
    {
        $user = new User();
        $user = $user->findByName($username);

        if ($user) {
            if (password_verify($password, $user->password)) {
                Session::getInstance()->set('USER_ID', $user->id);
                return $user;
            }
        }

        Session::getInstance()->flash('errors', ['email' => 'Credentials not found']);
        Session::getInstance()->flash('old', ['name' => $username]);

        return false;
    }

    public static function user()
    {
        $user = new User();
        $user = $user->findById(Session::getInstance()->get('USER_ID'));
        return $user;
    }
}