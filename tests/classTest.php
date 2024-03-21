<?php
require_once "/var/www/html/class.php";
use PHPUnit\Framework\TestCase;

class classTest extends TestCase
{
    private $obj;
    private $main_obj;
    //метод для проверки, что объект является экземпляром данного класса 
    public function testconnect()
    {
            $this->obj = $this->createMock(connectPDO::class);
            $this->assertInstanceOf(connectPDO::class , $this->obj);
    }

    
    //метод для проверки, что метод getdata заглушается
    public function testmethodGET()
    {
        $this->obj = $this->createStub(methodGET::class);
        $this->obj->method("getdata")->willreturn("заглушка");
        $this->assertNotNull($this->obj->getdata());

    }

}


?>