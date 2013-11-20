<?php
error_reporting(E_ALL);
$a    = 'b';
$b    = 10;
${10} = "dix";
$dix  = 'a';
echo '$$a=> '.$$a;
echo "<br />";
echo '$$$a=>'.$$$a;
echo "<br />";
echo '$$$$a=>'.$$$$a;
echo "<br />";
echo '$$$$a=>'.$$$$$a.' == $a=>'.$a;
$z = 1000000.12345678942561234698;
$t = 2000000.987564375435654534;
$res = bcadd($z, $t, 10);
echo "<br /><br />";
var_dump($res);
$her = <<<"HER"
ceci est un 

texte

${res}
HER;
echo "<pre>";
print_r($her);

$now = <<<'NOW'

ceci

est 


un 

texte

${her}
NOW;

print_r($now);

echo "</pre>";

class a
{
  public $a = <<<"HER1"
ceci

est une variable

de classe
HER1;

    const FOP = <<<'NOW1'
Ceci est

une constante

NOW1;
  public function __construct()
  {
    echo "<pre>";
    var_dump($this->a);
    var_dump($this::FOP);
    echo "</pre>";
  }
}
$a = new a();

echo "\x31\x46\x47";