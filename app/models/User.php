<?php

namespace App\Models;  

class User extends Model {

    protected $table = 'user';

    public function getByEmail(string $username): User
    {
        return $this->query("SELECT * FROM ". $this->table . " WHERE email = ?", [$username], true);
    }

}