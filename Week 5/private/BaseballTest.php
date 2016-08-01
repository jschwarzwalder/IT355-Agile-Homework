<?php
namespace stats\Test;

use stats\Baseball;

class BaseballTest extends \PHPUnit_Framework_TestCase
{

    public function setUp()
    {
    $this->instance = new Baseball();
    }
    //tear down method
    public function tearDown()
    {
    unset($this->instance);
    }

	// //even though the dependet methods are inaccessible as private methods,
	// //we can access the two private functions by calling the public method
	// //that depends on the 2 private methods...but there is a better way called a reflection class
	public function testOps(){
		$obp = .363;
		$slg = .469;
		$ops = $this->instance->calc_ops($obp, $slg);
		$expectedops = $obp + $slg;
		$this->assertEquals($expectedops, $ops);
	}
	
	/**
	* Call protected/private method of a class
	*
	* @param object &$object	Instantiated object that we will run method on.
	* @param string $methodName	Method name to call
	* @param array  $paramaters Array of parameters to pass into method.
	*
	* @return mixed Method return.
	*/
	
	//PHPUnit relies heavily on reflection, as do other mocking frameworks.
	//available in version >= 5.3.2
	//accessing a private method with a reflection class
	public function invokeMethod(&$object, $methodName, array $parameters = array())
	{
		$reflection = new \ReflectionClass(get_class($object));
		$method = $reflection->getMethod($methodName);
		$method->setAccessible(true);
		return $method->invokeArgs($object, $parameters);
	}
	
	public function testcalcAvg()
	{
		$avg = number_format(129/369, 3);
		$this->assertEquals($avg, $this->invokeMethod($this->instance, 'calc_avg', array(369, 129)));
	}
	
	
}