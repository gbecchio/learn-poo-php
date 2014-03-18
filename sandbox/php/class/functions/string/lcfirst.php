<?php
echo "<pre>";
$foo = 'HelloWorld';
echo "$foo"."<br />";
$foo = lcfirst($foo);             // helloWorld
echo "$foo"."<br />";
$bar = 'HELLO WORLD!';
echo "$bar"."<br />";
$bar = lcfirst($bar);             // hELLO WORLD!
echo "$bar"."<br />";
$bar = lcfirst(strtoupper($bar)); // hELLO WORLD!
echo "$bar"."<br />";
echo "</pre>";