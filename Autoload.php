<?php
function autoload($class)
{
  $road1 = __DIR__.'/lib/'.str_replace('\\', '/', $class).'.php';
  $road2 = __DIR__.'/sandbox/php/lib/'.str_replace('\\', '/', $class).'.php';
  if(file_exists($road1))
  {
    require $road1;
  }
  else if(file_exists($road2))
  {
    require $road2;
  }
  else
  {
    echo "Erreur : impossible de charger la classe $class";
    exit;
  }
}
spl_autoload_register('autoload');