<?php
require_once __DIR__."/../../lib/utils.php";
class UserTest extends PHPUnit_Framework_TestCase
{
	private $_object;
    private $_id;
    private $_login;
    protected function tearDown()
    {
        unset($this->_id);
        unset($this->_login);
        unset($this->_object);
    }

    protected function setUp()
    {
        $this->_id      = "3";
        $this->_login   = "gbecchio";
        $this->_object  = new lib_User($this->_id, $this->_login);
    }
    public function testGetters()
    {
        $this->assertEquals($this->_object->getId(), $this->_id);
        $this->assertEquals($this->_object->getLogin(), $this->_login);
    }
    /*
    public static function setUpBeforeClass()
    {
        fwrite(STDOUT, __METHOD__ . "\n");
    }
    */

    /*
    protected function assertPreConditions()
    {
        fwrite(STDOUT, __METHOD__ . "\n");
    }
 
    public function testOne()
    {
        fwrite(STDOUT, __METHOD__ . "\n");
        $this->assertTrue(TRUE);
    }
 
    public function testTwo()
    {
        fwrite(STDOUT, __METHOD__ . "\n");
        $this->assertTrue(FALSE);
    }
 
    protected function assertPostConditions()
    {
        fwrite(STDOUT, __METHOD__ . "\n");
    }
    */
    
    /*
    public static function tearDownAfterClass()
    {
        fwrite(STDOUT, __METHOD__ . "\n");
    }
 
    protected function onNotSuccessfulTest(Exception $e)
    {
        fwrite(STDOUT, __METHOD__ . "\n");
        throw $e;
    }
    */
}