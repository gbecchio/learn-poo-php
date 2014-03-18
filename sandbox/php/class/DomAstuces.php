<?php
$s = new simpleXMLElement('<members></members>');
$s->member[0]['id'] = 1;
$s->membre[0]->name = 'coucou';
$s->membre[0]->city = 'paris';

$s->member[1]['id'] = 2;
$s->member[1]->name = 'anaska é&è!çà';
$s->member[1]->city = 'los angeles';

$dom = dom_import_simplexml($s);
$dom = $dom->ownerDocument;
$dom->formatOutput = true;
$dom->encoding = 'utf-8';
//$dom->encoding = 'iso-8859-1';
echo $dom->saveXml();
phpinfo();