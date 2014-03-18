<?php
echo "<pre>";
$dom = new DOMDocument;
$dom->loadXML('<books><book><title>blah</title></book></books>');
if(!$dom)
{
    echo 'Erreur lors de l\'analyse du document';
    exit;
}
//print_r($dom);
$books = simplexml_import_dom($dom);
//echo $books->book[0]->title;
//print_r($books);
print_r($books->asXML());