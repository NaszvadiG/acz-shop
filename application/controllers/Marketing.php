<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Marketing extends MY_Controller {

	public function __construct()
	{
		parent::__construct();

		$this->user_is_logged_in('marketing');
	}

	public function index()
	{
		$this->load->view('marketing/index');
	}

	public function first_page_groups()
	{	
		$this->load->model('first_page_groups_model','fp_model');
		$groups = $this->fp_model->get_groups();
		$this->load->view('marketing/first_page_groups', [
				'groups' => $groups
			]);
	}

}