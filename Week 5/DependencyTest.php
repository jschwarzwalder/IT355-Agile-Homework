<?php
namespace stats\Test;

use stats\Baseball;

class BaseballTest extends \PHPUnit_Framework_TestCase
{
   
//because OPS is sum total of on base percentage plus sluggin average, we can use the depends annotation 
 

//because OPS is sum total of on base percentage plus sluggin average, we can use the depends annotation 
    public function testSlugging() {
		$baseball = new Baseball();
        $slg = $baseball>calc_slg(389,106,12,4,7);
        $expectedslg = number_format(((106*1)+(12*2)+(4*3)+(7*4))/389, 3);
        $this->assertEquals($expectedslg,$slg);
        return $slg;
    }

    public function testOnBasePerc() {
		$baseball = new Baseball();
        $obp = $baseball->calc_obp(389,23,6,7,129);
        $expectedobp =  number_format((129 + 23 + 6 + 7) / 389,3);
        $this->assertEquals($expectedobp,$obp);
        return $obp;
    }

  

    /**
     * @depends testSlugging
     * @depends testOnBasePerc
     */
    public function testOps($obp, $slg) {
		$baseball = new Baseball();
        $ops = $baseball->calc_ops($obp,$slg);
        $expectedops = $obp + $slg;
        $this->assertEquals($expectedops,$ops);
    } 


 }  