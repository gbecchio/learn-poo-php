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
	switch($_POST['type'])
	{
		case 'magicien':
			$perso = new Magicien(array('nom' => $_POST['nom']));
			break;
		case 'guerrier':
			$perso = new Guerrier(array('nom' => $_POST['nom']));
			break;
		default:
			$message = 'Le type du personnage est invalide.';
			break;
	}
	if(isset($perso))
	{
		if(!$perso->nomValide())
		{
			$message = 'Le nom choisi est invalide';
			unset($perso);
		}
		else if($manager->exists($perso->nom()))
		{
			$message = 'Le nom du personnage est déjà pris.';
			unset($perso);
		}
		else
		{
			$manager->add($perso);
		}
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
				case Person::PERSON_TUE:
					$message = 'Vous avez tué ce personnage!';
					$manager->update($perso);
					$manager->delete($persoAFrapper);
					break;
				case Person::PERSO_ENDORMI:
					$message = 'Vous êtes endormi, vous ne pouvez pas frapper de personnages !';
					break;
			}
		}
	}
}
else if(isset($_GET['ensorceler']))
{
	if(!isset($perso))
	{
		$message = 'Merci de créer un personnage ou de vous identifier.';
	}
	else
	{
		if($perso->type() != 'magicien')
		{
			$message = 'Seuls les magiciens peuvent ensorceler des personnages !';
		}
		else
		{
			if(!$manager->exists((int) $_GET['ensorceler']))
			{
				$message = 'Le personnage que vous voulez frapper n\'existe pas';
			}
			else
			{
				$persoAEnsorceler = $manager->get((int) $_GET['ensorceler']);
				$retour = $perso->lancerUnSort($persoAEnsorceler);
				switch($retour)
				{
					case Person::CEST_MOI:
						$message = 'Mais... pourquoi voulez-vous vous  ensorceler?';
						break;
					case Person::PERSON_ENSORCELE:
						$message = 'Le personnage a bien été ensorcelé !';
						$manager->update($perso);
						$manager->update($persoAEnsorceler);
						break;
					case Person::PAS_DE_MAGIE:
						$message = 'Vous n\'avez pas de magie !';
						break;
					case Person::PERSO_ENDORMI:
						$message = 'Vous êtes endormi, vous ne pouvez pas lancer de sort !';
						break;
				}
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
			Type : <?php echo ucfirst($perso->type()); ?>
			<br />
			Nom: <?php echo htmlspecialchars($perso->nom()); ?>
			<br />
			Dégâts: <?php echo $perso->degats(); ?>
			<br />
<?php
switch($perso->type())
{
	case 'magicien' :
		echo 'Magie : ';
		break;
	case 'guerrier' :
		echo 'Protection : ';
		break;
}
echo $perso->atout();
?>
		</p>
	</fieldset>
	<fieldset>
		<legend>Qui attaquer ?</legend>
		<p>
<?php
	$retourPersos = $manager->getList($perso->nom());
	if(empty($retourPersos))
	{
		echo 'Personne à frapper !';
	}
	else
	{
		if($perso->estEndormi())
		{
			echo 'Un magicien vous a endormi ! Vous allez vous réveiller dans ', $perso->reveil(), '.';
		}
		else
		{
			foreach($retourPersos as $unPerso)
			{
				echo '<a href="?frapper=', $unPerso->id(), '">', htmlspecialchars($unPerso->nom()), '</a>(dégâts : ', $unPerso->degats(), $unPerso->type(), ') ';
			}
			if($perso->type() == 'magicien')
			{
				echo ' | <a href="?ensorceler=', $unPerso->id(), '"> Lancer un sort</a>';
			}
			echo "<br />";
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
			<input type="submit" value="Utiliser ce personnage" name="utiliser" />
			<br />
			Type:
			<select name="type">
				<option value="magicien">Magicien</option>
				<option value="guerrier">Guerrier</option>
			</select>
			<input type="submit" value="Créer ce personnage" name="creer" />
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
$array = array(
	'0.0',
	'rien',
	'coute 0.2',
	'tout',
	'125.232',
	456.890
);
$fl_array = preg_grep("/^(\d+)?\.\d+$/", $array, 2);
var_dump($fl_array);
var_dump(PREG_GREP_INVERT);
preg_match('/([a]?:\D+|<\d+>)*[!?]/', 'foobar foobar foobar');

if (preg_last_error() == PREG_BACKTRACK_LIMIT_ERROR) {
    print 'Backtrack limit was exhausted!';
}
$subject = "deff";
$pattern = '/^def/';
echo "<pre>";
preg_match($pattern, $subject, $matches);//, PREG_OFFSET_CAPTURE);
print_r($matches);
preg_match($pattern, $subject, $matches, PREG_OFFSET_CAPTURE);
print_r($matches);