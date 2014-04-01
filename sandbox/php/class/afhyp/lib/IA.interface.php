<?php
interface IA
{
	public function test1();
}
interface IB extends IA
{
	public function test2($param);
}
class MaClaisse implements IB
{
	public function test1()
	{
		echo "test 1";
	}
	public function test2($param)
	{
		echo "test 2";
		echo $param;
	}
}
echo "<pre>";
$mc = new MaClaisse();
$mc->test1();
$mc->test2("paramètre");