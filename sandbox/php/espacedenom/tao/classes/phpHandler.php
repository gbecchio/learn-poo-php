<?php
namespace Tao;
class phpHandler
{
	static private $beforeHooks	= array();
	static private $afterHooks	= array();
	static function handle($function, $args)
	{
		if(array_key_exists($function, self::$beforeHooks))
		{
			foreach(self::$beforeHooks[$function] as $hook)
			{
				$args = $hook['class']::$hook['method']($args);
			}
		}
		if(file_exists(__DIR__.'/phpHandler/'.$function.'.php'))
		{
			include_once(__DIR__.'/phpHandler/'.$function.'.php');
			$res = forward_static_call_array(array($function, 'main'), $args);
		}
		else
		{
			
			$res = forward_static_call_array('\\'.$function, $args);
		}
		if(array_key_exists($function, self::$afterHooks))
		{
			foreach (self::$afterHooks[$function] as $hook)
			{
				$res = $hook['class']::$hook['method']($args, $res);
			}
		}
		return $res;
	}
	protected static function main()
	{
		$function = '\\'.get_called_class();
		return forward_static_call_array($function, func_get_args());
	}
	static function registerBeforeHook($functionName, $hookClass, $method)
	{
		self::$beforeHooks[$functionName][] = array('class' => $hookClass, 'method' => $method);
		return true;
	}
	static function registerAfterHook($functionName, $hookClass, $method)
	{
		self::$afterHooks[$functionName][] = array('class' => $hookClass, 'method' => $method);
		return true;
	}
}
