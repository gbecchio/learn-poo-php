<?php
error_reporting(0);
ini_set('error_reporting', E_ALL & ~E_STRICT);
/**
* @author Gregory Becchio
* @since 14/11/2013
* class sandbox_ApplicationSingleton
*/
class sandbox_ApplicationSingleton
{
    /**
    * @var count the number of tentative of création a new object
    */
    private static $count = 0;
    /**
    * @var cached reference to singleton instance
    */
        protected static $instance;
        
        /**
    * gets the instance via lazy initialization (created on first usage)
    *
    * @return self
    */
    public static function getAppInstance()
    {
        
        if (null === static::$instance)
        {
            static::$instance = new static();
        }
        self::$count = self::$count + 1;
        return static::$instance;
    }
    public static function getCount()
    {
        return self::$count;
    }

    /**
* is not allowed to call from outside: private!
*
*/
    private function __construct()
    {

    }

    /**
* prevent the instance from being cloned
*
* @return void
*/
    private function __clone()
    {

    }

    /**
* prevent from being unserialized
*
* @return void
*/
    private function __wakeup()
    {

    }
}
echo "<br>".sandbox_ApplicationSingleton::getCount()."<br>";
$app = sandbox_ApplicationSingleton::getAppInstance();
echo "<br>".$app->getCount()."<br>";
var_dump($app);
$app2 = sandbox_ApplicationSingleton::getAppInstance();
if($app == $app2)
{
    echo "<br>";
    echo "<br>";
    var_dump(gettype($app));
    echo "<br>";
    var_dump(get_class($app));
    echo "<br>";
    var_dump("les objets sont semblables");
    echo "<br>";
}
echo "<br>".sandbox_ApplicationSingleton::getCount()."<br>";
echo "<br>".sandbox_ApplicationSingleton::getCount()."<br>";
try
{
    // $app_not = new sandbox_ApplicationSingleton();  Fatal error
}
catch(Exception $e)
{
      var_dump($e);
}
var_dump("f");