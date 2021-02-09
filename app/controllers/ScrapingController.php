<?php

namespace App\Controllers;

use Database\DBConnexion;

class ScrapingController extends Controller {

    public function index()
    { 
        return $this->view('scraping.index');
    }

    public function show(int $id)
    {
        $req = $this->db->getPDO()->query('SELECT * FROM scraping');
        $scraps = $req->fetchAll(); 

        // echo "<pre>";
        // print_r($scraps);
        // echo "</pre>";

        foreach($scraps as $scrap){
            echo $scrap->title;
        }

        return $this->view('scraping.show', compact('id'));
    }
}
