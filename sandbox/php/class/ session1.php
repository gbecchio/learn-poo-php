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
}