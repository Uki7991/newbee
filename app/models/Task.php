<?php
namespace app\models;

use src\core\Model;

class Task extends Model
{
    protected $table = 'tasks';

    protected $fillable = [
        'title', 'username', 'email',
    ];
}