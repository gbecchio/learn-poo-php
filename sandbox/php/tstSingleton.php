<?php
class Singleton
{
    /**
     * Returns the *Singleton* instance of this class.
     *
     * @staticvar Singleton $instance The *Singleton* instances of this class.
     *
     * @return Singleton The *Singleton* instance.
     */
    public static function getInstance()
    {
        static $instance = null;
        echo "<br>début var_dump=>";
        var_dump($instance);
        echo "FIN<br>";
        echo "<br>";
        if (null === $instance) {
            $instance = new static();
        }

        return $instance;
    }

    /**
     * Protected constructor to prevent creating a new instance of the
     * *Singleton* via the `new` operator from outside of this class.
     */
    protected function __construct()
    {
    }

    /**
     * Private clone method to prevent cloning of the instance of the
     * *Singleton* instance.
     *
     * @return void
     */
    private function __clone()
    {
    }

    /**
     * Private unserialize method to prevent unserializing of the *Singleton*
     * instance.
     *
     * @return void
     */
    private function __wakeup()
    {
    }
}

class SingletonChild extends Singleton
{
}

$obj = Singleton::getInstance();
var_dump($obj === Singleton::getInstance());             // bool(true)

$anotherObj = SingletonChild::getInstance();
var_dump($anotherObj === Singleton::getInstance());      // bool(false)

var_dump($anotherObj === SingletonChild::getInstance()); // bool(true)
/*
The code above implements the singleton pattern using a static variable and the static creation method getInstance(). Note the following:

    The constructor __construct is declared as protected to prevent creating a new instance outside of the class via the new operator.
    The magic method __clone is declared as private to prevent cloning of an instance of the class via the clone operator.
    The magic method __wakeup is declared as private to prevent unserializing of an instance of the class via the global function unserialize().
    A new instance is created via late static binding in the static creation method getInstance() with the keyword static. This allows the subclassing of the class Singleton in the example.

The singleton pattern is useful when we need to make sure we only have a single instance of a class for the entire request lifecycle in a web application. This typically occurs when we have global objects (such as a Configuration class) or a shared resource (such as an event queue).

You should be wary when using the singleton pattern, as by its very nature it introduces global state into your application, reducing testability. In most cases, dependency injection can (and should) be used in place of a singleton class. Using dependency injection means that we do not introduce unnecessary coupling into the design of our application, as the object using the shared or global resource requires no knowledge of a concretely defined class.

    Singleton pattern on Wikipedia

Strategy

With the strategy pattern you encapsulate specific families of algorithms allowing the client class responsible for instantiating a particular algorithm to have no knowledge of the actual implementation. There are several variations on the strategy pattern, the simplest of which is outlined below:

This first code snippet outlines a family of algorithms; you may want a serialized array, some JSON or maybe just an array of data:
*/

interface OutputInterface
{
    public function load();
}

class SerializedArrayOutput implements OutputInterface
{
    public function load()
    {
        return serialize($arrayOfData);
    }
}

class JsonStringOutput implements OutputInterface
{
    public function load()
    {
        return json_encode($arrayOfData);
    }
}

class ArrayOutput implements OutputInterface
{
    public function load()
    {
        return $arrayOfData;
    }
}
