<?php
class Magicien extends Person
{
	public function lancerUnSort(Person $perso)
	{
		if($this->_degats >= 0 && $this->_degats <= 25)
		{
			$this->_atout = 4;
		}
		else if($this->_degats > 25 && $this->_degats <= 50)
		{
			$this->_atout = 3;
		}
		else if($this->_degats > 50 && $this->_degats <= 75)
		{
			$this->_atout = 2;
		}
		else if($this->_degats > 75 && $this->_degats <= 90)
		{
			$this->_atout = 1;
		}
		else
		{
			$this->_atout = 0;
		}
		if($perso->id() == $this->_id)
		{
			return self::CEST_MOI;
		}
		if($perso->id() == $this->_id)
		{
			return self::CEST_MOI;
		}
		if($this->_atout == 0)
		{
			return self::PAS_DE_MAGIE;
		}
		if($this->estEndormi())
		{
			return self::PERSON_ENDORMI;
		}
		$perso->_timeEndormi = time() + ($this->_atout * 6) * 3600;
		return self::PERSON_ENSORCELE;
	}
}