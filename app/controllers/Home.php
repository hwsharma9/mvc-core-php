<?php
class Home extends Controller{

	public function __construct()
	{
		parent::__construct();
		$this->load_model(array('Welcome_Model'=>'welcome'));
	}

	public function index()
	{
		$this->load_view('welcome', array('name'=>"harsh","names"=>array("harsh","raj","deep")));
	}

	public function test()
	{
		echo "<h1>home controller test function called.</h1>";
	}

	public function submit()
	{
		$this->welcome->testModel($_POST);
	}
}