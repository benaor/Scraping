<?php

namespace App\Controllers;

use App\Models\Scraping;
use Database\DBConnexion;

class ScrapingController extends Controller {

    public function home()
    { 
        return $this->view('scraping.home');
    }

    public function scraping()
    { 
        return $this->view('scraping.scraping');
    }
 
    //Correspond a l'index
    public function history(){

        $scrap = new Scraping;
        $scrap->all(); 

        $req = $this->db->getPDO()->query('SELECT * FROM scraping ORDER BY id ASC');
        $scraps = $req->fetchAll(); 

        return $this->view('scraping.history', compact('scraps'));
    }

    public function show(int $id)
    {
        $req = $this->db->getPDO()->prepare("SELECT * FROM scraping WHERE id = ?");
        $req->execute([$id]);
        $scrap = $req->fetch();

        return $this->view('scraping.show', compact('scrap'));
    }
}