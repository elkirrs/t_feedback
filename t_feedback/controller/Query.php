<?php


class Query
{
    private $name;
    private $email;
    private $text;
    private $uploadfile;
    private $delete;

    public function __construct()
    {
        $this->requireDatabase();
    }

    public function insert($name, $email, $text, $uploadfile)
    {
        $this->name = $name;
        $this->email = $email;
        $this->text = $text;
        $this->uploadfile = $uploadfile;

        $insert = "INSERT INTO `feedback` (`name`,`email`,`text`, `foto`) VALUES ('$this->name','$this->email','$this->text','$this->uploadfile')";
        $queryInsert = $this->dbQuery($insert);

        return $queryInsert;
    }

    public function auht()
    {
        $select = "SELECT `login`, `pass` FROM `user`";
        $authuser = $this->dbQuery($select);
        return $authuser;
    }

    public function deletePost($delete)
    {
        $this->delete = $delete;
        $select = 'DELETE FROM `feedback` WHERE id IN('. $this->delete . ')';
        $delete = $this->dbExecute($select);
        return $delete;
    }

    public function selectAllReview()
    {
        $select = "SELECT `id`, `name`, `text`, `email`, `date`, `foto` FROM `feedback` ORDER BY `date` DESC ";
        $selectQuery = $this->dbQuery($select);
        return $selectQuery;
    }

    public function selectReview()
    {
        return $this->selectAllReview();
    }

    private function dbQuery($sql)
    {
        $db = new Database();
        return $db->query($sql);
    }

    private function dbExecute($sql)
    {
        $db = new Database();
        return $db->execute($sql);
    }

    private function requireDatabase()
    {
        $connect = require_once "Database.php";
        return $connect;
    }


}

$query = new Query();
