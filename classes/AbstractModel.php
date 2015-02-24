<?php

abstract class AbstractModel {
    protected static $table;
    protected static $class;

    public static function findAll()
    {
        $db = new DB();
        $sql = 'SELECT * FROM ' . static::$table;
        return $db->queryAll($sql, static::$class);
    }

    public static function findOne($id)
    {
        $db = new DB();
        $sql = 'SELECT * FROM ' . static::$table . ' WHERE id='. $id;
        return $db->queryOne($sql, static::$class);
    }
}