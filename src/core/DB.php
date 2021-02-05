<?php
namespace src\core;


use PDO;

class DB
{
    protected $db;

    public function __construct()
    {
        $config = require(__ROOT__.'/config/database.php');
        $this->db = new \PDO('mysql:host='.$config['host'].';dbname='.$config['database'], $config['username'], $config['password']);
        $this->db->exec('set names '.$config['charset']);
        $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    public function query($sql, $params) {
        $stmt = $this->db->prepare($sql);
        if (!empty($params)) {
            foreach ($params as $key => $val) {
                $stmt->bindValue(':'.$key, htmlspecialchars($val));
            }
        }

        return $stmt;
    }

    public function row($sql, $params = []) {
        $result = $this->query($sql, $params);
        $result->execute();
        return $result->fetchAll(PDO::FETCH_OBJ);
    }

    public function get($sql, $params)
    {
        $result = $this->query($sql, $params);
        $result->execute();
        return $result->fetch(PDO::FETCH_OBJ);
    }

    public function column($sql, $params = []) {
        $result = $this->query($sql,$params);
        $result->execute();
        return $result->fetchColumn();
    }

}