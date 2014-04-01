<?php
class ClasseForEach
{
	public $attr1 = '1er attr public';
	public $attr2 = '2eme attr public';
	protected $attrProtected1 = '1er attr protected';
	protected $attrProtected2 = '2eme attr protected';
	private $_attrPrivate1 = '1er attr private';
	private $_attrPrivate2 = '2eme attr private';
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
