<?php

namespace App\Controllers;

use App\Models\Category;
use App\Models\Scraping;

class AdminScrapController extends Controller {

    public function scraping()
    {
        $data = new Scraping($this->getDb());
        $scraps = $data->findAll();

        return $this->view("admin.scraping.scraping", compact("scraps"));
    }

    public function edit(int $id)
    {
        $scrap = (new Scraping($this->getDb()))->findByid($id);
        $categories = (new Category($this->getDb()))->findAll();

        return $this->view("admin.scraping.form", compact("scrap", "categories"));
    }

    public function update(int $id)
    {
        $scrap = new Scraping($this->getDb());

        $categories = array_pop($_POST); 

        $res = $scrap->update($id, $_POST, $categories);

        if($res === true){ 
            return header('location: /projet-CDA/scrap/public/admin/scraping');
        }
    }

    public function delete(int $id)
    {
        $scrap = new Scraping($this->getDb());
        $res = $scrap->destroy($id);

        if($res === true){ 
            return header('location: /projet-CDA/scrap/public/admin/scraping');
        }
    }

    public function new(){
        $categories = (new Category($this->getDb()))->findAll();

        return $this->view("admin.scraping.form", compact('categories'));
    }

    public function newScrap(){

        $scrap = new Scraping($this->getDb());

        $categories = array_pop($_POST);

        $res = $scrap->create($_POST, $categories);

        if($res === true){ 
            return header('location: /projet-CDA/scrap/public/admin/scraping');
        }
    }

}
