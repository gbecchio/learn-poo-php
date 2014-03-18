<?php
echo "<pre>";
$hex = hex2bin("6578616d706c65206865782064617461");
print_r($hex);
$bin = "greg";
$hex = bin2hex($bin);
var_dump($hex);
$hex = hex2bin($hex);
print_r($hex);
echo "</pre>";
