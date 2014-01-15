<?php
include(__DIR__.'/../../apache-log4php/src/main/php/Logger.php');
// Tell log4php to use our configuration file.
Logger::configure('config.xml');
// Fetch a logger, it will inherit settings from the root logger
$log = Logger::getLogger('myLogger2');
// Start logging
$log
      ->trace("My first message."); // Not logged because TRACE < WARN
$log
      ->debug("My second message."); // Not logged because DEBUG < WARN
$log
      ->info("My third message."); // Not logged because INFO < WARN
$log
      ->warn("My fourth message."); // Logged because WARN >= WARN
$log
      ->error("My fifth message."); // Logged because ERROR >= WARN
$log
      ->fatal("My sixth message."); // Logged because FATAL >= WARN
$logger = Logger::getLogger("main");
$logger
        ->info("This is an informational message.");
echo "<br />";
$logger
        ->warn("I'm not feeling so good...");
$logger
        ->trace("I'm not feeling so good...");