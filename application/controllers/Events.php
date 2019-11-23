<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Events extends CI_Controller{
	
    public function __construct() {
        parent::__construct();
    }
    
	public function index()
	{
        $this->load->model('event_model');
        $vars['class'] = '';
        $vars['sympos'] = $this->event_model->get_symposium();
        $this->load->template('events',$vars);
	}
    public function event($event_type,$url_key){
         $this->load->model('event_model');
         $event_type_id = $this->event_model->getEventId($event_type);
         if($event_type_id){
             $event = $this->event_model->get_event_details($event_type_id,$url_key);             
             if($event){
                // $sym_id = $event[0]->id;
                 //$sub_event = $this->event_model->get_event($sym_id);
                 $vars['class'] = 'page-course-detail';
                 $vars['event'] = $event; 
                // $vars['sub_event'] = $sub_event;
                $this->load->template('event',$vars);
            }else{
                echo '404';   
            }
        }else{
            echo '404';
        }
    }

  
}
