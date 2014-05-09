<?php
class Mailer
{
	use HtmlFormater;
	public function send($text)
	{
		mail('gbecchio@yahoo.fr', 'Test with traits', $this->format($text));
		return $this->format($text);
	}
}
