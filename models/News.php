<?php

class News extends AbstractModel {
    public $id;
    public $title;
    public $date;
    public $description;

    protected static $table = 'news';
    protected static $class = 'News';
}