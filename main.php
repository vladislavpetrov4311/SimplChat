<?php
require "class.php";
header('Content-type: application/json');

class Prepare
{
    public $method;

    public $objGET;

    public $q;
    public $params = [];
    public $type;
    public $id;
    public function __construct()
    {
        $this->method = $_SERVER['REQUEST_METHOD'];
        $this->q = $_GET['q'];
        $this->params = explode('/' , $this->q);
        $this->type = $this->params[0];
        $this->id = $this->params[1];
    }

    public function preGET()
    {
        $this->objGET = new methodGET();
    }
}

$main_obj = new Prepare();

switch($main_obj->method)
    {
        case "GET":
            $main_obj->preGET();
            if($main_obj->type === "main")
                {
                    if($main_obj->id != NULL)
                        {
                            $main_obj->objGET->execSQLid($main_obj->id);
                            $res = $main_obj->objGET->getdata();
                            echo $res;
                        }
                    else
                        {
                            $main_obj->objGET->execSQL();
                            $res = $main_obj->objGET->getdata();
                            echo $res;
                        }
            break;
                }

        case "POST":
            break;

        case "PATCH":
            break;

        case "DELETE":
            break;

        default:
            echo "необрабатываемый request метод"; 

    }







?>