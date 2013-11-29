<?php
error_reporting(E_ALL & ~E_STRICT);
/**
* Application du pattern stragety pour vérifier
* si le mot de passe répond à certaines règle.
* @author Gregory Becchio
* @since 29/11/2013
* 
*/
include(__DIR__."/IRuleMDP.php");
include(__DIR__."/ObjectMDP.php");
include(__DIR__."/CharRuleMDP.php");
include(__DIR__."/NumberRuleMDP.php");
use dp\strategy\ObjectMDP;
use dp\strategy\CharRuleMDP;
use dp\strategy\NumberRuleMDP;

$str_mdp = '2a10';
$mdp = new ObjectMDP($str_mdp);
$mdp->setVerifRule(new CharRuleMDP());
if(!$mdp->getVerifRule()->verifMDP($str_mdp))
{
	echo "le mot de passe ne comporte pas de caractère";
}
$mdp->setVerifRule(new NumberRuleMDP());
if(!$mdp->getVerifRule()->verifMDP($str_mdp))
{
	echo "Le mot de passe ne comporte pas de nombres";
}
else
{
	echo "mot de passe correct";
}