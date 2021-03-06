<?php
/**
 * Test class for CWebSource.
 * Generated by PHPUnit on 2011-02-01 at 21:37:40.
 */
class CWebSourceTest extends PHPUnit_Framework_TestCase {

    /**
     * @var CWebSource
     */
    protected $objectUrlValid;
    protected $objectNull;
    protected $objectUrlNotValid;

    /**
     * Sets up the fixture, for example, opens a network connection.
     * This method is called before a test is executed.
     */
    protected function  setUp() {
        $this->objectUrlValid = new CWebSource("http://www.walla.co.il");
    }
    
    
    public function testWebSourceIsNull(){

//        $this->assertNull($this->object->url);
    }
    
    public function testGetUrl(){
//        $this->assertEquals("http://www.bla.com",$this->object->getUrl());
        $this->objectNull = new CWebSource();
        $this->assertNull($this->objectNull->getUrl());
    }

    public function testUrlIsValid(){
        $this->assertEquals("http://www.walla.co.il",$this->objectUrlValid->getUrl());
    }

    public function testExceptionUrlIsInvalid(){
        $this->objectUrlNotValid = new CWebSource("http://");
        $this->setExpectedException('CException');
        $this->objectUrlNotValid->isValidURL();
    }

    public function testGetIsArray(){
        $this->setExpectedException('CException');
        $this->objectUrlValid->setGetValues('check');
      
    }

    public function testPostIsArray(){
        $this->setExpectedException('CException');
        $this->objectUrlValid->setGetValues('check');
    }

    public function test_Set_Get_getArray(){
        $array = array();
        $this->assertEquals($array, $this->objectUrlValid->getGetValues());
        //set Get Array with some values
        $array = array(1 => 'check');
        $this->objectUrlValid->setGetValues($array);
        $this->assertEquals($array, $this->objectUrlValid->getGetValues());
    }
    
    public function test_Set_Get_postArray(){
        $array = array();
        $this->assertEquals($array, $this->objectUrlValid->getPostValues());
        //set Post Array with some values
        $array = array(1 => 'check');
        $this->objectUrlValid->setPostValues($array);
        $this->assertEquals($array, $this->objectUrlValid->getPostValues());
    }


    public function testAfterUrlParse(){
        //TODO check if url after parse is ok
//        $this->assertEquals('http://www.walla.co.il/',$this->objectUrlValid->parsingUrlAndInsertGetValues($this->objectUrlValid->getUrl()));
        $this->assertEquals('www.walla.co.il',$this->objectUrlValid->parsingUrlAndInsertGetValues('www.walla.co.il/'));
    }  

    public function testGetArrayAfterUrlParse(){
        //TODO check if get array after parse is ok
    }

    /**
     * Tears down the fixture, for example, closes a network connection.
     * This method is called after a test is executed.
     */
    protected function tearDown() {
        
    }

   

}

?>
