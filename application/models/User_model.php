<?php

class User_model extends CI_Model{

	public function __construct()
	{
		parent::__construct();
	}

	public function create_user()
	{
		
		$data = [
			'email' => 'user@domain.com',
			'password' => password_hash('password',PASSWORD_DEFAULT)
		];

		// $this->db->insert('users',$data);
	}

	public function check_credentials($email,$password)
	{
		$this->db->where('email',$email);
		$result = $this->db->get('users')->row_array();
		$password_hash = $result['password'];

		if( password_verify($password,$password_hash) )
		{
			return true;
		}else
		{
			return false;
		}

	}

}