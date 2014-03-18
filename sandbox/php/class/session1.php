<?php
session_start();
if(isset($session['language']))
{
	echo 'langage existe dans cette session';
	echo $_SESSION['language'];
}
else
{
	$_SESSION['language'] = 'PHP 5';
	var_dump(session_get_cookie_params());
	//echo $_SESSION['language'];
}