<?php

namespace Application\Classes;

use \PDO;

class DB
{
    private $dbh;
    private $class = 'stdClass';

    public function __construct()
    {
        require __DIR__ . '/../core/config.php';
        $dsn = 'mysql:dbname=' . $config['db']['db_name'] . ';host=' . $config['db']['db_host'];
        $this->dbh = new PDO($dsn, $config['db']['db_username'], $config['db']['db_password']);
        $this->dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    public function setClassName($class)
    {
        $this->class = $class;
    }

    public function query($sql, $params = [])
    {

        $sth = $this->dbh->prepare($sql);
        $sth->execute($params);

        return $sth->fetchAll(PDO::FETCH_CLASS, $this->class);
    }

    public function execute($sql, $params = [])
    {
        $sth = $this->dbh->prepare($sql);
        $result = $sth->execute($params);

        return $result;
    }

    public function lastInsertId()
    {
        return $this->dbh->lastInsertId();
    }
}