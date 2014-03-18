<?php
setLocale(LC_CTYPE, 'FR_fr.UTF-8');
$sUser = 'my_"username01';
$aValid = array('-', '_');
if(!ctype_alnum(str_replace($aValid, '', $sUser)))
{
    echo 'Your username is not properly formatted.';
}
$strings = array('àçèazH', 'arf12');
foreach($strings as $testcase)
{
  if(ctype_alpha($testcase))
  {
    echo "La chaîne $testcase ne contient que des lettres.\n";
  }
  else
  {
    echo "La chaîne $testcase ne contient pas que des lettres.\n";
  }
}
$strings = array('string1' => "asdf\n\r", 'string2' => 'ar f1   2', 'string3' => "LKA#@%.54");
foreach($strings as $name => $testcase)
{
  if(ctype_print($testcase))
  {
    echo "La chaîne '$name' ne contient que des caractères imprimables.\n";
  }
  else
  {
    echo "La chaîne '$name' ne contient pas que des caractères imprimables.\n";
  }
}
$strings = array('string1' => "\n\r\t", 'string2' => "\narf12", 'string3' => '\n\r\t');
foreach($strings as $name => $testcase)
{
  if(ctype_space($testcase))
  {
    echo "La chaîne '$name' ne contient que des caractères d'espacements blancs.\n";
  }
  else 
  {
    echo "La chaîne '$name' ne contient pas que des catactères d'espacements blancs.\n";
  }
}