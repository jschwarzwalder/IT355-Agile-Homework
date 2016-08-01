<?php

use stats\Baseball;

class BaseballTest extends \PHPUnit_Framework_TestCase
{
    public function testCalculateAvgEquals()
    {
        $atbats = 389;
        $hits = 129;
        $baseball = new Baseball();
        $result = $baseball->calc_avg($atbats,$hits);
        $expectedresult = $hits/$atbats;
        $formatexpectedresult = number_format($hits/$atbats,3);
        $this->assertEquals($result,$formatexpectedresult); 
    //
    }
	
	public function testCalcHitsAreStrings(){
		$atbats = 389;
		$hits = 'wefwf';
		$baseball = new Baseball();
		$result = $baseball->calc_avg($atbats, $hits);
		$formatexpectedresult = 0.000;
		$this->assertEquals($formatexpectedresult, $result);
	}

    public function testMockObject()
    {
        $baseball = $this->getMock('Baseball', array('submitAtBat'));
        $baseball->expects($this->any())
            ->method('submitAtBat')
            ->will($this->returnValue(true));
        $result = $baseball->submitAtBat('1','bh'); // returns true
        $expected = true;
        $this->assertEquals($expected,$result);
    }

    public function testMockery(){
        //$mock->shouldReceive('somemethod')->atLeast()->once()->atMost()->twice()
        //->with(some arguments)->andReturn(new stdClass)

    }



}