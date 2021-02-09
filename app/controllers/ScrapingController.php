<?php

namespace App\Controllers;

class ScrapingController extends Controller {

    public function index()
    { 
        return $this->view('scraping.index');
    }

    public function show(int $id)
    {
        return $this->view('scraping.show', compact('id'));
    }
}
