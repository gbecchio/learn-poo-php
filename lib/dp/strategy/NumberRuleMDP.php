<?php
namespace dp\strategy;
error_reporting(E_ERROR | E_WARNING | E_PARSE | E_NOTICE);

//include(__DIR__."/IRuleMDP.php");
//use dp\strategy\IRuleMDP;
/**
* Application du pattern stragety pour vérifier
* si le mot de passe répond à certaines règle.
* @author Gregory Becchio
* @since 29/11/2013
* 
*/
class NumberRuleMDP implements IRuleMDP 
{
	/**
	* Le mot de passe soumis à la règle
	* @param string $mdp
	*/
	function verifMDP($mdp)
	{
		$pattern = '/[0-9]+/';
		preg_match($pattern, $mdp, $matches);
		if(isset($matches) && !empty($matches))
		{
			return true;
		}
		else
		{
			return false;
		}
	}
}