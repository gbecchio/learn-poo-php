<?php
$simple = "<para><note>simple note</note><note>simple note 2</note></para>";
$p = xml_parser_create();
xml_parse_into_struct($p, $simple, $vals, $index);
xml_parser_free($p);
echo "<pre>Index array\n";
print_r($index);
echo "\nVals array\n";
print_r($vals);
echo "</ pre>";
