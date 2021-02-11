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
        $req = $this->db->getPDO()->query('SELECT * FROM ' . $this->table . ' ORDER BY id ASC');
        $req->setFetchMode(PDO::FETCH_CLASS, get_class($this), [$this->db] );
        return $req->fetchAll();
    }

    public function findById(int $id) : Model
    {
        $req = $this->db->getPDO()->prepare('SELECT * FROM ' . $this->table . ' WHERE id = ?');
        $req->setFetchMode(PDO::FETCH_CLASS, get_class($this), [$this->db] );
        $req->execute([$id]);
        return $req->fetch();
    }
}
