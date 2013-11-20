<?php
$a = fopen("txt", "w");
var_dump(get_resource_type($a));
error_reporting(E_ALL);
$c = mysql_connect();
echo get_resource_type($c);

