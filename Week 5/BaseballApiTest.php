<?php
namespace stats\Test;

use stats\BaseballApi;

class BaseballApiTest extends \PHPUnit_Framework_TestCase
{
    public function test_MockObject()
    {
       $baseball = $this->getMock('BaseballApi', array('submitAtBat'));
	   print_r(get_class_methods($baseball));
	   $baseball->expects($this->any())
		->method('submitAtBat')
		->will($this->returnValue(true));
	   $baseball->submitAtBat('1', 'bh');
    }
	
}

?>