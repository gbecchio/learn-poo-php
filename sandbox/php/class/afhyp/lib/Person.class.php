<?php
class Person
{
	private $_id;
	private $_nom;
	private $_degats;
	
	const CEST_MOI = 1;
	const PERSON_TUE = 2;
	const PERSON_FRAPPE = 3;

	function __construct(array $donnees)
	{
		$this->hydrate($donnees);
	}
	public function frapper(Person $perso)
	{
		if($perso->id() == $this->_id)
		{
			return self::CEST_MOI;
		}
		return $perso->recevoirDegats();
	}
	public function hydrate(array $donnes)
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
	public function recevoirDegats()
	{
		$this->_degats += 5;
		if($this->_degats >= 100)
		{
			return self::PERSON_TUE;
		}
		return self::PERSON_FRAPPE;
	}
	public function degats()
	{
		return $this->_degats;
	}
	public function id()
	{
		return $this->_id;
	}
	public function nom()
	{
		return $this->_nom;
	}
	public function setDegats($degats)
	{
		$degats = (int) $degats;
		if($degats >= 0 &&  $degats <= 100)
		{
			$this->_degats = $degats;
		}
	}
	public function setId($id)
	{
		$id = (int) $id;
		if($id > 0)
		{
			$this->_id = $id;
		}
	}
	public function setNom($nom)
	{
		if(is_string($nom))
		{
			$this->_nom = $nom;
		}
	}
}