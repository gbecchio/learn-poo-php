<?php
namespace Tao
{
	include_once(__DIR__.'/tao/classes/phpHandler.php');
	include_once(__DIR__.'/tao/functions.php');
	function strlen($word)
	{
		return 'hello on rentre du boulot';
	}
	echo strlen('coucou');
	echo \strlen('coucou');
}
namespace // Le code contenu dans ce namespace fera partie du namespace global.
{
    echo strlen('Hello world !');
    echo __NAMESPACE__;
}
namespace A
{
    echo __NAMESPACE__;
}

namespace B
{
	echo __NAMESPACE__;
}
namespace A\B
{
    echo __NAMESPACE__;
}
namespace _1\_2
{
    function getNamespace()
    {
        echo __NAMESPACE__;
    }
}

namespace _1
{
    _2\getNamespace(); // Appel de façon relative.
    \_1\_2\getNamespace(); // Appel de façon absolue.
}
namespace A11
{
	echo strlen('Hello world !'); // Appel relatif, élément non qualifié.
    //echo namespace\strlen('Hello world !'); // Appel relatif, élément qualifié. Résultat : erreur fatale car fonction inexistante.
}
namespace a\a\a\a\a
{
	echo strlen('Hello world !'); // Appel relatif, élément non qualifié.
	echo __NAMESPACE__;
    //echo namespace\strlen('Hello world !'); // Appel relatif, élément qualifié. Résultat : erreur fatale car fonction inexistante.
}
namespace A\B\C\D\E\F
{    
	class MaClasse
	{
    	public function hello()
    	{
       		echo 'Hello world !';
    	}
	}
}
