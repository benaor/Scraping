<?php

namespace App\Models;

use DateTime;

class Scraping extends Model
{
    protected $table = 'scraping';
    private $id;
    private $title;
    private $category;
    private $url;
    private $path;
    private $period;
    private $created_at;



    /**
     * Get the value of id
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of title
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set the value of title
     *
     * @return  self
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get the value of url
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * Set the value of url
     *
     * @return  self
     */
    public function setUrl($url)
    {
        $this->url = $url;

        return $this;
    }

    /**
     * Get the value of path
     */
    public function getPath()
    {
        return $this->path;
    }

    /**
     * Set the value of path
     *
     * @return  self
     */
    public function setPath($path)
    {
        $this->path = $path;

        return $this;
    }

    /**
     * Get the value of period
     */
    public function getPeriod()
    {
        return $this->period;
    }

    /**
     * Set the value of period
     *
     * @return  self
     */
    public function setPeriod($period)
    {
        $this->period = $period;

        return $this;
    }

    /**
     * Get the value of created_at
     */
    public function getCreatedAt()
    {
        $date = new DateTime($this->created_at);
        return $date->format("l d/m/Y \à H:i");
    }

    /**
     * Set the value of created_at
     *
     * @return  self
     */
    public function setCreated_at($created_at)
    {
        $this->created_at = $created_at;

        return $this;
    }

    public function getCategory()
    {
        $sql = 'SELECT c.* FROM category c 
        INNER JOIN scraping_category sc ON sc.category_id = c.id
        INNER JOIN scraping s ON sc.scraping_id = s.id
        WHERE s.id = ?';

        return $this->query($sql, [$this->getId()]);
    }

    public function update(int $id, array $data, ?array $relations = null)
    {
        parent::update($id, $data);

        $stmt = $this->db->getPDO()->prepare("DELETE FROM scraping_category WHERE scraping_id = ?");
        $res = $stmt->execute([$id]);

        foreach ($relations as $categoryId) {
            $stmt = $this->db->getPDO()->prepare("INSERT scraping_category (scraping_id, category_id) VALUES (?, ?) ");
            $stmt->execute([$id, $categoryId]);
        }

        if($res){
            return true;
        }
    }
}
