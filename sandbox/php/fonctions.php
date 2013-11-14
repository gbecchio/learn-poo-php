<?php
error_reporting(E_ALL);
ini_set('error_reporting', E_ALL);

$a = function ($a, $b){ return $a * $b; };
echo $a(2, 12);
?>
<br />
<br />
//////////////////////////////////
<br />
<br />
<?php
$vre = 123;
$b = function ($a, $b) use ($vre)
{
	return $vre.$a.$b;
};
echo $b(4, 5);
?>
<br />
<br />
//////////////////////////////////
<br />
<br />
<?php
$txt = "txt";
$c = function ($a) use(&$txt)
{
	$txt = $a.'.'.$txt;
};
$c("document");
echo $txt;
echo '<pre>';
var_dump($c);
echo '</ pre>';
echo get_class($c);
if(get_class($c) == "Closure")
{
	echo "c'est une closure";
}
?>
<br />
<br />
//////////////////////////////////
<?php
function sum()
{
	$sum = 1;
	for($i=0; $i<func_num_args(); $i++)
	{
		$sum = $sum * func_get_arg($i);
	}
	return $sum;
}
$res = sum(1,2,3,4,5,6,7,8,9,10,11);
var_dump($res);
?>
<br />
<br />
//////////////////////////////////
<?php
var_dump("1top" == 0);
?>
<br />
<br />
//////////////////////////////////
<br />
<br />
<?php
$a = "1f";
$b = "sf";
$t = implode("", array($a,$b));
echo $t;
echo "{$a}{$b}";
?>