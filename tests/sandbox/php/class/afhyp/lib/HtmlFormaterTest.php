<?php
require_once __DIR__."/../../../../../../sandbox/php/class/afhyp/lib/HtmlFormater.trait.php";
require_once __DIR__."/../../../../../../sandbox/php/class/afhyp/lib/TextFormater.trait.php";
require_once __DIR__."/../../../../../../sandbox/php/class/afhyp/lib/Writer.class.php";
require_once __DIR__."/../../../../../../sandbox/php/class/afhyp/lib/Mailer.class.php";
require_once __DIR__."/../../../../../../sandbox/php/class/afhyp/lib/Magicien.class.php";
require_once __DIR__."/../../../../../../sandbox/php/class/afhyp/lib/Person.class.php";
require_once __DIR__."/../../../../../../sandbox/php/class/afhyp/lib/IA.interface.php";
require_once __DIR__."/../../../../../../sandbox/php/class/afhyp/lib/SeekableIteratorArray.class.php";
class HtmlFormaterTest extends PHPUnit_Framework_TestCase
{
    private $_object1;
    private $_object2;
    private $_text1;
    private $_text2;
    protected function tearDown()
    {
        unset($this->_object1);
        unset($this->_object2);
        unset($this->_text1);
        unset($this->_text2);
    }

    protected function setUp()
    {
        $date = date('d-m-Y');
        $this->_text1 = "ceci est un texte\noui";
        $nl = nl2br($this->_text1);
        $this->_text2 = <<<EOT
<p>
Date : {$date}
</p>
<p>
{$nl}
</p>
EOT;
        $this->_object1 = new Writer();
        $this->_object2 = new Mailer();
    }
    public function testWriteAndSendByEMail()
    {
        $this->assertSame($this->_object1->write($this->_text1), $this->_text2);
        $this->assertSame($this->_object2->send($this->_text1), $this->_text2);
    }
    public function testReflexiveInstance()
    {
        $mag = new Magicien(array('nom'=>'greg', "type"=>'magicien'));
        $wrt = new ReflectionObject($mag);
        var_dump($wrt);
        if($wrt->hasProperty('magie'))
        {
            echo "la classe possède l'attribut \$magie";
        }
        else
        {
            echo "la classe ne possède pas l'attribut \$magie";   
        }
        if($wrt->hasConstant('PERSON_ENSORCELE'))
        {
            echo "la classe possède la constante PERSON_ENSORCELE";
        }
        else
        {
            echo "la classe ne possède pas  la constante PERSON_ENSORCELE";   
        }
        var_dump($wrt->getConstants());
        var_dump($wrt->getMethods());
        var_dump($wrt->getProperties());   
        var_dump($wrt->getParentClass());
        $classPerson = new ReflectionClass('Person');
        var_dump($classPerson->isAbstract());
        $ia = new ReflectionClass('IA');
        var_dump($ia->isInterface());
        $sa = new ReflectionClass("SeekableIteratorArray");
        var_dump($sa->getInterfaces());
        var_dump($sa->getInterfaceNames());
        $aMag = new ReflectionProperty('Magicien', '_id');
        var_dump($aMag);
    }
}