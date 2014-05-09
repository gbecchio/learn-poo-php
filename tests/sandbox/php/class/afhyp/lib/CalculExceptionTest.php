<?php
require_once __DIR__."/../../../../../../sandbox/php/class/afhyp/lib/CalculException.class.php";
class CalculExceptionTest extends PHPUnit_Framework_TestCase
{
    private $_object1;
    private $_tab_num;
    protected function tearDown()
    {
        unset($this->_object1);
        unset($this->_tab_num);
    }

    protected function setUp()
    {
        $this->_tab_num    = array(
            1,
            10,
            11,
            'non',
            array(4)
        );
        $this->_object1 = new CalculException($this->_table1);
    }
    /**
     * @expectedException        Exception
     * @expectedExceptionMessage Les deux parametres doivent être des nombres
    */
    public function testAdditionner()
    {
        $this->assertSame($this->_object1->additionner($this->_tab_num[1], $this->_tab_num[0]), $this->_tab_num[2]);
        $this->_object1->additionner($this->_tab_num[3], $this->_tab_num[4]);
    }
}