<?php
$a = 'b';
$b = 'c';
$c = '124';
echo "<em>les variables</em><br />";
$text = <<<TXT
* D'abord un dollard $
* Ensuite ([a-z][A-Z]) or [_]
* sensibles à la casse

TXT;

$text .= <<<'TXT'
Variables de variables:

$a = 'b';
$b = 'c';
$c = '124';

TXT;
echo "<pre>";
print_r($text);
echo "</pre>";

echo '$$$a => '.$$$a;

$texte = <<<TXT
* Les valeurs de variables sont assignées par copie
TXT;

echo "<br><br><em>Variables avec accolades</em><br><br>";
${1234} = "un, deux, trois et quatre";
function vare()
{
	return 1234;
}

${'&é"'} = "curieux";

$t = <<<"TXT"
la variable & est possible grâce aux accolades
${'&é"'} non ?

Dollar vare = {${vare()}}

TXT;

echo "<pre>";
echo $t;
echo "</pre>";

echo "<br><br><em>Constantes</em><br><br>";
const A = 4;
constant('B', 5);
$ts = <<<TXT
const A = 4;
define('B', 1);

A = {A} 
B = constant('B')

* sensible à la casse par défaut
* ne peut contenir que des scalaires
* ne peux être changée
TXT;

echo "<pre>";
echo $ts;
echo "</pre>";

echo __DIR__.__FILE__.__LINE__.__NAMESPACE__.__METHOD__.__FUNCTION__.__CLASS__;