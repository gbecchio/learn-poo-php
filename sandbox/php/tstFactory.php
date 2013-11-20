<?php
class Automobile
{
  private $vehicle_make;
  private $vehicle_model;

  public function __construct($make, $model)
  {
      $this->vehicle_make  = $make;
      $this->vehicle_model = $model;
  }

  public function get_make_and_model()
  {
      return $this->vehicle_make . ' ' . $this->vehicle_model;
  }
}

class AutomobileFactory
{
  public static function create($make, $model)
  {
      return new Automobile($make, $model);
  }
}
// have the factory create the Automobile object
$veyron = AutomobileFactory::create('Bugatti', 'Veyron');
print_r($veyron->get_make_and_model()); // outputs "Bugatti Veyron"

class Factory
{
  public static function build($type)
  {
      $class = 'Format' . $type;
      if (!class_exists($class)) {
          throw new Exception('Missing format class.');
      }
      return new $class;
  }
}
class FormatString
{
  public function __construct()
  {
    echo "<br />this is String Format === <br /><br />";
  }
};
class FormatNumber
{

  public function __construct()
  {
    echo "<br />this is Number Format === <br /><br />";
  }
};
try
{
  $string = Factory::build('String');
}
catch (Exception $e)
{
  echo $e->getMessage();
}
try
{
  $number = Factory::build('Number');
}
catch(Exception $e)
{
  echo $e->getMessage();
}