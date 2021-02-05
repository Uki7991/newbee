<?php
namespace src\core;

use src\core\DB;

class Model
{
    protected $db;
    protected $table;
    protected $fillable;
    protected $hidden;
    private $attrs;

    public function __construct($attrs = [])
    {
        $this->db = new DB();
        $this->attrs = $attrs;
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
        return $this->db->get('Select * from '.$this->table.' where id = :id', ['id' => $id]);
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
}