<?php
error_reporting(E_ALL);
ini_set('error_reporting', E_ALL);
$x = "foi";
echo $x['2null'];

$x = array(1, 2);
$y = array(9, 8, 4);
var_dump($x + $y);
echo "<br />";
var_dump($y + $x);
debug_zval_dump($x);
$a = array();
echo "<br />";
echo "<br />";
if(!isset($a))
{
  var_dump($a);
}
/*else if($a == null)
{
 echo "tableau Sa == NULL"; 
}*/
else if(empty($a))
{
  echo "tableau Sa == ???";
}
$a = "g;
