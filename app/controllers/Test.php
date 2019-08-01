<?php
class Test extends Controller{

	public function index()
	{
		$this->load_view('header',array('head_title'=>'Test File working fine'));
		$data['name'] = 'harsh';
		$data['email'] = 'hw.sharma9@gmail.com';
		$data['hobbies'] = array('chess','tt');
		$this->load_view('test',$data);
	}

}

/* End of file test.php */
/* Location: .//var/www/html/test/oop/app/controllers/test.php */