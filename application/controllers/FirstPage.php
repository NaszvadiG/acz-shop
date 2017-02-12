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

		$this->load->model('first_page_groups_model','fp_model');
		$groups = $this->fp_model->get_groups();

		$this->load->view('first_page/index', [
				'categories' => $categories,
				'groups' => $groups
			]);
	}
}
