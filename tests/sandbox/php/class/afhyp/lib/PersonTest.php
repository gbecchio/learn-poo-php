<?php
require_once __DIR__."/../../../../../../sandbox/php/class/afhyp/lib/Person.class.php";
class PersonTest extends PHPUnit_Framework_TestCase
{
	private $_object;
    private $_perso1;
    private $_perso2;
    private $_donnees1;
    private $_donnees2;
    protected function tearDown()
    {
        unset($this->_object);
        unset($this->_perso1);
        unset($this->_donnees1);
        unset($this->_perso2);
        unset($this->_donnees2);
    }

    protected function setUp()
    {
        $this->_donnees1 = array(
            'id' => 16,
            'nom' => "greg",
            'degats' => 0
        );
        $this->_donnees2 = array(
            'id' => 1,
            'nom' => "franck",
            'degats' => 0
        );
        $this->_perso1 = new Person($this->_donnees1);
        $this->_perso2 = new Person($this->_donnees2);
    }
    public function testFrapper()
    {
        $pers_frappe = $this->_perso1->frapper($this->_perso2);
        $this->assertEquals($pers_frappe, Person::PERSON_FRAPPE);

        $pers_moi = $this->_perso1->frapper($this->_perso1);
        $this->assertEquals($pers_moi, Person::CEST_MOI);
    }
    public function testHydrate()
    {
        $this->_perso1->hydrate($this->_donnees2);
        $this->assertSame($this->_perso1->id(), $this->_perso2->id());
        $this->assertSame($this->_perso1->id(), $this->_donnees2['id']);
    }
    public function testRecevoirDegats()
    {
        $pers_frappe = $this->_perso1->frapper($this->_perso2);
        $this->assertSame($this->_perso2->degats(), 5);
        for($i = 0; $i < 20 ;$i++)
        {
            $pers2_frappe = $this->_perso2->frapper($this->_perso1);    
        }
        $this->assertSame($pers2_frappe, Person::PERSON_TUE);
        $this->assertSame($this->_perso1->degats(), 100);
    }
    public function testDegats()
    {
        $this->assertEquals($this->_perso2->degats(), 0);
        $this->assertEquals($this->_perso1->degats(), $this->_donnees1['degats']);
    }
    public function testId()
    {
        $this->assertNotEquals($this->_perso2->id(), 0);
        $this->assertEquals($this->_perso2->id(), $this->_donnees2['id']);
        $this->assertEquals($this->_perso1->id(), $this->_donnees1['id']);   
    }
    public function testNom()
    {
        $this->assertEquals($this->_perso2->nom(), $this->_donnees2['nom']);
        $this->assertEquals($this->_perso1->nom(), $this->_donnees1['nom']);   
    }
    public function testSetDegats()
    {
        $this->_perso2->setDegats(100);
        $this->assertEquals($this->_perso2->degats(), 100);
    }
    public function testSetId()
    {
        $this->_perso2->setId(100);
        $this->assertEquals($this->_perso2->id(), 100);   
    }
    public function testSetNom()
    {
        $this->_perso2->setNom("Frank");
        $this->assertEquals($this->_perso2->nom(), "Frank");      
    }
}