<?php
namespace dp\strategy;
error_reporting(E_ALL & ~ E_STRICT);
/**
* Application du pattern stragety pour vérifier
* si le mot de passe répond à certaines règle.
* @author Gregory Becchio
* @since 29/11/2013
* 
*/
class ObjectMDP
{
	/**
	* Le mot de passe sous forme de chaine
	* @var string $mdp
	*/
	private $mdp;
	/**
	* La règle imposée que le mot de passe doit suivre
	* @var IRegleMDP $rule 
	*/
	private $rule;
	/**
	* @param string $mdp
	*/
	public function __construct($mdp)
	{
		$this->mdp = $mdp;
	}
	/*
	* La règles imposée pour le mot de passe.
	* @param IRuleMDP $rule
	*/
	public function setVerifRule(IRuleMDP $rule)
	{
		$this->rule = $rule;
	}
	public function getVerifRule()
	{
		return $this->rule;
	}
}