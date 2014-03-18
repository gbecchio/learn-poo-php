<?php
namespace My\Full;
use My\Full\Classname as Another, My\Full\NSname;
class Classname
{
	function __construct()
	{
		echo __NAMESPACE__.__MethoD__.__file__.__class__."<br />";
	}
}
class NSname
{
	function __construct()
	{
		echo __NAMESPACE__.__MethoD__.__file__.__class__."<br />";
	}	
}