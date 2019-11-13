<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Index extends CI_Controller{
	
    public function __construct() {
        parent::__construct();
    }
    
	public function index()
	{
        $this->load->model('event_model');
        $vars['sympos'] = $this->event_model->get_symposium();
        //$vars['test'] = 'we';print_r($vars);exit;
        $this->load->template('home',$vars);
	}

  
}
