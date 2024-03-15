<?php
require "class.php";
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
}

class Prepare extends selMethod
{
    public $method;
    public $params = [];

    public function __construct()
    {
        $this->method = $_SERVER['REQUEST_METHOD'];
        $this->params = explode('/' , $_GET['q']);
    }
}

$main_obj = new Prepare();

switch($main_obj->method)
    {
        case "GET":
            $main_obj->preGET();
            if($main_obj->params[0] === "main")
                {
                    if($main_obj->params[1] != NULL)
                        {
                            $main_obj->obj->execSQLid($main_obj->params[1]);
                            $res = $main_obj->obj->getdata();
                            echo $res;
                        }
                    else
                        {

                            $main_obj->obj->execSQL();
                            $res = $main_obj->obj->getdata();
                            echo $res;
                        }
            break;
                }

        case "POST":
            $main_obj->prePOST($_POST);
            if($main_obj->params[0] === "main")
                {
                    $main_obj->obj->execSQL();
                }
            break;

        case "PATCH":
            break;

        case "DELETE":
            break;

        default:
            echo "необрабатываемый request метод"; 

    }







?>