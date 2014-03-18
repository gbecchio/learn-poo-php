<?php
// page1.php
session_start();
session_save_path("tmp/greg");
echo 'Bienvenue à la page numéro 1';
$_SESSION['favcolor'] = 'green';
$_SESSION['animal']   = 'cat';
$_SESSION['time']     = time();
// Fonctionne si le cookie a été accepté
echo '<br /><a href="session_page2.php">page 2</a>';
// Ou bien, en indiquant explicitement l'identfiant de session
var_dump($_SESSION);
var_dump(session_name());
var_dump(session_id());
var_dump(session_save_path("tmp/greg"));
echo '<br /><a href="session_page2.php?' . session_id() . '">page 2</a>';