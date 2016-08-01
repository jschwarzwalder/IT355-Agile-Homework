<?php

class Home extends Controller {
	public function index( $name = '' ){ //, $otherName = ''
		//echo 'home/index';
		//echo $name. ' '. $otherName;
		
		$user = $this -> model ('User');
		$user-> name = $name; //'Alexia';
		//echo $user-> name ;
		
		$this ->view('home/index', ['name' => $user->name]);
		
	}
	
	public function test() {
		echo 'test';
	}
}
	
	?>