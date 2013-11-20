<?php
require_once __DIR__.'/Pimple-master/lib/Pimple.php';
$container = new Pimple();
$container['user.class']         = 'id\User';
$container['user.storage.class'] = 'id\SessionStorage';
$container['user.storage.cookie_name']  = 'SESSION_ID';

$container['random'] = $container->protect(function(){ return rand(); });

$container['user'] = function($c){
    return new $c['user.class']($c['user.storage']);
};
$container['user.storage'] = function($c){
    return new $c['user.storage.class']($c['user.storage.cookie_name']);
};

$user = $container['user'];
echo "<pre>";
print_r($user);
echo "</pre>";