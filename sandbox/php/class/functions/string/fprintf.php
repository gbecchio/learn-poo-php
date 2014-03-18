<?php
$year = 2000;
$month = 10;
$day = 12;
if(!($fp = fopen('date.txt', 'w+')))
{
    return;
}
fprintf($fp, "%04d-%02d-%02d", $year, $month, $day);
// écrira la date formatée ISO dans le fichier date.txt
$money1 = 68.75;
$money2 = 54.35;
$money = $money1 + $money2;
// echo $money affichera "123.1";
$len = fprintf($fp, '%01.2f', $money);
// écrira "123.10" dans le fichier currency.txt
echo "écriture de $len octets dans le fichier currency.txt";
// utilisez la valeur retournée par fprintf pour déterminer le nombre d'octets écrits
