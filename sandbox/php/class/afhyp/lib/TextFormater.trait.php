<?php
trait TextFormater
{
	public function format($text)
	{
		 $date = date('d-m-Y');
		 $nl = nl2br($text);
		 $a = "Date : {$date}\n{$nl}";
		return $a;
	}
}
