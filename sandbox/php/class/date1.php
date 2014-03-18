<?php
echo "<pre>";
$date = new DateTime('2014-03-13');
$date->add(new DateInterval('P38D'));
echo $date->format('Y-m-d') . "\n";
$date = date_create('2014-03-13');
date_add($date, date_interval_create_from_date_string('38 days'));
echo date_format($date, 'Y-m-d');

$date = new DateTime('2000-01-01');
$date->add(new DateInterval('P1DT10H17M30S'));
echo $date->format('Y-m-d H:i:s') . "\n";

$date = new DateTime('2000-01-01');
$date->add(new DateInterval('P7Y5M4DT4H3M2S'));
echo $date->format('Y-m-d H:i:s') . "\n";

$date = new DateTime('2000-12-31');
$interval = new DateInterval('P1M');

$date->add($interval);
echo $date->format('Y-m-d') . "\n";

$date->add($interval);
echo $date->format('Y-m-d') . "\n";

// date/time spécifiés dans le fuseau de votre machine
$date = new DateTime('2000-01-01');
echo $date->format('Y-m-d H:i:sP') . "\n";

// date/time dans un fuseau précis.
$date = new DateTime('2000-01-01', new DateTimeZone('Pacific/Nauru'));
echo $date->format('Y-m-d H:i:sP') . "\n";

// date/time courants dans le fuseau de votre machine
$date = new DateTime();
echo $date->format('Y-m-d H:i:sP') . "\n";

// date/time courants dans un fuseau précis.
$date = new DateTime(null, new DateTimeZone('Pacific/Nauru'));
echo $date->format('Y-m-d H:i:sP') . "\n";

// Utilisation d'un timestamp Unix. Notez que le résultat est dans le fuseau UTC.
$date = new DateTime('@946684800');
echo $date->format('Y-m-d H:i:sP') . "\n";

// Valeur non existante
$date = new DateTime('2000-02-30');
echo $date->format('Y-m-d H:i:sP') . "\n";

$date = DateTime::createFromFormat('j-n-Y', '15-02-2009');
var_dump($date->format('Y-n-d'));
echo $date->format('Y-m-d');
try {
    $date = new DateTime('asdfasdf');
} catch (Exception $e) {
    // Juste pour l'exemple...
    print_r($e);
    print_r(DateTime::getLastErrors());

    // Manière orientée objets de gérer les erreurs (exceptions)
    // echo $e->getMessage();
}
$date = new DateTime('2006-12-12');
$date->modify('+1 day');
echo $date->format('Y-m-d');
$date = new DateTime();
$date->setDate(2001, 2, 3);
echo $date->format('Y-m-d');
echo "<br />";
$date = new DateTime();

$date->setISODate(2008, 2);
echo $date->format('Y-m-d') . "\n";

$date->setISODate(2008, 2, 7);
echo $date->format('Y-m-d') . "\n";

$date = new DateTime('2001-01-01');

$date->setTime(14, 55);
echo $date->format('Y-m-d H:i:s') . "\n";

$date->setTime(14, 55, 24);
echo $date->format('Y-m-d H:i:s') . "\n";

$date = new DateTime();
echo $date->format('U = Y-m-d H:i:s') . "\n";

$date->setTimestamp(1171502725);
echo $date->format('U = Y-m-d H:i:s') . "\n";
$date = new DateTime(NULL, new DateTimeZone('Pacific/Nauru'));
echo $date->format('Y-m-d H:i:sP') . "\n";

$date = new DateTime();
$date->sub(new DateInterval('P10D'));
echo $date->format('Y-m-d') . "\n";