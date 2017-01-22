<?php

class Test extends CI_Controller{

	public function __construct()
	{
		parent::__construct();
	}

	public function test()
	{
		$this->load->model('category_model');
		$category = $this->category_model->get_categories();
		echo "<pre>";
		print_r($category);
	}

}