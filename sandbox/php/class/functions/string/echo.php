<?php
echo "<pre>";
$str = 'one|two|three|four';

// limit positif
print_r(explode('|', $str, 3));
// limit positif
print_r(explode('|', $str, 2));

// limit négatif (depuis PHP 5.1)
print_r(explode('|', $str, -4));

// limit négatif (depuis PHP 5.1)
print_r(explode('|', $str, -3));

// limit négatif (depuis PHP 5.1)
print_r(explode('|', $str, -1));
echo "</ pre>";