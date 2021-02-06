<?php
namespace src\core;

use src\core\DB;

class Model
{
    protected $db;
    protected $table;
    protected $fillable;
    protected $hidden;
    public $attrs;

    public function __construct($attrs = [])
    {
        $this->db = new DB();
        $this->attrs = $attrs;
    }

    public function __get($name)
    {
        return $this->attrs->$name;
    }

    public function all($limit = null, $offset = null, $orderBy = null, $orderDirection = null)
    {
        $sql = "select * from $this->table";
        $orderQuery = " ORDER BY $orderBy $orderDirection ";
        $limitQuery = " limit $limit offset $offset";
        $sql = $orderBy ? $sql.$orderQuery : $sql;
        $sql = $limit ? $sql.$limitQuery : $sql;
        return $this->db->row($sql);
    }

    public function count()
    {
        return $this->db->column('SELECT COUNT(*) FROM '.$this->table);
    }

    public function findById($id)
    {
        $found = $this->db->get('Select * from '.$this->table.' where id = :id', ['id' => $id]);
        return $found ? new $this($found) : null;
    }

    public function deleteById($id)
    {
        return $this->db->query('Delete from '.$this->table.' where id = :id', ['id' => $id])->execute();
    }

    public function save()
    {
        $binds = array_map(function ($item) {
            return ':'.$item;
        }, $this->fillable);
        return $this->db->query('Insert Into '.$this->table.' ('.implode(', ', $this->fillable).') values ('.implode(', ', $binds).')', $this->attrs)->execute();
    }

    public function update($attrs)
    {
        $binds = [];
        foreach ($attrs as $key => $attr) {
            $binds[] = $key . ' = :' .$key;
        }
        return $this->db->query('update '.$this->table.' set '.implode(', ', $binds).' where id = :id', array_merge($attrs, ['id' => $this->id]))->execute();
    }
}