<?php
require_once __DIR__."/../../../../../../sandbox/php/class/afhyp/lib/ClasseClone.class.php";
class ClasseCloneTest extends PHPUnit_Framework_TestCase
{
    private $_object1;
    private $_object2;
    protected function tearDown()
    {
        unset($this->_object1);
        unset($this->_object2);
    }

    protected function setUp()
    {
        $this->_object1 = new ClasseClone();
    }
    public function testGetInstances()
    {
        $this->_object2 = clone $this->_object1;
        $this->assertEquals(ClasseClone::getInstances(), 2);
    }
}