<?php

namespace App\Models;

use Database\DBConnexion;
use stdClass;

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
        return $req->fetchAll();
    }

    public function findById(int $id) : stdClass
    {
        $req = $this->db->getPDO()->prepare('SELECT * FROM ' . $this->table . ' WHERE id = ?');
        $req->execute([$id]);
        return $req->fetch();
    }
}
