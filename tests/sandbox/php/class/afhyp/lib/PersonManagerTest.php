<?php
require_once __DIR__."/../../../../../../sandbox/php/class/afhyp/lib/PersonManager.class.php";
require_once __DIR__."/../../../../../../sandbox/php/class/afhyp/lib/Person.class.php";
class PersonManagerTest extends PHPUnit_Framework_TestCase
{
	private $_object;
    private $_db;
    private $_perso1;
    private $_perso2;
    private $_perso3;
    private $_donnees1;
    private $_donnees2;
    private $_donnees3;
    private $_tableName;
    private $_table1;
    private $_table2;
    private $_table3;
    private $_updateVal;
    protected function tearDown()
    {
        $this->_object->delete($this->_perso1);
        $this->_object->delete($this->_perso2);
        $this->_object->delete($this->_perso3);
        $delete = $this->_db->exec('DROP TABLE '.$this->_tableName);
        unset($this->_object);
        unset($this->_db);
        unset($this->_perso1);
        unset($this->_donnees1);
        unset($this->_perso2);
        unset($this->_donnees2);
        unset($this->_perso3);
        unset($this->_donnees3);
        unset($this->_tableName);
        unset($this->_table1);
        unset($this->_table2);
        unset($this->_table3);
        unset($this->_updateVal);
    }

    protected function setUp()
    {
        $this->_tableName = "personTest";
        $this->_table1 = array("frank", "mark");
        $this->_table2 = array("greg", "mark");
        $this->_table3 = array("greg", "frank");
        $this->_donnees1 = array(
            'nom' => "greg",
            'degats' => 0
        );
        $this->_donnees2 = array(
            'nom' => "franck",
            'degats' => 0
        );
        $this->_donnees3 = array(
            'nom' => "mark",
            'degats' => 0
        );
        $this->_updateVal = array(
            'nom' => 'greg',
            'degats' => '25',
            'id' => '1'
        );
        $this->_perso1 = new Person($this->_donnees1);
        $this->_perso2 = new Person($this->_donnees2);
        $this->_perso3 = new Person($this->_donnees3);
        $this->_db = new PDO('mysql:host=localhost;dbname=afhyp', 'root', 'greg');
        $req = $this->_db->exec("CREATE TABLE IF NOT EXISTS personTest (
                id int(11) unsigned NOT NULL AUTO_INCREMENT,
                nom varchar(255) NOT NULL,
                degats tinyint(3) unsigned NOT NULL DEFAULT '0',
                PRIMARY KEY (id),
                UNIQUE KEY nom (nom)
            )engine=innodb;"
        );
        if ($req === false)
        {
            echo 'ERREUR : ', print_r($this->_db->errorInfo());
        }
        $this->_object = new PersonManager($this->_db,  $this->_tableName);
    }
    public function testMethodAddAndMethodCount()
    {
        $this->_object->add($this->_perso1);
        $this->_object->add($this->_perso2);
        $this->_object->add($this->_perso3);
        $this->assertEquals($this->_object->count(), 3);
    }
    public function testDelete()
    {
        $this->_object->add($this->_perso1);
        $this->_object->add($this->_perso2);
        $this->_object->add($this->_perso3);
        $this->_object->delete($this->_perso1);
        $this->assertEquals($this->_object->count(), 2);
        $this->_object->delete($this->_perso2);
        $this->assertEquals($this->_object->count(), 1);
        $this->_object->delete($this->_perso3);
        $this->assertEquals($this->_object->count(), 0);
    }
    public function testExists()
    {
        $this->_object->add($this->_perso1);
        $this->_object->add($this->_perso2);
        $this->assertTrue($this->_object->exists("greg"));
        $this->assertTrue($this->_object->exists($this->_perso2->id()));
    }
    public function testGet()
    {
        $this->_object->add($this->_perso1);
        $this->assertEquals($this->_object->get(1)->id(), $this->_perso1->id());
        $this->assertEquals($this->_object->get(1)->nom(), $this->_perso1->nom());
        $this->assertEquals($this->_object->get(1)->degats(), $this->_perso1->degats());
        $this->assertEquals($this->_object->get("greg")->id(), $this->_perso1->id());
        $this->assertEquals($this->_object->get("greg")->nom(), $this->_perso1->nom());
        $this->assertEquals($this->_object->get("greg")->degats(), $this->_perso1->degats());
    }
    public function testGetList()
    {
        $this->_object->add($this->_perso1);
        $this->_object->add($this->_perso2);
        $this->_object->add($this->_perso3);
        $pers1 = $this->_object->getList($this->_perso1->nom())[0];
        $pers2 = $this->_object->getList($this->_perso2->nom())[0];
        $pers3 = $this->_object->getList($this->_perso3->nom())[0];
        $this->assertSame($pers1->id(), $this->_perso2->id());
        $this->assertSame($pers2->id(), $this->_perso1->id());
        $this->assertSame($pers3->id(), $this->_perso2->id());
    }
    public function testUpdate()
    {
        $this->_object->add($this->_perso1);
        $ancien_id = $this->_perso1->id();
        $ancien_degats = $this->_perso1->degats();
        $this->assertEquals($this->_object->get("greg")->degats(), $this->_perso1->degats());
        $greg = new Person($this->_updateVal);
        $this->_object->update($greg);
        $this->_perso1 = $this->_object->get($ancien_id);
        $this->assertEquals((int)$this->_object->get("greg")->id(), (int)$greg->id());
        $this->assertEquals((int)$this->_object->get("greg")->degats(), (int)$greg->degats());
        $this->assertNotEquals((int)$this->_object->get("greg")->degats(), (int)$ancien_degats);
    }
    public function testSetDb()
    {
        $db = new PDO('mysql:host=localhost;dbname=afhyp', 'root', 'greg');
        $object = new PersonManager($db,  $this->_tableName);
        $this->assertTrue($object->setDb($db));
    }
}