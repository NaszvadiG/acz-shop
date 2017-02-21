<?php


class MY_Controller extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('settings_model');
        $_SESSION['website_settings'] = $this->settings_model->get();
    }

    // check if a user is loggedin or not
    public function user_is_logged_in($referrer)
	{
		if( isset($_SESSION['user']) && ($_SESSION['user']['loggedIn'] == true) )
		{
			return true;
		}else
		{
			// user is a guest
			$_SESSION['login_referrer'] = $referrer;
			redirect('user/login');
			die;
		}

	}
}