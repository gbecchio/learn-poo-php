<?php
global $a;
class Gateau
{
	private $_name;
	private $_type;
	function __construct($name, $type="tarte")
	{
		global $a;
		$a = 3;
		$this->_name = $name;
		$this->_type = $type;
	}
	public function affiche()
	{
		unset($this);
		echo "Gateau: ".$this->_name."(".$this->_type.")\r\na\n";
	}
	public function __destruct()
	{
		global $a;
		echo "destruction";
		//unset($a);
		$a++;
		var_dump($a);
	}
}
$tap = new Gateau('Tarte aux pommes', 'Tarte');
$tap->y = '10';
print_r($tap);
$tap->affiche();
var_dump($tap->y);
var_dump($tst = (array)$tap);
var_dump($tst2 = (object)$tst);
$current = "Jean Dupond\n";
$file = 'people.txt';
// Écrit le résultat dans le fichier
file_put_contents($file, $current);
$current = "Jean Dupond\n";
file_put_contents($file, $current, FILE_APPEND);
var_dump(file_get_contents($file));