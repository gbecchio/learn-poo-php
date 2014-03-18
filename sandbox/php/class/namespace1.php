<?php
namespace test;
define('test\HELLO', 'Hello world!');
define(__NAMESPACE__ . '\GOODBYE', 'Goodbye cruel world!');
define('GOODBYE', 'Kouraphant');
echo(\GOODBYE);
echo(GOODBYE);
echo(HELLO);