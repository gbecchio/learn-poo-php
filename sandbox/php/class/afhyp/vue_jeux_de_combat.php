<?php
function chargerClasse($classname)
{
	require __DIR__."/lib/".$classname.'.class.php';
}
spl_autoload_register('chargerClasse');
session_start();
if(isset($_GET['deconnexion']))
{
	session_destroy();
	header('Location: .');
	exit();
}
$db = new PDO('mysql:host=localhost;dbname=afhyp', 'root', 'greg');
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
$manager = new PersonManager($db);
if(isset($_SESSION['perso']))
{
	$perso = $_SESSION['perso'];
}
if(isset($_POST['creer']) && isset($_POST['nom']))
{
	$perso = new Person(array('nom' => $_POST['nom']));
	if($manager->exists($perso->nom()))
	{
		$message = 'Le nom choisi existe déjà.';
		unset($perso);
	}
	else
	{
		$manager->add($perso);
	}
}
else if(isset($_POST['utiliser']) && isset($_POST['nom']))
{
	if($manager->exists($_POST['nom']))
	{
		$perso = $manager->get($_POST['nom']);
	}
	else
	{
		$message = 'Ce personnage n\'existe pas!';
	}
}
else if(isset($_GET['frapper']))
{
	if(!isset($perso))
	{
		$message = 'Merci de créer un personnage ou de vous identifier';
	}
	else
	{
		if(!$manager->exists((int) $_GET['frapper']))
		{
			$message = 'Le personnage que vous voulez frapper n existe pas!';
		}
		else
		{
			$persoAFrapper = $manager->get((int) $_GET['frapper']);
			$retour = $perso->frapper($persoAFrapper);
			switch($retour)
			{
				case Person::CEST_MOI:
					$message = 'Mais ... pourquoi voulez-vous vous frapper???';
					break;
				case Person::PERSON_FRAPPE:
					$message = 'Le personnage a bien été frappé';
					$manager->update($perso);
					$manager->update($persoAFrapper);
					break;
				case Person::PErSON_TUE:
					$message = 'Vous avez tué ce personnage!';
					$manager->update($perso);
					$manager->delete($persoAFrapper);
					break;
			}
		}
	}
}




?>
<!DOCTYPE HTML>
<html>
<head>
	<title>TP : Mini jeu de combat</title>
	<meta charset="UTF-8">
</head>
<body>
	<p>Nombre de personnages créés : <?php  echo $manager->count(); ?></p>
<?php
if(isset($message))
{
	echo '<p>', $message, '</p>';
}
if(isset($perso))
{
?>
	<p><a href="?deconnexion=1">Déconnexion</a></p>
	<fieldset>
		<legend>Mes informations</legend>
		<p>
			Nom: <?php echo htmlspecialchars($perso->nom()); ?>
			<br />
			Dégâts: <?php echo $perso->degats(); ?> 
		</p>
	</fieldset>
	<fieldset>
		<legend>Qui frapper ?</legend>
		<p>
<?php
	$persos = $manager->getList($perso->nom());
	if(empty($persos))
	{
		echo 'Personne à frapper !';
	}
	else
	{
		foreach($persos as $unPerso)
		{
			echo '<a href="?frapper=', $unPerso->id(), '">', htmlspecialchars($unPerso->nom()), '</a>(dégâts : ', $unPerso->degats(), ')<br />';
		}
	}
?>
		</p>
	</fieldset>
<?php
}
else
{
?>
	<form action="#" method="post">
		<p>
			NOM: <input type="text" name="nom" maxlength="50" />
			<input type="submit" value="Créer ce personnage" name="creer" />
			<input type="submit" value="Utiliser ce personnage" name="utiliser" />
		</p>
	</form>
<?php
}
?>
</body>
</html>
<?php
if(isset($perso))
{
	$_SESSION['perso'] = $perso;
} 