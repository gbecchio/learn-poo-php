<?php
echo "<pre>";
print_r(headers_list());
$headers = getallheaders();
if(isset($headers['User-Agent']) || stripos($headers['User-Agent'], 'Mozilla/5.0 (X11; Ubuntu; Linux i686; rv:27.0) Gecko/20100101 Firefox/27.0') === false)
{
	if(!headers_sent())
	{
		setcookie('nomoz');
		header(null, null, 403);
	}
	echo "Sorry, only Mozilla is allowed here";
}
print_r($headers);
echo "</pre>";
