<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Events extends CI_Controller{
	var $data;
    public function __construct() {
        parent::__construct();        
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->model('event_model');
        $this->data = $this->session->get_userdata();
    }

    public function save(){
        $userInfo = $this->data;
        $eventTypeId = 1;
        if($this->input->post('program_tab')){
            $eventArray = array(
                'name' => $this->input->post('program_name'), 
                'event_from' => $this->input->post('program_start'), 
                'event_to' => $this->input->post('program_end'), 
                'description' => $this->input->post('program_description'), 
                'address' => $this->input->post('address'), 
                'contact_info' => $this->input->post('contact_info'), 
                //'program_category' => $this->input->post('program_category'), 
                'event_type' => $eventTypeId, 
                'gmap_location' => $this->input->post('gmap_location'), 
                'allowed_users' => $this->input->post('allowed_users'), 
                'status' =>20,
                'user_id' => $userInfo['logged_in']['logid']
            );
            if($this->input->post('event_id')){
                $eventInsertId = $this->event_model->updateSymposium($eventArray, $eventId);
            }else{                
                $eventInsertId = $this->event_model->setSymposium($eventArray);                
            }
            if ($eventInsertId) {
                return $eventInsertId;
            }else{
                return false;
            }
        }
        
    }
    
	public function index()
	{
        $vars['class'] = '';
        $vars['sympos'] = $this->event_model->get_symposium();
        $this->load->template('events',$vars);
	}
    public function event($event_type,$url_key){
         //$this->load->model('event_model');
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

    public function createEvent(){
        print_r($_REQUEST);
        $userInfo = $this->data;
        if($userInfo['logged_in']['logid']){
            $vars['class'] = '';
            if(isset($_REQUEST['program_tab'])){
                $this->form_validation->set_rules('program_name', 'Event Title', 'required');
                $this->form_validation->set_rules('program_start', 'Event Start Date', 'required');
                $this->form_validation->set_rules('program_end', 'Event End Date', 'required');
                $this->form_validation->set_rules('program_description', 'Event description', 'required');
                $this->form_validation->set_rules('address', 'Address', 'required');
                $this->form_validation->set_rules('contact_info', 'Contact Info', 'required');
                $this->form_validation->set_rules('program_category', 'Event Category', 'required');
                $this->form_validation->set_rules('program_type', 'Event Type', 'required');
                $this->form_validation->set_rules('gmap_location', 'Gmap Location', 'required');
                $this->form_validation->set_rules('online_booking', 'Online Booking', 'required');
                if ($this->form_validation->run() == FALSE){

                }else{
                    $eventArray = array(
                        'name' => $_REQUEST['program_name'], 
                        'event_from' => $_REQUEST['program_start'], 
                        'event_to' => $_REQUEST['program_end'], 
                        'description' => $_REQUEST['program_description'], 
                        'address' => $_REQUEST['address'], 
                        'contact_info' => $_REQUEST['contact_info'], 
                        'program_category' => $_REQUEST['program_category'], 
                        'event_type' => $_REQUEST['program_type'], 
                        'gmap_location' => $_REQUEST['gmap_location'], 
                        'allowed_users' => $_REQUEST['allowed_users'], 
                        'status' =>20,
                        'user_id' => $userInfo['logid']
                    );
                    $this->event_model->setSymposium();
                }
            }
            $this->load->template('newEvent',$vars);
            print_r($_FILES);
        }else{
            redirect('/index');
        }
        
    }
}
