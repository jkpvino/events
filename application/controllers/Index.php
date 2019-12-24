<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Index extends CI_Controller{
	
    public function __construct() {
        parent::__construct();     
        $this->load->helper('form');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $logged_info = isset($this->session->userdata['logged_in']) ? $this->session->userdata['logged_in'] : array();
        $this->load->model('event_model');
        $vars['class'] = '';
        $vars['logged_info'] = $logged_info;
        $vars['sympos'] = $this->event_model->get_symposium();
        $this->load->template('home',$vars);
    }

   
    public function newevent(){        
        $vars['class'] = '';
        $this->load->template('create_account',$vars);
    }

  
}
