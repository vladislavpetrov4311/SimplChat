<?php

class connectPDO extends PDO
{
    private $host = 'my_bd';
    private $username = 'root';
    private $password = 'root';
    private $database = 'testDB';

    private $pdo;
    public function __construct()
    {
        return $this->pdo = parent::__construct("mysql:host=$this->host;dbname=$this->database;", $this->username, $this->password);
    }
}

class methodGET
{
    private $sql = "SELECT * FROM `Q1`;";
    private $sql_id = "SELECT * FROM `Q1` WHERE `id` = :id;";
    private $res;
    private $data;

    private $obj;
    public function __construct()
    {
        $this->obj = new connectPDO();
    }

    public function execSQL()
    {
        $this->res = $this->obj->prepare($this->sql);
        $this->res->execute();
    }

    public function getdata()
    {
        $this->data = $this->res->fetchAll(connectPDO::FETCH_ASSOC);
        return json_encode($this->data, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
    }



    public function execSQLid($id)
    {
        $this->res = $this->obj->prepare($this->sql_id);
        $this->res->execute([
            ':id' => $id
        ]);
    }

}


class methodPOST
{   
    private $sql = "INSERT INTO `Q1` (`body` , `time` , `author`) VALUES (:body , DATE_ADD(NOW(), INTERVAL 3 HOUR) , :author);";
    private $res;
    private $data = [];

    private $obj;
    public function __construct($data)
    {
        $this->obj = new connectPDO();
        $this->data = $data;
    }

    public function execSQL()
    {
        $this->res = $this->obj->prepare($this->sql);
        $this->res->execute([
            ':body' => $this->data['body'],
            ':author' => $this->data['author']
        ]);
    }

}


class methodPATCH
{
    private $sql = "UPDATE `Q1` SET `body` = :body WHERE `id` = :id;";
    private $res;
    private $data = [];

    private $obj;
    public function __construct($data)
    {
        $this->obj = new connectPDO();
        $this->data = $data;
    }

    public function execSQL()
    {
        $this->res = $this->obj->prepare($this->sql);
        $this->res->execute([
            ':body' => $this->data['body'],
            ':id' => $this->data['id']
        ]);
    }

}


class methodDELETE
{
    private $sql = "DELETE FROM `Q1` WHERE `id` = :id;";
    private $res;

    private $obj;
    public function __construct()
    {
        $this->obj = new connectPDO();
    }

    public function execSQL($id)
    {
        $this->res = $this->obj->prepare($this->sql);
        $this->res->execute([
            ':id' => $id
        ]);
    }

}






?>