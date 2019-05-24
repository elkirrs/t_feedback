<?php
session_start();


class Database
{

    private $link;


    /**
     * Database constructor.
     * Autoload connect database
     */
    public function __construct()
    {
        $this->connect();
    }

    /**
     * @return $this
     * connect database
     */
    private function connect()
    {
        $config = require 'config/database.php';
        $dsn = 'mysql:host='.$config['host'].';dbname='.$config['dbname'].';charset='.$config['charset'];
        $this->link = new PDO($dsn, $config['username'], $config['password']);
        return $this;
    }

    /**
     * @param $sql
     * @return mixed
     * Подготовка запрса к выполнению
     */
    public function execute($sql)
    {
        $sth = $this->link->prepare($sql);
        return $sth->execute();
    }

    /**
     * @param $sql
     * @return array
     * query database
     */
    public function query($sql)
    {
        $sth = $this->link->prepare($sql);
        $sth->execute();
        $result = $sth->fetchAll(PDO::FETCH_ASSOC);
        if ($result === false){
            return [];
        }
        return $result;
    }

}

