<?php
require_once __DIR__."/../../../../../../sandbox/php/class/afhyp/lib/PersonnageManager.class.php";
require_once __DIR__."/../../../../../../sandbox/php/class/afhyp/lib/Personnage.class.php";
class PersonnageManagerTest extends PHPUnit_Framework_TestCase
{
	private $_object;
    private $_db;
    private $_perso;
    private $_donnees;
    protected function tearDown()
    {
        unset($this->_object);
        unset($this->_db);
        unset($this->_perso);
        unset($this->_donnees);
    }

    protected function setUp()
    {
        $this->_donnees = array(
            'id' => 16,
            'nom' => "greg",
            'forcePerso' => 5,
            'degats' => 55,
            'niveau' => 4,
            'experience' => 20
        );
        $this->_perso = new Personnage($this->_donnees);
        $this->_db = new PDO('mysql:host=localhost;dbname=afhyp', 'root', 'greg');
        $this->_object = new PersonnageManager($this->_db);
    }
    public function testAdd()
    {
        $this->_object->add($this->_perso);
        $this->assertEquals($this->_object->get($this->_perso->id())->id(), $this->_perso->id());
    }
}