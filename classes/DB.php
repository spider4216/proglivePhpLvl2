<?php
class DB
{
    public function __construct()
    {
        require_once __DIR__ . '/../core/config.php';
        mysql_connect($config['db']['db_host'], $config['db']['db_username'], $config['db']['db_password']);
        mysql_select_db($config['db']['db_name']);
    }

    public function queryAll($sql , $class = 'stdClass')
    {
        $res = mysql_query($sql);

        if(false === $res) {
            return false;
        }

        $array = [];
        while ($row = mysql_fetch_object($res, $class)) {
            $array[] = $row;
        }

        return $array;
    }

    public function queryOne($sql, $class = 'stdClass')
    {
        return $this->queryAll($sql, $class)[0];
    }

    public function queryCrud($sql)
    {
        return mysql_query($sql);
    }
}