<?php
class CalculException
{
	public function additionner($a, $b)
	{
		if(!is_numeric($a) && !is_numeric($b))
		{
			throw new Exception("Les deux parametres doivent être des nombres", 1);
		}
		return $a + $b;
	}
}
