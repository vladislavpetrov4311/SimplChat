<?php
require "/var/www/html/main.php";
use PHPUnit\Framework\TestCase;

class mainTest extends TestCase
{

    private $main_obj;
    public function setUp(): void
    {
        $this->main_obj = new prepare();
    }

    public function testpreGET()
    {
        $this->main_obj->preGET();
        $this->assertInstanceOf(methodGET::class , $this->main_obj->obj);
    }

    public function testprePOST()
    {
        $this->main_obj->prePOST($data);
        $this->assertInstanceOf(methodPOST::class , $this->main_obj->obj);
    }

    public function testprePATCH()
    {
        $this->main_obj->prePATCH($data);
        $this->assertInstanceOf(methodPATCH::class , $this->main_obj->obj);
    }

    public function testpreDELETE()
    {
        $this->main_obj->preDELETE();
        $this->assertInstanceOf(methodDELETE::class , $this->main_obj->obj);
    }


}





?>