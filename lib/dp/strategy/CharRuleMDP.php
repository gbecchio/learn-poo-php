<?php
namespace dp\strategy;
error_reporting(E_ERROR | E_WARNING | E_PARSE | E_NOTICE);

//use dp\strategy\IRuleMDP;
/**
* Application du pattern stragety pour vérifier
* si le mot de passe répond à certaines règle.
* @author Gregory Becchio
* @since 29/11/2013
* 
*/
class CharRuleMDP implements IRuleMDP
{
	/**
	* Le mot de passe soumis à la règle
	* @param string $mdp
	*/
	public function verifMDP($mdp)
	{
		if(is_string($mdp))
		{
			return true;
		}
		else
		{
			return false;
		}
	}
}