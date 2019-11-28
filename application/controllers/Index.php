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

   
    public function newevent(){        
        $vars['class'] = '';
        $this->load->template('create_account',$vars);
    }

  
}
