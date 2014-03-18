<?php
libxml_use_internal_errors(true);

$dom = new DOMDocument;
$dom->loadXml('<title><a id = "idee">idée</a><b/></title>');
$dom->formatOutput = true;
$dom->encoding = 'utf-8';
$dom->validate();
$dom->save('file.xml');
if(!$dom->load('file.xml'))
{
	foreach(libxml_get_errors() as $error)
	{
		echo $error->message;
		if($error->level == LIBXML_ERR_FATAL)
		{
			echo "l'erreur est grave";
		}
		else if($error->level == LIBXML_NOCDATA || $error->level == LIBXML_NOBLANKS)
		{
			echo "attention quoi!";
		}
	}
	libxml_clear_errors();
}
$xml = "
<a>
	<b>foo   	</b>
	<c/>
</a>";
//<![CDATA[<foo>]]>
$s = new DOMDocument();
echo $s->loadXml($xml);
