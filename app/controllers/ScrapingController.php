<?php

namespace App\Controllers;

class ScrapingController {

    public function index()
    { 
        echo "Page de scraping";
    }

    public function show(int $id)
    {
        echo "page du scraping numero ". $id;
    }
}
