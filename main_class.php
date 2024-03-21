<?php
require_once "class.php";
header('Content-type: application/json');

abstract class selMethod
{
    public $obj;

    public function preGET()
    {
        return $this->obj = new methodGET();
    }

    public function prePOST($data)
    {
        return $this->obj = new methodPOST($data);
    }

    public function prePATCH($data)
    {
        return $this->obj = new methodPATCH($data);
    }

    public function preDELETE()
    {
        return $this->obj = new methodDELETE();
    }
}

class Prepare extends selMethod
{
    public $method;
    public $params = [];

    public function __construct($method , $params)
    {
        $this->method = $method;
        $this->params = explode('/' , $params);
    }
}

class switchMethod
{
    public $switch_obj;
    public function __construct($obj)
    {
        $this->switch_obj = $obj;
    }


    public function bodyGETid()
    {
        $this->switch_obj->obj->execSQLid($this->switch_obj->params[1]);
        $res = $this->switch_obj->obj->getdata();
        echo $res;
    }

    public function bodyGET()
    {
        $this->switch_obj->obj->execSQL();
        $res = $this->switch_obj->obj->getdata();
        echo $res;
    }

    public function bodyPOST()
    {
        $this->switch_obj->obj->execSQL();
    }

    public function bodyPATCH()
    {
        $this->switch_obj->obj->execSQL();
    }

    public function bodyDELETE($id)
    {
        $this->switch_obj->obj->execSQL($id);
    }
}




?>