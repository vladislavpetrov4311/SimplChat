<?php
require_once "/var/www/html/main_class.php";
use PHPUnit\Framework\TestCase;

class main_classTest extends TestCase
{

    private $main_obj;
    public function setUp(): void
    {
        $this->main_obj = $this->createMock(prepare::class);
    }

    //метод для проверки, что preGET вызовется и вернет объект-заглушку
    public function testpreGET()
    {
        $this->main_obj->expects($this->once())->method("preGET")->willreturn($this->createMock(methodGET::class));
        $res =$this->main_obj->preGET();
        $this->assertInstanceOf(methodGET::class , $res);
    }

    
    //метод для проверки, что prePOST вызовется и вернет объект-заглушку
    public function testprePOST()
    {
        $data = "";
        $this->main_obj->expects($this->once())->method("prePOST")->willreturn($this->createMock(methodPOST::class));
        $res = $this->main_obj->prePOST($data);
        $this->assertInstanceOf(methodPOST::class , $res);
    }

    //метод для проверки, что prePATCH вызовется и вернет объект-заглушку
    public function testprePATCH()
    {
        $data = "";
        $this->main_obj->expects($this->once())->method("prePATCH")->willreturn($this->createMock(methodPATCH::class));
        $res =$this->main_obj->prePATCH($data);
        $this->assertInstanceOf(methodPATCH::class , $res);
    }

    //метод для проверки, что preDELETE вызовется и вернет объект-заглушку
    public function testpreDELETE()
    {
        $this->main_obj->expects($this->once())->method("preDELETE")->willreturn($this->createMock(methodDELETE::class));
        $res =$this->main_obj->preDELETE();
        $this->assertInstanceOf(methodDELETE::class , $res);
    }
    

}





?>