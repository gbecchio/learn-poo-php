<?php
require_once __DIR__."/../../../../../../sandbox/php/class/afhyp/lib/Person.class.php";
require_once __DIR__."/../../../../../../sandbox/php/class/afhyp/lib/Magicien.class.php";
require_once __DIR__."/../../../../../../sandbox/php/class/afhyp/lib/Guerrier.class.php";
class MagicienTest extends PHPUnit_Framework_TestCase
{
	private $_object1;
    private $_object2;
    private $_donnees1;
    private $_donnees2;
    protected function tearDown()
    {
        unset($this->_donnees1);
        unset($this->_donnees2);
        unset($this->_object1);
        unset($this->_object2);
    }

    protected function setUp()
    {
        $this->_donnees1 = array(
            'nom' => "greg",
            'degats' => 0,
            'atout' => 25,
            'timeEndormi' => 0,
            'type' => "magicien",
            'id' => 1
        );
        $this->_donnees2 = array(
            'nom' => "maurice",
            'degats' => 0,
            'atout' => 25,
            'timeEndormi' => 0,
            'type' => "guerrier",
            'id' => 2
        );
        $this->_object1 = new Magicien($this->_donnees1);
        $this->_object2 = new Guerrier($this->_donnees2);
    }
    public function testLancerUnSort()
    {
        $this->_object1->lancerUnSort($this->_object2);
        $this->assertEquals($this->_object2->degats(), 0);
        $this->assertLessThan((time() + ($this->_object2->atout() * 6 * 3600)), $this->_object2->timeEndormi());
    }
}