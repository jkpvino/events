<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Index extends CI_Controller{
	
    public function __construct() {
        parent::__construct();
    }

public function index()
{
    $this->load->model('event_model');
    $vars['class'] = '';
    $vars['sympos'] = $this->event_model->get_symposium();
    $this->load->template('home',$vars);
}

    public function event()
    {
        $vars['class'] = 'page-course-detail';
        $this->load->template('event',$vars);
    }

    public function register()
    {
        $vars['class'] = '';
        $this->load->template('register',$vars);
    }

    public function login()
    {
        $vars['class'] = '';
        $this->load->template('login',$vars);
    }

  
}
