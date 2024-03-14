<?php
require "class.php";
header('Content-type: application/json');

$method = $_SERVER['REQUEST_METHOD'];

switch($method)
    {
        case "GET":
            $getall = new methodGET();
            $getall->execSQL();
            $res = $getall->getdata();
            echo $res;
            break;

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