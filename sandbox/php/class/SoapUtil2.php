<?php
$options = array
(
	'location' => "http://www.webservicex.com/globalweather.asmx?WSDL",
	'uri' => "urn:webservicex",
	'style' => SOAP_RPC,
	"use" => SOAP_ENCODED
);
$a = new SoapClient(NULL, $options);
$method = "GetCitiesByCountry";
$param = new SoapParam('CountryName', "Russia");
$params = array($param);
$options = array
(
	"soapaction" => "urn:webservicex#GetCitiesByCountry",
);
$b = $a->__soapCall($method, $params, $options);
