<?php
namespace id;
include 'Container.php';
use \id\Container;
$container = new Container(array
  (
    'user.class' => 'id\User',
    'user.storage.class' => 'id\SessionStorage',
    'user.storage.cookie_name' =>'ID_SESSION'
  )
);
echo "<pre>";
var_dump($container);
var_dump($container->getUser());
echo "</pre>";