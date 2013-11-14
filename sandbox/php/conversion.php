<?php
error_reporting(E_ALL);
$a = 10;
var_dump($a);
echo gettype($a);
$b = settype($a, "string");
var_dump($b);
echo gettype($b);
echo gettype($a);

if($b = ($a >= 10))
{
  echo "<br />";
  var_dump($a);
  var_dump($a+10);
  var_dump($b);
  var_dump($b + $a);
  var_dump("10" + "123");
}

if($a < array())
{
  echo "tableau toujours suppérieur";
}

class A
{
  public function __tostring()
  {
    echo "iiic";
  }
}
if($a < new A())
{
  echo "<br /> la classe est toujours suppérieures aux types de base";
}

if(array() < new A())
{
  echo "<br /> la classe est toujours suppérieure au tableau";
}
echo "icccci";
