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






?>