<?php
class Database{

	public function __construct()
	{
	}

	public function insert($table='',$data=array())
	{
		echo "<pre> DB insert";
		print_r ($table);
		print_r ($data);
		echo "</pre>";
	}

}

/* End of file Database.php */
/* Location: .//var/www/html/test/oop/app/core/Database.php */