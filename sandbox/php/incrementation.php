<?php
error_reporting(E_ALL);
ini_set('error_reporting', E_ALL);
$a = 10;

echo '$a++', $a++, '<br />';
echo '$a', $a, '<br />';
echo "<br /><br />";
echo '++$a', ++$a, '<br />';
echo '$a', $a, '<br />';
echo "<br/>///////////////////<br/><br />";
$b = 10;

echo '$b--', $a--, '<br />';
echo '$b', $b, '<br />';
echo "<br /><br />";
echo '--$b', --$b, '<br />';
echo '$b', $b, '<br />';

echo "<br />", "a est =>";
$a % 2 ? print "est pair" : print "est impaire";

echo "<br/>///////////////////<br/><br />";
$a = "abcd";
$b = ++$a;
echo $b;

echo "<br/>///////////////////<br/><br />";
$z = 'zzzzz';
$var = $z++;
echo $z;

echo "<br/>///////////////////<br/><br />";
$z = 18;
$z = $z++;
echo $z;