<?php
namespace Foo\Bar;
class Classname
{
	function __construct()
	{
		echo __NAMESPACE__."Another".__file__.__class__."<br />";
	}
}
use FOO\Bar\Classname as a;
include 'namespace_file1.php';

const FOO = 2;
function foo() {}
class foo
{
    static function methodestatique() {}
}

/* nom non qualifié */
foo(); // Devient Foo\Bar\foo
foo::methodestatique(); // Devient Foo\Bar\foo, méthode methodestatique
echo FOO; // Devient la constante Foo\Bar\FOO
include 'namespace_file3.php';
/* nom qualifié */
sousespacedenoms\foo(); // Devient la fonction Foo\Bar\sousespacedenoms\foo
sousespacedenoms\foo::methodestatique(); // devient la classe Foo\Bar\sousespacedenoms\foo,
                                  // méthode methodestatique
echo sousespacedenoms\FOO; // Devient la constante Foo\Bar\sousespacedenoms\FOO
                                  
/* nom absolu */
\Foo\Bar\foo(); // Devient la fonction Foo\Bar\foo
\Foo\Bar\foo::methodestatique(); // Devient la classe Foo\Bar\foo, méthode methodestatique
echo \Foo\Bar\FOO; // Devient la constante Foo\Bar\FOO
echo \Foo\Bar\sousespacedenoms\FOO; // Devient la constante Foo\Bar\FOO
include 'namespace_file4.php';
use My\Full\Classname as classname2, My\Full\NSname, My\Full\Classname as another;

$obj = new Classname; // instantie un objet de la classe My\Full\Classname
$obj = new a;
$obj = new Another;
$obj = new classname;
echo "<pre>";
var_dump(get_loaded_extensions());
echo "</ pre>";
phpinfo();