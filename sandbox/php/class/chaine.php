<?php
class val
{
	public $a = 10;
	public function getVal()
	{
		return $this->a;
	}
}
$val = new val();
echo $val->getVal()."d";
$a = "vlaeur $val->getVal()";
echo $a;