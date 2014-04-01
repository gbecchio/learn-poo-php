<?php
class Person
{
	private $tata;
	protected $_id;
	protected $_nom;
	protected $_degats;
	protected $_atout;
	protected $_timeEndormi;
	protected $_type;
	
	const CEST_MOI = 1;
	const PERSON_TUE = 2;
	const PERSON_FRAPPE = 3;
	const PERSON_ENSORCELE = 4;
	const PAS_DE_MAGIE = 5;
	const PERSO_ENDORMI = 6;

	function __construct(array $donnees)
	{
		$this->hydrate($donnees);
		$this->_type = strtolower(get_class($this));
	}
	public function estEndormi()
	{
		return $this->_timeEndormi > time();
	}

	public function frapper(Person $perso)
	{
		if($perso->id() == $this->_id)
		{
			return self::CEST_MOI;
		}
		if($this->estEndormi())
		{
			return self::PERSO_ENDORMI;
		}
		return $perso->recevoirDegats(5);
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
	public function recevoirDegats($force = NULL)
	{
		$this->_degats += 5;
		if($this->_degats >= 100)
		{
			return self::PERSON_TUE;
		}
		return self::PERSON_FRAPPE;
	}
	public function reveil()
	{
		$secondes = $this->_timeEndormi;
		$secondes -= time();
		
		$heures = floor($secondes / 3600);
		$secondes -= $heures * 3600;
		$minutes = floor($secondes / 60);
		$secondes -= $minutes * 60;

		$heures .= $heures <= 1 ? ' heure' : 'heures';
		$minutes .= $minutes <= 1 ? ' minute' : 'minutes';
		$secondes .= $secondes <= 1 ? ' seconde' : 'secondes';

		return $heures . ', '.$minutes.' et '.$secondes;
	}
	public function atout()
	{
		return $this->_atout;
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
	public function timeEndormi()
	{
		return $this->_timeEndormi;
	}
	public function type()
	{
		return $this->_type;
	}
	public function setAtout($atout)
	{
		$atout = (int) $atout;
		if($atout >= 0 && $atout <= 100)
		{
			$this->_atout = $atout;
		}
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
	public function setTimeEndormi($time)
	{
		$this->_timeEndormi = (int) $time;
	}
	public function nomValide()
	{
		return !empty($this->_nom);
	}
	public function __set($nom, $valeur)
	{
		echo "impossible d'utiliser ".$nom." avec la valeur ".$valeur;
	}
	public function __get($nom)
	{
		echo "impossible d'accèder à l'attribut ".$nom;
	}
	public function __unset($nom)
	{
		echo "cette variable ne peut pas être détruite ".$nom;
	}
	public function __call($nom, $args)
	{
		echo "impossible d'appeler la methode ".$nom;
		echo "<br />";
		echo "qui a pour arguments ";
		var_dump($args);
	}
	public static function __callStatic($nom, $args)
	{
		echo "impossible d'appeler la methode statique ".$nom;
		echo "<br />";
		echo "qui a pour arguments ";
		var_dump($args);
	}
	public function __destruct()
	{
		unset($this->_id);
	}
}