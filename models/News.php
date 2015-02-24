<?php

require_once __DIR__ . '/../classes/DB.php';
class News {
    public $id;
    public $title;
    public $date;
    public $description;

    public static function findAll()
    {
        $db = new DB();
        return $db->query('SELECT * FROM news', 'News');
    }
}