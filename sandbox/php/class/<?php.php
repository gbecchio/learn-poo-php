<?php
$s = simpleXMLElement('<members></membres>');
$s->member[0]['id'] = 1;
$s->membre[0]->name = 'coucou';
$s->membre[0]->city = 'paris';

$s->member[1]['id'] = 2;
$s->member[1]->name = 'anaska';
$s->member[1]->city = 'los angeles';

$dom = dom_import_simplexml($s);
$dom = $dom->ownerDocument;
$dom->formatOutput = true;
$dom->encoding = 'utf-8';
echo $dom->saveXml();