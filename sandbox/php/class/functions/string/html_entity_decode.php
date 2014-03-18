<?php
$orig = 'J\'ai "sorti" le <strong>chien</strong> tout à l\'heure';
$a = htmlentities($orig);
$b = html_entity_decode($a);
$c = htmlentities($orig, null, null, false);
$d = htmlentities($orig, null, null, true);
echo $a."<br />"; // J'ai &quot;sorti&quot; le &lt;strong&gt;chien&lt;/strong&gt; tout &amp;agrave; l'heure
//echo $b; // J'ai "sorti" le <strong>chien</strong> tout à l'heure
echo $c;
echo $d;
echo "</pre>";