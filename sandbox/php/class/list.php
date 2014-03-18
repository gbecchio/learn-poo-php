<?php
$info = array('coffee', 'brown', 'caffeine');

// Liste toutes les variables
list($drink, $color, $power) = $info;
echo "$drink is $color and $power makes it special.\n";

// Liste certaines variables
list($drink, , $power) = $info;
echo "$drink has $power.\n";

// Ou bien, n'utilisons que le troisième
list( , , $power) = $info;
echo "I need $power!\n";

// list() ne fonctionne pas avec les chaînes de caractères
list($bar) = "abcde";
var_dump($bar); // NULL
/////
$dsn = 'mysql:host=localhost;dbname=test';
$user = 'root';
$pass = 'greg';
$options = array(
	PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
);
$pdo = new PDO(
	$dsn,
	$user,
	$pass,
	$options
	);
$result = $pdo->query("SELECT a, b, c FROM une.CUSTOMER");
echo "<table>";
while(list($salary, $name, $id) = $result->fetch(PDO::FETCH_NUM))
{
    echo " <tr>\n" .
          "  <td><a href=\"info.php?id=$id\">$name</a></td>\n" .
          "  <td>$salary</td>\n" .
          " </tr>\n";
}
echo "</table>";
/////// 
// utilisation d'une sous list
list($a, list($b, $c)) = array(1, array(2, 3));
var_dump($a, $b, $c);
// <?php
$string = "abcde";
list($foo) = "eee";
var_dump($foo);
list($foo) = $string;
var_dump($foo);
// output: string(1) "a"

list($a, $b, $c) = array("a", "b", "c", "d");

var_dump($a); // a
var_dump($b); // b
var_dump($c); // c
//var_dump($d); // d
