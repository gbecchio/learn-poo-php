<?php
namespace dp\strategy;
error_reporting(E_ALL & ~E_STRICT);
/**
* Application du pattern stragety pour vérifier
* si le mot de passe répond à certaines règle.
* @author Gregory Becchio
* @since 29/11/2013
* 
*/
interface IRuleMDP
{
	/*
	* La règles imposée pour le mot de passe.
	* @param IRuleMDP $rule
	*/
	public function verifMDP($mdp);
}