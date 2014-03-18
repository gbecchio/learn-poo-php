<?php
class PersonnageManager
{
	private $_db;
	public function __construct($db)
	{
		$this->setDb($db);
	}
	public function add(Personnage $perso)
	{
		$sql = <<<EOT
INSERT INTO 
	personnage
SET
	nom 		= :nom,
	forcePerso	= :forcePerso,
	degats 		= :degats,
	niveau 		= :niveau,
	experience 	= :experience
;

EOT;
		

		try
		{
			$q = $this->_db->prepare($sql);
			$q->bindValue(':nom', $perso->nom());
			$q->bindValue(':forcePerso', $perso->forcePerso(), PDO::PARAM_INT);
			$q->bindValue(':degats', $perso->degats(), PDO::PARAM_INT);
			$q->bindValue(':niveau', $perso->niveau(), PDO::PARAM_INT);
			$q->bindValue(':experience', $perso->experience(), PDO::PARAM_INT);
			$q->execute();
			$perso->setId($this->_db->lastInsertId());
		}
		catch(PDOException $e)
		{
	    	echo 'Connection failed: ' . $e->getMessage();
		}
	}
	public function delete(Personnage $perso)
	{
		$sql = <<<EOT
DELETE FROM
	personnage
WHERE
	id = '{$perso->id()}'
;

EOT;

		$this->_db->exec($sql);
	}
	public function get($id)
	{
		$id = (int) $id;
		$sql = <<<EOT
SELECT
	id,
	nom,
	forcePerso,
	degats,
	niveau,
	experience
FROM
	personnage
WHERE
	id = '{$id}'
;

EOT;

		try
		{
			$q = $this->_db->query($sql);
			$donnees = $q->fetch(PDO::FETCH_ASSOC);
			return new Personnage($donnees);
		}
		catch(PDOException $e)
		{
	    	echo 'Connection failed: ' . $e->getMessage();
		}
	}
	public function getList()
	{
		$perso = array();
		$sql = <<<EOT
SELECT
	id,
	nom,
	forcePerso,
	degats,
	niveau,
	experience
FROM
	personnage
ORDER BY 
	nom
;

EOT;

		$q = $this->_db->query($sql);
		while($donnees = $q->fetch(PDO::FETCH_ASSOC))
		{
			$persos[] = new Personnage($donnees);
		}
		return $persos;
	}
	public function update(Personnage $perso)
	{
		$sql = <<<EOT
UPDATE 
	personnage 
SET
	forcePerso = :forcePerso,
	degats = :degats,
	niveau = :niveau,
	experience = :experience
WHERE
	id = :id
;

EOT;

		$q = $this->_db->prepare($sql);
		$q->bindValue(':forcePerso', $perso->forcePerso(), PDO::PARAM_INT);
		$q->bindValue(':degats', $perso->degats(), PDO::PARAM_INT);
		$q->bindValue(':niveau', $perso->niveau(), PDO::PARAM_INT);
		$q->bindValue(':experience', $perso->experience(), PDO::PARAM_INT);
		$q->bindValue(':id', $perso->id(), PDO::PARAM_INT);
		$q->execute();
	}
	public function setDb(PDO $db)
	{
		$this->_db = $db;
	}
}