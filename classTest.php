<?php
require "/var/www/html/class.php";
use PHPUnit\Framework\TestCase;

class classTest extends TestCase
{
    private $obj;

    //мето для проверки, что объект является экземпляром данного класса 
    public function testconnect()
    {
            $this->obj = new connectPDO();
            $this->assertInstanceOf(connectPDO::class , $this->obj);
    }

    //метод для проверки, что в getdata возвращается не пустое значение
    public function testmethodGET()
    {
        $this->obj = new methodGET();
        $this->obj->execSQL();
        $this->assertNotNull($this->obj->getdata());

    }


}


?>