<?php

namespace App\Controllers;

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
        $data = new Scraping($this->getDb());
        $scrap = $data->findByid($id);

        return $this->view("admin.scraping.edit", compact("scrap"));
    }

    public function update(int $id)
    {
        $scrap = new Scraping($this->getDb());
        $res = $scrap->update($id, $_POST);  

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
}
