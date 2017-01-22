<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class FirstPage extends MY_Controller {


	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$this->load->model('category_model');
		$categories = $this->category_model->get_categories();

		$this->load->view('first_page/index', [
			'categories' => $categories
			]);
	}
}
