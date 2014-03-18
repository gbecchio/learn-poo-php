<?php
/**
 * Invocation simple à un Service WEB : la classe SoapClient() comporte des paramètres supplémentaires 
 * qui seront intéressants à étudier dans la documentation
 */

$params = array('compression' => true);
//On doit passer le fichier WSDL du Service en paramètre de l'objet SoapClient()
$wsdl="http://footballpool.dataaccess.eu/data/info.wso?WSDL";
$service=new SoapClient($wsdl, $params);

//À partir de là, on peut déjà faire appel aux méthodes du service décrites dans le WSDL
$taballservices=$service->Cities();

//On renvoie le résutat de notre méthode, pour voir....
print_r($taballservices);
/*var_dump($taballservices->CitiesResult);
foreach($taballservices->CitiesResult->string as $key => $val)
{
	echo $key." ".$val."\n\r";
$selected = $service->AllDefenders();
var_dump($selected);
*/
$allcards = $service->AllCards();
var_dump($allcards);
//$result = $service->TopGoalScorers(array('iTopN'=>5));
$result = $service->TopGoalScorers(array('iTopN'=>56));
var_dump($result);
$pn = $service->AllDefenders(array('sCountryName'=>"Spain"));
print_r($pn);
$pn = $service->AllPlayerNames(array('bSelected'=>NULL));
print_r($pn);
$pn = $service->AllForwards(array('sCountryName'=>"France"));
print_r($pn);
$pn = $service->AllPlayersWithYellowCards(array('bSortedByName'=>true, 'bSortedByYellowCards'=>true));
print_r($pn);
$pn = $service->GoalsScored(16);
print_r($pn);



