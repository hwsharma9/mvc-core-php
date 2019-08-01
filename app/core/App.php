<?php
class App
{
	protected $controller = 'home';
	protected $method = 'index';
	protected $params = [];

	function __construct()
	{
		$url = $this->parseUrl();
		if ($url[0] === 'index.php') {
			$this->controller = ucfirst($this->controller);
			require_once (realpath(__DIR__ . DIRECTORY_SEPARATOR . '..').'/controllers/'.ucfirst($this->controller).'.php');
			$this->controller = new $this->controller;
			$this->method = $this->method;
			$url = [];
		}else{
			if (file_exists(realpath(__DIR__ . DIRECTORY_SEPARATOR . '..').'/controllers/'.ucfirst($url[0]).'.php')) {
				$this->controller = $url[0];
			}else{
				echo $url[0]." controller not found!";die;
			}
			require_once (realpath(__DIR__ . DIRECTORY_SEPARATOR . '..').'/controllers/'.ucfirst($this->controller).'.php');
			$this->controller = new $this->controller;
			if (isset($url[1])) {
				if (method_exists($this->controller,$url[1])) {
					$this->method=$url[1];
					unset($url[0]);
					unset($url[1]);
				}else{
					echo $url[1]." method in ".$url[0]." controller not found.";die;
				}
			}else{
				$this->method = '';
			}
			unset($_GET['url']);
		}

		$this->params = $url? array_values($url):[];
		if ($this->method) {
			call_user_func_array([$this->controller,$this->method], $this->params);
		}
	}

	public function parseUrl()
	{
		if (isset($_GET['url'])) {
			return explode('/',filter_var(rtrim($_GET['url'],'/'),FILTER_SANITIZE_URL));
		}
	}
}

?>
