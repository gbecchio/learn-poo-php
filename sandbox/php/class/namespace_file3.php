<?php
namespace sousespacedenoms;
function foo()
{
	echo __NAMESPACE__.'foo()';
}
class foo
{
	public static function foo()
	{
		echo __NAMESPACE__.__MethoD__.__file__.__class__."<br />";
	}
}
define(__NAMESPACE__.'\FOO', 'fou');