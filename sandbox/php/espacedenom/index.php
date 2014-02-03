<?php
include_once('includes.php');
use A\B\C\D\E\F\MaClasse as M;
echo '<br /><br /><br />';
echo __NAMESPACE__;
$m = new M();
$m->hello();