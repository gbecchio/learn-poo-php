<?php
setcookie('param["un"]',"un", 60*24*60, "/tmp/");
setcookie('param["deux"]',"deux");
$ch = curl_init("http://www.afhyp.fr/");
if(!is_file("example_homepage.txt"))
{
	$fp = fopen("example_homepage.txt", "w");
}
$fp = fopen("example_homepage.txt", "a");
curl_setopt($ch, CURLOPT_FILE, $fp);
curl_setopt($ch, CURLOPT_HEADER, 0);

curl_exec($ch);
curl_close($ch);
fclose($fp);
