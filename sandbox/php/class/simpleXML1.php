<?php
$string = <<<XML
<?xml version='1.0'?>
<document>
    <cmd>login</cmd>
    <login>Richard</login>
</document>
XML;
                                                                       
 echo "<pre>";                                        
$xml = simplexml_load_string($string);
print_r($xml);
$login = $xml->login;
print_r($login);
$login = (string) $xml->login;
print_r($login); 
