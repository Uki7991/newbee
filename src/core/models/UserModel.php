<?php
namespace src\core\models;

use src\core\Model;

class UserModel extends Model
{
    public function findByEmail($email)
    {
        return $this->db->get('SELECT * FROM '.$this->table.' WHERE `email` = :email', ['email' => $email]);
    }

    public function findByName($name)
    {
        return $this->db->get("Select * from $this->table where `name` = :username", ['username' => $name]);
    }
}