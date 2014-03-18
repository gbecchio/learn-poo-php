<?php
setcookie('param[un]',"un", 60*24*60, "/var/www/learn-poo-php/sandbox/php/class/tmp/");
setcookie('param[deux]',"deux", 60*24*60, "/var/www/learn-poo-php/sandbox/php/class/tmp");
if(isset($_COOKIE['param']["deux"]))
{
	echo "<pre>";
	print_r($_COOKIE['param']["deux"]);
	echo "</pre>";
}