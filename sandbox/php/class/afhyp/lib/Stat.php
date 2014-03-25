<?php
class StatMere
{
	public function lancerTest()
	{
		static::quiEstCe();
	}
	public function quiEstCe()
	{
		echo 'classe mère';
	}
}
class Enfant extends StatMere
{
	public function quiEstCe()
	{
		echo 'classe fille';
	}
}
class A
{
	public static function appelerQuiEstCe()
	{
		static::quiEstCe();
		//self::quiEstCe();
	}
	public function quiEstCe()
	{
		echo 'A';
	}
}
class B extends A
{
	public static function test()
	{
		//parent::quiEstCe();
		//static::appelerQuiEstCe();
		//parent::appelerQuiEstCe();
		A::appelerQuiEstCe();
	}
	public function quiEstCe()
	{
		echo 'B';
	}
}
class C extends B
{
	public function quiEstCe()
	{
		echo 'C';
	}
}
C::test();
echo '<br /><br />';
$e = new Enfant();
$e->lancerTest();