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
			<input type="submit" value="Créer ce personnage" name="ceer" />
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