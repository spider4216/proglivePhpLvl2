<?php

abstract class AbstractModel implements IModel {
    protected static $table;
    public $id;
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

    protected function insert()
    {
        $db = new DB();
        $cols = array_keys($this->data);
        $colsPrepare = array_map(function($col_name) { return $col_name = ':' . $col_name;}, $cols);
        $dataExec = [];
        foreach ($this->data as $key => $value) {
            $dataExec[':' . $key] = $value;
        }

        $sql = 'INSERT INTO ' . static::$table . ' (' . implode(', ', $cols) . ') VALUES (' . implode(', ', $colsPrepare) . ') ';

        $result =  $db->execute($sql, $dataExec);

        if (true == $result) {
            $this->id = $db->lastInsertId();
        }

        return $result;
    }

    protected function update()
    {
        $db = new DB();

        $data = [];
        $dataExec = [];

        foreach ($this->data as $key=>$value) {
            $data[] = $key . ' = :' . $key;
            $dataExec[':' . $key] = $value;
        }

        $dataExec[':id'] = $this->id;

        $sql = 'UPDATE ' . static::$table . ' SET ' . implode(', ', $data) . ' WHERE id=:id';
        return  $db->execute($sql, $dataExec);
    }

    public function save()
    {
        $db = new DB();
        if (isset($this->id)) {
            $sql = 'SELECT * FROM ' . static::$table . ' WHERE id-:id';
            $res = $db->query($sql, [':id'=>$this->id]);
            if (!empty($res)) {
                return $this->update();
            }
        }
        return $this->insert();
    }

    public function delete()
    {
        $db = new DB();

        $sql = 'DELETE FROM ' . static::$table . ' WHERE id=:id';

        return  $db->execute($sql, [':id'=>$this->id]);
    }

}