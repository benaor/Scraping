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

    public function findById(int $id): Model
    {
        $sql = 'SELECT * FROM ' . $this->table . ' WHERE id = ?';
        return $this->query($sql, [$id], true);

        $req = $this->db->getPDO()->prepare('SELECT * FROM ' . $this->table . ' WHERE id = ?');
        $req->setFetchMode(PDO::FETCH_CLASS, get_class($this), [$this->db]);
        $req->execute([$id]);
        return $req->fetch();
    }

    public function query(string $sql, array $param = null, bool $single = null)
    {
        $method = is_null($param) ? "query" : "prepare";
        $fetch  = is_null($single) ? "fetchAll" : "fetch";

        if (strpos($sql, 'DELETE') === 0 || strpos($sql, 'UPDATE') === 0 || strpos($sql, 'INSERT') === 0) {

            $req = $this->db->getPDO()->$method($sql);
            $req->setFetchMode(PDO::FETCH_CLASS, get_class($this), [$this->db]);
            return $req->execute($param);
        }

        $req = $this->db->getPDO()->$method($sql);
        $req->setFetchMode(PDO::FETCH_CLASS, get_class($this), [$this->db]);

        if ($method === "query") {
            return $req->$fetch();
        } else {
            $req->execute($param);
            return $req->$fetch();
        }
    }

    public function update(int $id, array $data, ?array $relations = null)
    {
        $sqlRequestPart = "";
        $i = 1;

        foreach ($data as $key => $value) {
            $liaison = $i === count($data) ? ' ' : ', ';
            $sqlRequestPart .= $key . " = :" . $key . $liaison;
            $i++;
        }

        $data['id'] = $id;

        $sql = "UPDATE " . $this->table . " SET " . $sqlRequestPart . " WHERE id = :id";

        return $this->query($sql, $data);
    }

    public function destroy(int $id): bool
    {
        return $this->query('DELETE FROM ' . $this->table . ' WHERE id = ?', [$id]);
    }

    public function create(array $data, ?array $relations = null)
    {
        $i = 1;

        $parentheseTable = "";
        $parentheseValue = "";

        foreach ($data as $key => $value) {
            $liaison = $i === count($data) ? '' : ', ';
            $parentheseTable .= "{$key}{$liaison}";
            $parentheseValue .= ":{$key}{$liaison}";

            $i++;
        }

        return $this->query("INSERT INTO ".$this->table." (".$parentheseTable.") VALUE (".$parentheseValue.") ", $data);
    }
}
