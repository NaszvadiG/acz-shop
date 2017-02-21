<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends MY_Controller {


	public function __construct()
	{
		parent::__construct();

		$this->user_is_logged_in('dashboard');
	}

	public function index()
	{
		$this->load->view('dashboard/index');
	}
}
