<?php
namespace id;
include "User.php";
include "SessionStorage.php";

/**
* @author Grégroy Becchio
* @since 20/11/2013
* @version 0.1
* classe conteneur
**/
use id\User;
use id\SessionStorage;
class Container
{
    protected $parameters;
    public function __construct(array $parameters)
    {
      $this->parameters = $parameters;
    }
    public function getUser()
    {
        static $instance;
        if (!isset($instance))
        {
            $className = $this->parameters['user.class'];
            $instance = new $className($this->getUserStorage());
        }

        return $instance;
    }

    public function getUserStorage()
    {
        static $instance;
        if (!isset($instance))
        {
            $className = $this->parameters['user.storage.class'];
            var_dump($className);
            $instance = new $className($this->parameters['user.storage.cookie_name']);
        }

        return $instance;
    }
}

