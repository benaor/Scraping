<?php

namespace App\Models;

use Database\DBConnexion;

abstract class Model {

    protected $db; 

    public function __construct(DBConnexion $db)
    {
        $this->db = $db; 
    }
}