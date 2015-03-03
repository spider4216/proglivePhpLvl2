<?php

abstract class AbstractModel implements IModel {
    protected static $table;
    protected $data = [];

    public function __set($k, $v)
    {
        $this->data[$k] = $v;
    }

    public function __get($k)
    {
        return $this->data[$k];
    }

    public static function findAll()
    {
        $db = new DB();

        $class = get_called_class();
        $db->setClassName($class);

        $sql = 'SELECT * FROM ' . static::$table . ' ORDER BY date DESC';
        return $db->query($sql);
    }

    public static function findByPk($id)
    {
        $db = new Db();

        $class = get_called_class();
        $db->setClassName($class);

        $sql = 'SELECT * FROM ' . static::$table . ' WHERE id=:id';
        return $db->query($sql, [':id'=>$id])[0];
    }

    public static function findByColumn($column, $value)
    {
        $db = new DB();

        $class = get_called_class();
        $db->setClassName($class);

        $sql = 'SELECT * FROM ' . static::$table . ' WHERE ' . $column . ' = :value';
        return $db->query($sql, [':value' => $value]);
    }

    public function save()
    {
        $db = new DB();
        $cols = array_keys($this->data);
        $colsPrepare = array_map(function($col_name) { return $col_name = ':' . $col_name;}, $cols);
        $dataExec = [];
        foreach ($this->data as $key => $value) {
            $dataExec[':' . $key] = $value;
        }

        $sql = 'INSERT INTO ' . static::$table . ' (' . implode(', ', $cols) . ') VALUES (' . implode(', ', $colsPrepare) . ') ';
        //var_dump($sql);
        return $db->execute($sql, $dataExec);


    }

}