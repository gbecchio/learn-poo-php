<?php
require_once __DIR__."/../../../../../../sandbox/php/class/afhyp/lib/IteratorArray.class.php";
class IteratotArrayTest extends PHPUnit_Framework_TestCase
{
    private $_object1;
    private $_table1;
    protected function tearDown()
    {
        unset($this->_object1);
        unset($this->_table1);
    }

    protected function setUp()
    {
        $this->_table1 = array(
            '1er attr public',
            '2eme attr public',
            '1er attr protected',
            '2eme attr protected',
            '1er attr private',
            '2eme attr private'
        );
        $this->_object1 = new IteratorArray($this->_table1);
    }
    public function testCurrent()
    {
        $this->assertEquals($this->_object1->current(), $this->_table1[0]);
        $this->_object1->next();
        $this->_object1->next();
        $this->_object1->next();
        $this->_object1->next();
        $this->_object1->next();
        $this->assertNotTrue($this->_object1->current());
    }
    public function testKey()
    {
		$this->_object1->next();
    	$this->assertEquals($this->_object1->key(), 1);
        $this->_object1->next();
        $this->_object1->next();
        $this->_object1->next();
        $this->_object1->next();
        $this->assertEquals($this->_object1->key(), 5);
    }
    public function testNext()
    {
        $this->_object1->next();
        $this->assertEquals($this->_object1->key(), 1);
    }
    public function testRewind()
    {
        $this->_object1->next();
        $this->_object1->next();
        $this->_object1->next();
        $this->_object1->next();
        $this->_object1->next();
        $this->_object1->rewind();
        $this->assertEquals($this->_object1->key(), 0);
    }
    public function testValid()
    {
        $this->_object1->next();
        $this->assertTrue($this->_object1->valid());
        $this->_object1->next();
        $this->_object1->next();
        $this->_object1->next();
        $this->_object1->next();
        $this->_object1->next();
        $this->assertNotTrue($this->_object1->valid());
    }
}