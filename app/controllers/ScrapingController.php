<?php

namespace App\Controllers;

use App\Models\Scraping;

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

        $data = new Scraping($this->getDb());
        $scraps = $data->findAll(); 

        return $this->view('scraping.history', compact('scraps'));
    }

    public function show(int $id)
    {
        $data = new Scraping($this->getDb());
        $scrap = $data->findById($id); 
        
        return $this->view('scraping.show', compact('scrap'));
    }
}