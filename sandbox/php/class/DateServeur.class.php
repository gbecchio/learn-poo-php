<?php
/**
 * Classe qui va nous servir à tester le serveur SOAP : il s'agit d'une classe classique...
 *
 */
class DateServeur
{
	function retourDate($si)
	{
		$serveur		= $_SERVER['SERVER_SIGNATURE'];
		$date 			= date("d/m/Y");
		$tab['serveur']	= $serveur;
		$tab['date']	= $date;
		$tab['rien']	= "nothing";
		$tab['si']		= $si;
		return $tab;
	}
}
//Cette option du fichier php.ini permet de ne pas stocker en cache le fichier WSDL, afin de pouvoir faire nos tests
//Car le cache se renouvelle toutes les 24 heures, ce qui n'est pas idéal pour le développement
ini_set('soap.wsdl_cache_enabled', 0);
//L'instanciation du SoapServer se déroule de la même manière que pour le client : voir la doc pour plus d'informations sur les 
//Différentes options disponibles 
$serversoap=new SoapServer("http://localhost/learn-poo-php/sandbox/php/class/query.wsdl");
//Ici nous déclarons la classe qui sera servie par le Serveur SOAP, c'est cette déclaration qui fera le coeur de notre Servie WEB.
//Je déclare que je sers une classe contenant des méthodes accessibles, on peut aussi déclarer plus simplement des fonctions
//par l'instruction addFunction() : $serversoap->addFunction("retourDate"); à ce moment-là nous ne faisons pas de classe.
//Noter le style employé pour la déclaration : le nom de la classe est passé en argument de type String, et non pas de variable...
$serversoap->setClass("DateServeur");
//Ici, on dit très simplement que maintenant c'est à PHP de prendre la main pour servir le Service WEB : il s'occupera de l'encodage XML, des
//Enveloppes SOAP, de gérer les demandes clientes, etc. Bref, on en a fini avec le serveur SOAP !!!!
$serversoap->handle();