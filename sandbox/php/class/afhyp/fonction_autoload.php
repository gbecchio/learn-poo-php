<?php
function chargerClasseClass($classe)
{
	require __DIR__."/lib/".$classe.'.class.php';
}
spl_autoload_register('chargerClasseClass');
/*$perso = new Personnage();
echo "<pre>";
print_r($perso->tsFc());
echo "</ pre>";*/
print_r(spl_autoload_functions());
$donnees = array(
	'id' => 16,
	'nom' => "greg",
	'forcePerso' => 5,
	'degats' => 55,
	'niveau' => 4,
	'experience' => 20
);
$perso = new Personnage();
$perso->hydrate($donnees);
$db = new PDO('mysql:host=localhost;dbname=afhyp', 'root', 'greg');
$manager = new PersonnageManager($db);
$manager->add($perso);
echo $perso->id();
