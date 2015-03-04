<?php
class DB
{
    private $dbh;
    private $class = 'stdClass';

    public function __construct()
    {
        require __DIR__ . '/../core/config.php';
        $dsn = 'mysql:dbname=' . $config['db']['db_name'] . ';host=' . $config['db']['db_host'];
        $this->dbh = new PDO($dsn, $config['db']['db_username'], $config['db']['db_password']);
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
        return $sth->execute($params);
    }

    public function lastInsertId()
    {
        return $this->dbh->lastInsertId();
    }
}