<?php
class Personnage
{
	private $_id;
	private $_nom;
	private $_forcePerso;
	private $_degats;
	private $_niveau;
	private $_experience;

	function __construct(array $donnees)
	{
		$this->hydrate($donnees);
	}
	private function hydrate(array $donnes)
	{
		foreach($donnes as $clef=>$valeur)
		{
			$methode = "set".ucfirst($clef);
			if(method_exists($this, $methode))
			{
				$this->$methode($valeur);
			}
		}
	}
	public function id()
	{
		return $this->_id;
	}
	public function nom()
	{
		return $this->_nom;
	}
	public function forcePerso()
	{
		return $this->_forcePerso;
	}
	public function degats()
	{
		return $this->_degats;
	}
	public function niveau()
	{
		return $this->_niveau;
	}
	public function experience()
	{
		return $this->_experience;
	}
	public function setId($id)
	{
		$this->_id = (int) $id;
	}
	public function setNom($nom)
	{
		if(is_string($nom) && strlen($nom) <= 30)
		{
			$this->_nom = $nom;
		}
	}
	public function setForcePerso($forcePerso)
	{
		$forcePerso = (int) $forcePerso;
		if($forcePerso >= 0 && $forcePerso <= 100)
		{
			$this->_forcePerso = $forcePerso;
		}
	}
	public function setDegats($degats)
	{
		$degats = (int) $degats;
		if($degats >= 0 && $degats <= 100)
		{
			$this->_degats = $degats;
		}
	}
	public function setNiveau($niveau)
	{
		$niveau = (int) $niveau;
		if($niveau >= 0)
		{
			$this->_niveau = $niveau;
		}
	}
	public function setExperience($exp)
	{
		$exp = (int) $exp;
		if($exp >= 0 && $exp <= 100)
		{
			$this->_experience = $exp;
		}
	}
}