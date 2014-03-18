<?php
// empty
$a;
$a = NULL;
$a = FALSE;
$a = "0";
$a = 0;
$a = 0.0;
$a = false;
$a = "";
$a = array();
// Not empty
$a = "rien";
if(empty($a))
{
	echo "empty";
}
else
{
	echo "not empty";
}