<?php
require_once __DIR__.'/Pimple-master/lib/Pimple.php';
$container = new Pimple();
$container['cookie_name'] = 'SESSION_ID';
$container['session_storage_class'] = 'SessionStorage';
$container['session_storage'] = function ($c) {
    return new $c['session_storage_class']($c['cookie_name']);
};
$container['session'] = function ($c) {
    return new Session($c['session_storage']);
};

$session = $container['session'];
echo "<pre>";
print_r($session);
echo "</pre>";