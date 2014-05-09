<?php
trait HTMLFormater
{
	public function format($text)
	{
		 $date = date('d-m-Y');
		 $nl = nl2br($text);
		 $a = <<<EOT
<p>
Date : {$date}
</p>
<p>
{$nl}
</p>
EOT;

		return $a;
	}
}
