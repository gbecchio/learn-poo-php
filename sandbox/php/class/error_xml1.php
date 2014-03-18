<?php
libxml_use_internal_errors(true);
$a = <<<EOT
<?xml version='1.0'?>
<broken>
	<xml />
</broken>

EOT;
$sxe = simplexml_load_string($a);
if ($sxe === false) {
    echo "Erreur lors du chargement du XML\n";
    foreach(libxml_get_errors() as $error) {
        echo "\t", $error->message;
    }
}
echo $sxe->asXML("lma.xml");