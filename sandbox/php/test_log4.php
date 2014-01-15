<?php
include(__DIR__.'/../../apache-log4php/src/main/php/Logger.php');
// Include and configure log4php
Logger::configure('config4.xml');
$main = Logger::getLogger('fol');
$main->info('This will be logged twice.');