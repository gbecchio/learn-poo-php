<?php
$s = new splMinHeap();
$s->insert(1);
$s->insert(2);
$s->insert(3);
$s->insert(0);
var_dump($s);
foreach($s as $val)
{
	echo "\n".$val;
}
var_dump($s);
$s = new splMaxHeap();
$s->insert(1);
$s->insert(2);
$s->insert(3);
$s->insert(0);
var_dump($s);
foreach($s as $val)
{
	echo "\n".$val;
}
var_dump($s);