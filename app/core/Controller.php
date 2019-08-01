<?php
class Controller{

	public function __construct()
	{
		require 'Database.php';
		$this->db = new Database();
	}

	protected function load_model($file='',$aliyas='')
	{
		if (is_array($file)) {
			if ($file) {
				foreach ($file as $file => $aliyas) {
					$this->createModelObject($file,$aliyas);
				}
			}
		}else{
			$this->createModelObject($file,$aliyas);
		}
	}

	public function createModelObject($file='',$aliyas='')
	{
		if ($this->file_exist('/models/'.$file.'.php')) {
			$this->load('/models/'.$file.'.php');
			if (!empty($aliyas)) {
				$this->$aliyas = $this->$file = new $file;
			}else{
				$this->$file = new $file;
			}
		}else{
			echo "Model Not found!";die;
		}
	}

	public function load_view($file='',$data=[])
	{
		if ($this->file_exist('/views/'.$file.'.php')) {
			$this->load('/views/'.$file.'.php',$data);
		}else{
			echo "File Not found!";die;
		}
	}

	public function load($file='',$data=[])
	{
		extract($data,EXTR_SKIP);
		require_once (realpath(__DIR__ . DIRECTORY_SEPARATOR . '..').$file);
	}

	public function file_exist($file='')
	{
		return file_exists(realpath(__DIR__ . DIRECTORY_SEPARATOR . '..').$file);
	}

}