<?php
class Guerrier extends Person
{
	public function recevoirDegats($force)
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
		$this->_degats += ($force - $this->_atout);
		if($this->_degats >= 100)
		{
			return self::PERSON_TUE;
		}
		return self::PERSON_FRAPPE;
	}
}