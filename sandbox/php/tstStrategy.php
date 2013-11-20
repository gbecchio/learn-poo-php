<?php
error_reporting(0);
ini_set('error_reporting', E_ALL & ~E_STRICT);
global $arrayOfData;
$arrayOfData = array(1,2,3);
interface OutputInterface
{
    public function load();
}

class SerializedArrayOutput implements OutputInterface
{
    public function load()
    {
        global $arrayOfData;
        return serialize($arrayOfData);
    }
}

class JsonStringOutput implements OutputInterface
{
    public function load()
    {
        global $arrayOfData;
        return json_encode($arrayOfData);
    }
}

class ArrayOutput implements OutputInterface
{
    public function load()
    {
        global $arrayOfData;
        return $arrayOfData;
    }
}
class SomeClient
{
    private $output;

    public function setOutput(OutputInterface $outputType)
    {
        $this->output = $outputType;
    }

    public function loadOutput()
    {
        return $this->output->load();
    }
}


$client = new SomeClient();

// Want an array?
$client->setOutput(new ArrayOutput());
$data = $client->loadOutput();
var_dump($data);

// Want some JSON?
$client->setOutput(new JsonStringOutput());
$data = $client->loadOutput();
var_dump($data);