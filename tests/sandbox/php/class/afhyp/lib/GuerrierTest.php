<?php
require_once __DIR__."/../../../../../../sandbox/php/class/afhyp/lib/Person.class.php";
require_once __DIR__."/../../../../../../sandbox/php/class/afhyp/lib/Guerrier.class.php";
class GuerrierTest extends PHPUnit_Framework_TestCase
{
	private $_object1;
    private $_donnees1;
    protected function tearDown()
    {
        unset($this->_donnees1);
        unset($this->_object1);
    }

    protected function setUp()
    {
        $this->_donnees1 = array(
            'nom' => "greg",
            'degats' => 0,
            'atout' => 25,
            'timeEndormi' => 0,
            'type' => "guerrier",
            'id' => 1
        );
        $this->_object1 = new Guerrier($this->_donnees1);
    }
    public function testRecevoirDegats()
    {
        $this->_object1->setDegats(25);
        $this->assertEquals($this->_object1->recevoirDegats(1), Guerrier::PERSON_FRAPPE);
        $this->assertEquals($this->_object1->degats(), 22);
        $this->_object1->setDegats(125);
        $this->assertEquals($this->_object1->recevoirDegats(125), Guerrier::PERSON_TUE);
    }
}