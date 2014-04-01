<?php
class ClasseClone
{
	private static $instances = 0;
	public function __construct()
	{
		self::$instances++;
	}
	public function __clone()
	{
		self::$instances++;
	}
	public static function getInstances()
	{
		return self::$instances;
	}
}
