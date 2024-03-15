<?php
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Headers: *');
header('Access-Control-Allow-Methods: *');
header('Access-Control-Allow-Credentials: true');

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

    public function __construct()
    {
        $this->method = $_SERVER['REQUEST_METHOD'];
        $this->params = explode('/' , $_GET['q']);
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



$main_obj = new Prepare();
$SW_class = new switchMethod($main_obj);

if($main_obj->params[0] === "main")
{
switch($main_obj->method)
    {
        case "GET":
            $main_obj->preGET();
            if($main_obj->params[1] != NULL)
                {
                    $SW_class->bodyGETid();
                }
                else
                {
                    $SW_class->bodyGET();
                }
            break;

        case "POST":
            $main_obj->prePOST($_POST);
            $SW_class->bodyPOST();
            break;

        case "PATCH":
            if($main_obj->params[1] != NULL)
            {
            $data = file_get_contents('php://input');
            $data = json_decode($data, true);
            $data['id'] = $main_obj->params[1];

            $main_obj->prePATCH($data);
            $SW_class->bodyPATCH();
            }
            break;

        case "DELETE":
            if($main_obj->params[1] != NULL)
            {
                $main_obj->preDELETE();
                $SW_class->bodyDELETE($main_obj->params[1]);
            }
            break;

        default:
            echo "необрабатываемый request метод"; 

    }

}





?>