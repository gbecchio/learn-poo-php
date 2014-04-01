<?php
require_once __DIR__."/../../../../../../sandbox/php/class/afhyp/lib/ClasseForEach.class.php";
require_once __DIR__."/../../../../../../sandbox/php/class/afhyp/lib/ClasseForEachEnfant.class.php";
class ClasseForEachEnfantTest extends PHPUnit_Framework_TestCase
{
    private $_object1;
    private $_object2;
    private $_table1;
    private $_table2;
    protected function tearDown()
    {
        unset($this->_object1);
        unset($this->_object2);
        unset($this->_table1);
        unset($this->_table2);
    }

    protected function setUp()
    {
        $this->_table1 = array(
            "attr1" => '1er attr public',
            "attr2" => '2eme attr public',
            "attrProtected1" => '1er attr protected',
            "attrProtected2" => '2eme attr protected',
            "_attrPrivate1" => '1er attr private',
            "_attrPrivate2" => '2eme attr private'
        );
        $this->_table2 = array(
            "attr1" => '1er attr public',
            "attr2" => '2eme attr public',
            "attrProtected1" => '1er attr protected',
            "attrProtected2" => '2eme attr protected'
        );
        $this->_object1 = new ClasseForEach();
        $this->_object2 = new ClasseForEachEnfant();
    }
    public function testListeAttributs()
    {
        $this->assertEquals($this->_object1->listeAttributs(), $this->_table1);
        $this->assertEquals($this->_object2->listeAttributs(), $this->_table2);
    }
}