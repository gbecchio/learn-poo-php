<?php
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
try
{
	$pdo->beginTransaction();
	$sql = "INSERT INTO une.CUSTOMER (a,b) VALUES (:titre, :prenom)";
	$stmt = $pdo->prepare($sql);
	$titre = "El ' desdichado";
	$prenom = "Lui ' '";
	$stmt->execute(array(':titre'=>$titre, ':prenom'=>$prenom));
	$idInsere = $pdo->lastInsertId();

	$sql = "INSERT INTO une.CUSTOMER VALUES('El desdichado',  'romanichel',($idInsere + 1))";
	$pdo->exec($sql);
	$pdo->commit();
}
catch(PDOException $e)
{
	$pdo->rollback();
	echo $e->getMessage()."<br />";
}