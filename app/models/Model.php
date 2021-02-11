<?php

namespace App\Models;

use PDO;
use stdClass;
use Database\DBConnexion;

abstract class Model
{

    protected $db;
    protected $table;

    public function __construct(DBConnexion $db)
    {
        $this->db = $db;
    }

    public function findAll(): array
    {
        $sql = 'SELECT * FROM ' . $this->table . ' ORDER BY id ASC';
        return $this->query($sql);
    }

    public function findById(int $id) : Model
    {
        $sql = 'SELECT * FROM ' . $this->table . ' WHERE id = ?';
        return $this->query($sql, $id, true); 

        $req = $this->db->getPDO()->prepare('SELECT * FROM ' . $this->table . ' WHERE id = ?');
        $req->setFetchMode(PDO::FETCH_CLASS, get_class($this), [$this->db] );
        $req->execute([$id]);
        return $req->fetch();
    }

    public function query(string $sql, int $param = null, bool $single = null) 
    {
        $method = is_null($param) ? "query" : "prepare";
        $fetch  = is_null($single) ? "fetchAll" : "fetch";


        $req = $this->db->getPDO()->$method($sql);
        $req->setFetchMode(PDO::FETCH_CLASS, get_class($this), [$this->db] );

        if($method === "query"){
            return $req->$fetch();
        } else {
            $req->execute([$param]);
            return $req->$fetch();
        }
    }
}
