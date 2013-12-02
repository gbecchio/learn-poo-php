<?php
namespace dp\strategy;
include(__DIR__."/../../../Autoload.php");
error_reporting(E_ERROR | E_WARNING | E_PARSE | E_NOTICE);
/**
* Application du pattern stragety pour vérifier
* si le mot de passe répond à certaines règle.
* @author Gregory Becchio
* @since 29/11/2013
* 
*/
use dp\strategy\ObjectMDP;
use dp\strategy\CharRuleMDP;
use dp\strategy\NumberRuleMDP;
use sandbox\php\lib\ClasseEssai;
//$classe_essai = new ClasseEssai();
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