<?php
$dom = new DomDocument();
$dom->validateOnParse = true;
$dom->loadXml('<html><head><title>DomXml</title></head><body><table border="1"><tr><td>a</td></tr></table></body></html>');
$dom->validate();
echo $dom->saveXML();
echo $dom->saveHTML();
$title = $dom->getElementsByTagName('title');
var_dump($title);
var_dump($title->item(0));
var_dump($title->item(0)->nodeValue);

var_dump($title->item(0)->nodeName);
$title->item(0)->nodeValue = "Ceci est une modification";
var_dump($title->item(0)->nodeValue);
$element = $dom->createElement('category', 'PHP');
$bodyElement = $dom->getElementsByTagName('body');
$bodyElement->item(0)->appendchild($element);
$dom->save('document.xml');