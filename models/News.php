<?php

class News extends AbstractModel {
    public $id;
    public $title;
    public $date;
    public $description;

    protected static $table = 'news';
    protected static $class = 'News';

    public static function addNews($title, $description)
    {
        $db = new DB();
        $sql = 'INSERT INTO ' . self::$table . ' (title, description) VALUES (\'' . $title . '\', \'' . $description . '\')';
        return $db->queryCrud($sql);
    }
}