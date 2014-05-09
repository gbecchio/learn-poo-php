<?php
class Writer
{
	use HtmlFormater, TextFormater
	{
		HtmlFormater::format insteadof TextFormater;
	}
	public function write($text)
	{
		file_put_contents('fichier.txt', $this->format($text));
		return $this->format($text);
	}
}
