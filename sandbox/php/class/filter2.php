<?php
$a = 'joe@example.org';
$b = 'bogus - at - example dot org';
$c = '(bogus@example.org)';

$sanitized_a = filter_var($a, FILTER_SANITIZE_EMAIL);
if (filter_var($sanitized_a, FILTER_VALIDATE_EMAIL)) {
    echo "Cette (a) adresse email nettoyée est considérée comme valide.";
}

$sanitized_b = filter_var($b, FILTER_SANITIZE_EMAIL);
if (filter_var($sanitized_b, FILTER_VALIDATE_EMAIL)) {
    echo "Cette (b) adresse email nettoyée est considérée comme valide.";
} else {
    echo "Cette (b) adresse email nettoyée est considérée comme invalide.";
}

$sanitized_c = filter_var($c, FILTER_SANITIZE_EMAIL);
if (filter_var($sanitized_c, FILTER_VALIDATE_EMAIL)) {
    echo "Cette (c) adresse email nettoyée est considérée comme valide.";
    echo "Avant : $c\n";
    echo "Après :  $sanitized_c\n";    
}