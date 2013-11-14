<?php
error_reporting(E_ALL);
$titre = "<br><br>%s<br><br>";
$separation = "<br><br>";
$pre = "<pre>%s</pre>";
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
/*
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
}*/
echo "icccci";

printf("$titre", "<em>Conversion Tableaux</em>");
$a = 2;
$b = (array)$a;
$txt = <<<TXT
* entier vers array
** \$a = 2;
** \$b = (array)\$a;
TXT;
echo $separation;
printf("$pre", "$txt");
print_r($b);
$a = array(1, 2, 3);
$b = (bool) $a;
$x = array();
$y = (bool) $x;
echo $separation;
$txt = <<<TXT
* array vers boolean
** \$a = array(1, 2, 3);
** \$b = (bool)\$a; == TRUE

* array vers boolean
** \$x = array();
** \$y = (bool)\$x; == FALSE

TXT;
echo $separation;
printf("$pre", "$txt");
echo '$b=>';
var_dump($b);
echo "<br>";
echo '$y=>';
var_dump($y);

