<?php


class MY_Controller extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('settings_model');
        $_SESSION['website_settings'] = $this->settings_model->get();
    }
}