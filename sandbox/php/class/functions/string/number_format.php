<?php
echo "<pre>";
$number = 1234.56;
var_dump($number);

// Notation anglaise (par défaut)
$english_format_number = number_format($number);
// 1,235
var_dump($english_format_number);
// Notation française
$nombre_format_francais = number_format($number, 2, ',', ' ');
// 1 234,56
var_dump($nombre_format_francais);
$number = 1234.5678;
var_dump($number);
// Notation anglaise sans séparateur des centaines
$english_format_number = number_format($number, 2, '.', '');
var_dump($english_format_number);
echo "</ pre>";