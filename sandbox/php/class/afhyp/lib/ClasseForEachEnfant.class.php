<?php
class ClasseForEachEnfant extends ClasseForEach
{
	function listeAttributs()
	{
		$tab = array();
		foreach($this as $attribut => $valeur)
		{
			$tab[$attribut] = $valeur;
		}
		return $tab;
	}
}
