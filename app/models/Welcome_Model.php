<?php
class Welcome_Model{

	public function testModel($post=array())
	{
		echo "<pre>";
		print_r ($post);
		echo "</pre>";
		echo "Welcome Model function";
	}

}
