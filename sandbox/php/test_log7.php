<?php
include(__DIR__.'/../../apache-log4php/src/main/php/Logger.php');
// Include and configure log4php
Logger::configure('config7.xml');
$main = Logger::getLogger('default');
$main->trace('Trace.');
$main->debug('Debug.');
$main->info('Info.');
$main->warn('Warn.');
$main->error('Error.');
//$main->fatal('Fatal.');
$main->trace('Trace.');
$main->debug('Debug.');
$main->info('Info.');
$main->warn('Warn.');