<?php
include(__DIR__.'/../../apache-log4php/src/main/php/Logger.php');
// Include and configure log4php
Logger::configure('config3.xml');
$main = Logger::getLogger('main');
$main
      ->trace('This will not be logged.');
$main
      ->info('This will be logged.');
