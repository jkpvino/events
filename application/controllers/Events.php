<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Events extends CI_Controller{
	var $data;
    public function __construct() {
        parent::__construct();        
        $this->load->helper('form');
        $this->load->library('form_validation');
        //$this->load->model('upload_model');
        $this->load->model('event_model');
        $this->data = $this->session->get_userdata();
    }

    function test(){
        $eventInfo = $this->event_model->getSymposiumInfoById(23);
        print_r($eventInfo->event_type);
        print_r($eventInfo);
        //$this->load->view('uploadci');
    }
 
 
    function do_upload(){
        $config['upload_path']="./assets/images";
        $config['allowed_types']='gif|jpg|png';
        $config['encrypt_name'] = TRUE;
         
        $this->load->library('upload',$config);
        if($this->upload->do_upload("file")){
            $data = array('upload_data' => $this->upload->data());
 
            $title= $this->input->post('title');
            $image= $data['upload_data']['file_name']; 
             
            //$result= $this->upload_model->save_upload($title,$image);
            //echo json_decode($result);
        }
 
     }
 

    public function ajaxupload()
    {
        $vars['class'] = '';
        $this->load->template('ajaxupload',$vars);
    }
    public function uploadEventLogo(){
        $vars['class'] = '';
        $this->load->template('upload',$vars);
    }

    public function save(){
        $userInfo = $this->data;
        $eventTypeId = 1;
        if($this->input->post('program_tab')){
            $catArray = array(
                'category_code' => $this->input->post('program_category'),
                'name_code' => $this->input->post('program_type'),
            );
            $eventTypeId = $this->event_model->getEventTypeId($catArray);
            $urlKey = strtolower(preg_replace('#[^0-9a-z]+#i', '-', $this->input->post('program_name')));
        
            $eventArray = array(
                'name' => $this->input->post('program_name'), 
                'url_key' => $urlKey,
                'event_from' => $this->input->post('program_start'), 
                'event_to' => $this->input->post('program_end'), 
                'description' => htmlentities($this->input->post('program_description')), 
                'address' => htmlentities($this->input->post('address')), 
                'contact_info' => htmlentities($this->input->post('contact_info')), 
                'event_type' => $eventTypeId, 
                'gmap_location' => $this->input->post('gmap_location'), 
                'allowed_users' => $this->input->post('allowed_users'), 
                'status' =>20,
                'user_id' => $userInfo['logged_in']['logid']
            );
            //print_r($eventArray);
            if($this->input->post('event_id')){
                $eventId = $this->input->post('event_id');
                $eventInsertId = $this->event_model->saveSymposium($eventArray, $eventId);
            }else{                
                $eventInsertId = $this->event_model->saveSymposium($eventArray);                
            }
            echo trim($eventInsertId);
        }
        if ($this->input->post('institution_tab')) {
            $institutionArray = array(
                'name' => $this->input->post('name'), 
                'description' => htmlentities($this->input->post('description')), 
                'website_url' => $this->input->post('website_url'), 
                'institution_category' => $this->input->post('institution_category'), 
                'country' => $this->input->post('country'), 
                'state' => $this->input->post('state'), 
                'city' => $this->input->post('city'), 
                'postal_code' => $this->input->post('postal_code'), 
                'address' => htmlentities($this->input->post('address')), 
                'facebook' => $this->input->post('facebook'), 
                'google' => $this->input->post('google'), 
                'twitter' => $this->input->post('twitter'), 
                'linkedin' => $this->input->post('linkedin'), 
            );
            if ($this->input->post('institution_id')) {
                $institutionId = trim($this->input->post('institution_id'));
                $institutionInsertId = $this->event_model->setInstitution($institutionArray, $institutionId);   
            }else{
                $institutionInsertId = $this->event_model->setInstitution($institutionArray);                
            }
            $eventId = trim($this->input->post('event_id'));
            $eventArray = array(
                'institution_id' => $institutionInsertId
            );
            $this->event_model->saveSymposium($eventArray, $eventId);
            echo trim($institutionInsertId);
        }
        if ($this->input->post('subevents_tab')) {
            $status = true;
            for ($i=0; $i < count($this->input->post('event_name')); $i++) {   
                $rowId = $this->input->post('id')[$i] ? $this->input->post('id')[$i] : 0 ;              
                $subEventsInfo = array(
                    'name' => $this->input->post('event_name')[$i], 
                    'description' => htmlentities($this->input->post('event_description')[$i]), 
                    'event_from' => $this->input->post('event_start')[$i], 
                    'event_to' => $this->input->post('event_end')[$i], 
                    'contact_us' => htmlentities($this->input->post('contact_us')[$i]), 
                    'sym_id' => $this->input->post('event_id'),  
                    'status' => 20, 
                );
                if($this->input->post('event_online_booking')){
                    $subEventsInfo['allowed_users'] = $this->input->post('slots_events')[$i] ? $this->input->post('slots_events')[$i] : 0;
                }
                $subEventsInfo['sym_id'] = 22;
                $subEventId = $this->event_model->saveSubEvents($subEventsInfo, $rowId);
                if (!$subEventId) {                    
                    $status = false;
                }                
            }
            $eventInfo = $this->event_model->getSymposiumInfoById(trim($this->input->post('event_id')));
            $eventType = $eventInfo->event_type;
            $url_key = $eventInfo->url_key;
            $eventCatg = $this->event_model->getEventType($eventType);
            if ($status) {                
                echo $url = 'event/'.$eventCatg->category.'-'.$eventCatg->name.'/'.$url_key;
            }else{
                echo $status;
            }
            
        }
        
    }
    
	public function index()
	{
        $vars['class'] = '';
        $vars['event_category'] = $this->event_model->getAllEventCategory();
        $vars['countries'] = $this->event_model->getCountries();    
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

    public function getEventTypes(){
        //$category_code = "school";
        $category_code = $this->input->post('category_code');
        $data = array();
        if($category_code){
            $response = $this->event_model->getEventTypeByCategory($category_code);
            echo json_encode($response);
        }
    }

    public function getStates(){
        //$category_code = "school";
        $countryId = $this->input->post('countryId');
        $data = array();
        if($countryId){
            $response = $this->event_model->getStates($countryId);
            echo json_encode($response);
        }
    }

    public function getCities(){
        $stateId = $this->input->post('stateId');
        $countryId = $this->input->post('countryId');
        $data = array();
        if($stateId & $countryId){
            $response = $this->event_model->getCities($stateId,$countryId);
            echo json_encode($response);
        }
    }
    public function upload(){
       // print_r($_FILES);exit;
        $dir = FCPATH.'assets/images/';
        if (move_uploaded_file($_FILES['banner']['tmp_name'], $dir."/banner/test.jpg")) {
          print "Uploaded successfully!";
       } else {
          print "Upload failed!";
       }
       if (move_uploaded_file($_FILES['logo']['tmp_name'], $dir."/logo/test.jpg")) {
          print "Uploaded successfully!";
       } else {
          print "Upload failed!";
       }
    }
    public function createEvent(){
        $userInfo = $this->data;
        if($userInfo['logged_in']['logid']){
            $vars['class'] = '';
            $vars['event_category'] = $this->event_model->getAllEventCategory();
            $vars['countries'] = $this->event_model->getCountries();
           // print_r($vars);exit;
            /*if(isset($_REQUEST['program_tab'])){
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
            }*/
            $this->load->template('newEvent',$vars);
            //print_r($_FILES);
        }else{
            redirect('/customer/account/login');
        }
        
    }
}
