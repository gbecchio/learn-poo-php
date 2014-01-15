<?php
include(__DIR__.'/../../apache-log4php/src/main/php/Logger.php');
// Include and configure log4php
Logger::configure('config2.xml');
/**
* This is a classic usage pattern: one logger object per class.
*/
class Foo
{
  /** Holds the Logger. */
  private $log;
  
  /** Logger is instantiated in the constructor. */
  public function __construct()
  {
    // The __CLASS__ constant holds the class name, in our case "Foo".
    // Therefore this creates a logger named "Foo" (which we configured in the config file)
    $this->log = Logger::getLogger(__CLASS__);
  }
  /** Logger can be used from any member method. */
  public function go()
  {
    $this->log->info("We have liftoff.");
    $this->log->debug("Ici et là bas");
  }
}
$foo = new Foo();
$foo->go();
///////////////////////////////////////////
$main = Logger::getLogger('main');
$main
      ->trace('This will not be logged.');
$main
      ->info('This will be logged.');
