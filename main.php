<?php
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Headers: *');
header('Access-Control-Allow-Methods: *');
header('Access-Control-Allow-Credentials: true');

require_once "main_class.php";

$main_obj = new Prepare($_SERVER['REQUEST_METHOD'] , $_GET['q']);
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