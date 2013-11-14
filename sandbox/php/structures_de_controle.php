<?php
error_reporting(E_ALL);
ini_set('error_reporting', E_ALL);

$a = 10;
$b = 9;
if($a > $b):
	echo "if_1";
	echo "if_2";
elseif($a == $b):
	echo "elseif_1";
	echo "elseif_2";
else:
	echo "else_1";
	echo "else_2";
endif;
