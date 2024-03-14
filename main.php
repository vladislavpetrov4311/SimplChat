<?php
require "class.php";
header('Content-type: application/json');

$method = $_SERVER['REQUEST_METHOD'];

$q = $_GET['q'];
$params = explode('/' , $q);

$type = $params[0];
$id = $params[1];

switch($method)
    {
        case "GET":
            if($type === "main")
                {
                    $getall = new methodGET();
                    if($id!= NULL)
                        {
                            $getall->execSQLid($id);
                            $res = $getall->getdata();
                            echo $res;
                        }
                    else
                        {
                            $getall->execSQL();
                            $res = $getall->getdata();
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