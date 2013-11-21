<?php
namespace id;
/**
* @author Grégroy Becchio
* @since 20/11/2013
* @version 0.1
* classe SessionStorage
**/
class SessionStorage
{
    function __construct($cookieName = 'PHP_SESS_ID')
    {
        session_name($cookieName);
        session_start();
    }
 
    function set($key, $value)
    {
        $_SESSION[$key] = $value;
    }
 
    function get($key)
    {
        return $_SESSION[$key];
    }
}