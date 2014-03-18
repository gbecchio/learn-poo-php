<?php
define("CONSTANT", 1);
define("_CONSTANT", 0);
define("DIE", '12');
if(!empty(DIE))
{
	if(!(boolean | _CONSTANT))
	{
		print "One";
	}
}
else if(constant('CONSTANT') == 1)
{
	print "Two";
}
