<?php
$s = new splStack();
$s[] = "foo";
$s[] = "bar";
try
{
	//$s["a"] = "rien";
}
catch(Exception $e)
{
	var_dump($e);
}
$s->push("baz");
$s->unshift("first");
echo "de la noche";
foreach($s as $val)
{
	echo "\n".$val;
}
var_dump($s);