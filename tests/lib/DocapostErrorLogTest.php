<?php
require_once __DIR__."/../../lib/utils.php";
class UserTest extends PHPUnit_Framework_TestCase
{
	private $_object;
    private $_username;
    private $_message;
    protected function tearDown()
    {
        unset($this->_username);
        unset($this->_message);
        unset($this->_object);
    }

    protected function setUp()
    {
        $this->_username    = "gbecchio";
        $this->_message     = "Ceci est une erreur";
        $this->_object      = new lib_DocapostErrorLog();
    }
    public function testGetters()
    {
        $this->assertTrue($this->_object->user($this->_message, $this->_username));
        $this->assertTrue($this->_object->general($this->_message));
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