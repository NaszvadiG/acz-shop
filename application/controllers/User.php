<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	

	public function login()
	{
		$this->load->helper('form');
		$this->load->library('form_validation');

		$this->form_validation->set_rules('email', 'Email', 'required|valid_email');
		$this->form_validation->set_rules('password', 'Password', 'required');
		if ($this->form_validation->run() == FALSE)
		{
			$this->load->view('users/login');
		}else
		{
			$this->load->model('user_model');
			if( $this->user_model->check_credentials($this->input->post('email'),$this->input->post('password')) )
			{
				// login ok :)
				$_SESSION['user']['loggedIn'] = true;
				unset($_SESSION['login_referrer']);
				redirect($this->input->post('referrer'));
			}else
			{
				// incorrect credentials
				$this->load->view('users/login',['error'=>'Invalid credentials.']);
			}
		}
	}

	public function logout()
	{
		$_SESSION['user']['loggedIn'] = false;
		redirect();
	}

	public function index()
	{
		$this->user_is_logged_in('user');

		$this->load->view('users/index');
	}



}