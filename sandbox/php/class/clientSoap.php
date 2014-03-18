<?php
/**
 * Invocation du Service WEB que nous venons de créer
 */
//Cette option permet d'éviter la mise en cache du WSDL, qui se renouvelle toutes les 24 heures... Pour le développement, ce n'est pas génial !!!
ini_set('soap.wsdl_cache_enabled', 0);
//On doit passer le fichier WSDL du Service en paramètre de l'objet SoapClient
$service = new SoapClient("http://localhost/learn-poo-php/sandbox/php/class/query.wsdl");
$si = 10;
//On accède à la méthode de notre classe DateServeur, déclaré dans notre SoapServer
$taballservices = $service->retourDate(array('si' => si));
//On renvoie le résutat de notre méthode, pour voir...
print_r($taballservices);