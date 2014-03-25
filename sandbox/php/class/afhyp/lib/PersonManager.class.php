<?php
class PersonManager
{
	private $_db;
	private $_table_personne = 'personTest';
	public function __construct($db, $tableName = "person")
	{
		$this->setDb($db);
		$this->_table_personne = $tableName;
	}
	public function add(Person $perso)
	{
		$sql = <<<EOT
INSERT INTO 
	{$this->_table_personne}
SET
	nom 		= :nom,
	type 		= :type
;

EOT;

		try
		{
			$q = $this->_db->prepare($sql);
			$q->bindValue(':nom', $perso->nom());
			$q->bindValue(':type', $perso->type());
			$q->execute();
			$perso->hydrate(array('id' => $this->_db->lastInsertId(), 'degats' => 0, 'atout' => 0));
		}
		catch(PDOException $e)
		{
	    	echo 'Connection failed: ' . $e->getMessage();
		}
	}
	public function count()
	{
		return $this->_db->query("SELECT COUNT(*) FROM {$this->_table_personne}")->fetchColumn();
	}
	public function delete(Person $perso)
	{
		$sql = <<<EOT
DELETE FROM
	{$this->_table_personne}
WHERE
	id = '{$perso->id()}'
;

EOT;

		$this->_db->exec($sql);
	}
	public function exists($info)
	{
		if(is_int($info))
		{
			return (bool) $this->_db->query("SELECT COUNT(*) FROM {$this->_table_personne} WHERE id = ".$info)->fetchColumn();
		}
		$q = $this->_db->prepare("SELECT COUNT(*) FROM {$this->_table_personne} WHERE nom = :nom");
		$q->execute(array(':nom' => $info));
		return (bool) $q->fetchColumn();
	}
	public function get($info)
	{
		if(is_int($info))
		{
			$sql = <<<EOT
SELECT
	id,
	nom,
	degats,
	timeEndormi,
	type,
	atout
FROM
	{$this->_table_personne}
WHERE
	id = '{$info}'
;

EOT;

			try
			{
				$q = $this->_db->query($sql);
				$perso = $q->fetch(PDO::FETCH_ASSOC);
			}
			catch(PDOException $e)
			{
	    		echo 'Connection failed: ' . $e->getMessage();
			}
		}
		else
		{
			$sql = <<<EOT
SELECT
	id,
	nom,
	degats,
	timeEndormi,
	type,
	atout
FROM
	{$this->_table_personne}
WHERE
	nom = :nom
;

EOT;

			try
			{
				$q = $this->_db->prepare($sql);
				$z = $q->execute(array(":nom" => $info));
				$perso = $q->fetch(PDO::FETCH_ASSOC);
			}
			catch(PDOException $e)
			{
	    		echo 'Connection failed: ' . $e->getMessage();
			}
		}
		switch ($perso['type'])
		{
			case 'guerrier' : return new Guerrier($perso);
				break;
			case 'magicien' : return new Magicien($perso);
				break;
			default:
				return null;
		}
	}
	public function getList($nom)
	{
		$persos = array();
		$sql = <<<EOT
SELECT
	id,
	nom,
	degats,
	timeEndormi,
	type,
	atout
FROM
	{$this->_table_personne}
WHERE
	nom <> :nom
ORDER BY nom
;

EOT;

		try
		{
			$q = $this->_db->prepare($sql);
			$q->execute(array(':nom' => $nom));
			while($donnees = $q->fetch(PDO::FETCH_ASSOC))
			{
				switch ($donnees['type'])
				{
					case 'guerrier' : $persos[] = new Guerrier($donnees);
						break;
					case 'magicien' : $persos[] = new Magicien($donnees);
						break;
				}
			}
		}
		catch(PDOException $e)
		{
	    	echo 'Connection failed: ' . $e->getMessage();
		}
		return $persos;
	}
	public function update(Person $perso)
	{
		$sql = <<<EOT
UPDATE 
	{$this->_table_personne}
SET
	degats = :degats,
	timeEndormi = :timeEndormi,
	atout = :atout
WHERE
	id = :id
;

EOT;

		try
		{
			$q = $this->_db->prepare($sql);
			$q->bindValue(':degats', $perso->degats(), PDO::PARAM_INT);
			$q->bindValue(':timeEndormi', $perso->timeEndormi(), PDO::PARAM_INT);
			$q->bindValue(':atout', $perso->atout(), PDO::PARAM_INT);
			$q->bindValue(':id', $perso->id(), PDO::PARAM_INT);
			$q->execute();
		}
		catch(PDOException $e)
		{
	    	echo 'Connection failed: ' . $e->getMessage();
		}
	}
	public function setDb(PDO $db)
	{
		$this->_db = $db;
		return true;
	}
}