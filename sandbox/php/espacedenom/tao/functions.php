<?php
namespace Tao;
$taoHandledFunctions = 'var_dump';
$tFunctions = explode(',', $taoHandledFunctions);
foreach($tFunctions as $function)
{
	$temp = <<<EOT
namespace Tao;

function {$function}()
{
	//return 'compte à la mimine';
	return phpHandler::handle('{$function}', func_get_args());
}

EOT;
	eval($temp);
}
