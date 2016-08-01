<?php


class App {
	
	protected $controller= 'home';
	
	protected $method = 'index';
	
	protected $params = [];
	
	public function __construct() {
		// echo 'Hello!';
		$url = $this->parseUrl();
		//print_r($url);
		
		if(file_exists('../app/controllers/'. $url[0]. '.php')) {
			$this->controller = $url[0];
			unset($url[0]);
		}
		
		require_once '../app/controllers/'. $this->controller . '.php';
		
		//echo $this->controller;
		
		$this->controller = new $this->controller;
		
		//var_dump($this->controller);
		
		if (isset($url[1])){
			
			if(method_exists($this->controller, $url[1])){
				//echo 'OK';
				
				$this->method = $url[1];
				unset($url[1]);
			}
			
		}
		
		//print_r('\n'. $url);
		$this->params = $url ? array_values($url) : [];
		
		//print_r($this->params)
		
		call_user_func_array([$this->controller, $this->method], $this->params);
		
	}
	
	public function parseUrl() {
		if (isset($_GET['url'])) {
			// echo $_GET['url'];
			
			return $url = explode('/', filter_var(rtrim($_GET['url'], '/'), FILTER_SANITIZE_URL));
			
		}
	}
	
	
}

?>