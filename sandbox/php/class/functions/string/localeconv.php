<?php
echo "<pre>";
echo "dq";
$ttt = setlocale(LC_ALL, 'nl_NL.UTF-8@euro');
var_dump($ttt);
if(false !== $ttt)
{
	var_dump("la");
    $locale_info = localeconv();
    var_dump("ici");
    print_r($locale_info);
}
echo $ttt;
echo "</ pre>";