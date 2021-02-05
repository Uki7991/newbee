<?php
namespace app\models;

use src\core\models\UserModel;

class User extends UserModel
{

    protected $table = 'users';
    protected $fillable = ['name', 'email', 'password'];
    protected $hidden = ['password'];
}