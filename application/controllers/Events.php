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
                'gmap_location' => $this->input->post('gmap_location'), 
                'website' => $this->input->post('program_website'), 
                'event_from' => $this->input->post('program_start'), 
                'event_to' => $this->input->post('program_end'), 
                'description' => htmlentities($this->input->post('program_description')), 
                'address' => htmlentities($this->input->post('address')), 
                'contact_info' => htmlentities($this->input->post('contact_info')), 
                'event_type' => $eventTypeId, 
                'allowed_users' => $this->input->post('allowed_users'), 
                'status' =>20,
                'user_id' => $userInfo['logged_in']['logid']
            );
            //print_r($eventArray);
            if($this->input->post('event_id')){
                $eventId = trim($this->input->post('event_id'));
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
                    'sym_id' => trim($this->input->post('event_id')),  
                    'status' => 20, 
                );
                if($this->input->post('event_online_booking')){
                    $subEventsInfo['allowed_users'] = $this->input->post('slots_events')[$i] ? $this->input->post('slots_events')[$i] : 0;
                }
                //$subEventsInfo['sym_id'] = 22;
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
        $status = true; $message = '';      
        if($this->input->post('event_id')){            
            $eventInfo = $this->event_model->getSymposiumInfoById(trim($this->input->post('event_id')));
            $eventType = $eventInfo->event_type;
            $url_key = $eventInfo->url_key ? trim($eventInfo->url_key) : time();
            $dir = FCPATH.'assets/images/';
            $acceptable = array(
                'image/jpeg',
                'image/jpg',
                'image/gif',
                'image/png'
            );
            $logoerrors = array();
            if(isset($_FILES['logo'])){ 
                $logoNameInfo = explode('.', $_FILES['logo']['name']);
                $logoNameInfo = end($logoNameInfo);
                $logosize = @getimagesize($_FILES["logo"]["tmp_name"]);    
                //echo "<pre>"    ; print_r($logosize); echo "</pre>";
                if((!in_array($_FILES['logo']['type'], $acceptable)) && (!empty($_FILES["logo"]["type"]))) {
                    $message .= 'Invalid file type. Only PDF, JPG, GIF and PNG types are accepted.<br/> '; $status = false;
                }
                if(($logosize[0] != $logosize[1])  || ($logosize[0] != 165) ){
                    $message .= 'Logo Size Should be 165 X 165 Dimension.<br/> '; $status = false;
                }
                if($status  == true){
                    if (move_uploaded_file($_FILES['logo']['tmp_name'], $dir."/logo/".$url_key.".".$logoNameInfo)) {
                        $eventId = trim($this->input->post('event_id'));
                        $eventArray = array(
                            'logo' => $url_key.'.'.$logoNameInfo
                        );
                        $eventInsertId = $this->event_model->saveSymposium($eventArray, $eventId);
                      $message .= "Logo Uploaded successfully!<br/> ";
                    } else {
                      $message .= "Logo Upload failed!<br/> "; $status = false;
                    }
                }
            }


            $bannererrors = array();
            if(isset($_FILES['banner'])){ 
                $bannersize = @getimagesize($_FILES["banner"]["tmp_name"]);  
                $bannerInfo = explode('.', $_FILES['banner']['name']);
                $bannerNameInfo = end($bannerInfo);      
                $maxsize    = 2097152;
                if((!in_array($_FILES['banner']['type'], $acceptable)) && (!empty($_FILES["banner"]["type"]))) {
                    //$bannererrors[] = 'Invalid file type. Only PDF, JPG, GIF and PNG types are accepted.';
                    $message .= "Invalid file type. Only PDF, JPG, GIF and PNG types are accepted.<br/> "; $status = false;
                }
                if(($bannersize[0] != 1920)  || ($bannersize[1] != 684) ){
                    //$bannererrors[] = 'Banner Size Should be 1920 X 684 Dimension.';
                    $message .= "Banner Size Should be 1920 X 684 Dimension.<br/> "; $status = false;
                }
                if($status == true){
                    if (move_uploaded_file($_FILES['banner']['tmp_name'], $dir."/banner/".$url_key.".".$bannerNameInfo)) {
                        //print "Banner Uploaded successfully!";
                        $eventId = trim($this->input->post('event_id'));
                        $eventArray = array(
                            'banner' => $url_key.'.'.$bannerNameInfo
                        );
                        $eventInsertId = $this->event_model->saveSymposium($eventArray, $eventId);
                        $message .= "Banner Uploaded successfully!<br/> ";
                    } else {
                        //$bannererrors[] = "Banner Upload failed!";
                        $status = false;
                        $message .= "Banner Upload failed!<br/> ";
                    }
                }                 
            }

        }else{
            $status = false;
            $message = "Something Went Wrong....<br/> ";
        }
        
        $response  = array(
            'status' => $status, 
            'Message' => $message, 
        );
        echo json_encode($response);
        
       
    }
    public function createEvent(){
        $institutionTab = array(
            'institution_id' => set_value('institution_id'), 
            'name' => set_value('name'), 
            'institution_category' => set_value('institution_category'), 
            'website_url' => set_value('website_url'), 
            'description' => set_value('description'), 
            'country' => set_value('country'), 
            'state' => set_value('state'), 
            'city' => set_value('city'), 
            'postal_code' => set_value('postal_code'), 
            'address' => set_value('address'), 
            'facebook' => set_value('facebook'), 
            'google' => set_value('google'), 
            'twitter' => set_value('twitter'), 
            'linkedin' => set_value('linkedin'), 
        );

        $programTab = array(
            'event_id' => set_value('event_id'), 
            'program_name' => set_value('program_name'), 
            'program_start' => set_value('program_start'), 
            'program_end' => set_value('program_end'),
            'program_description' => set_value('program_description'),
            'address' => set_value('address'),
            'contact_info' => set_value('contact_info'),
            'program_category' => set_value('program_category'),
            'program_type' => set_value('program_type'), 
            'gmap_location' => set_value('gmap_location'), 
            'program_website' => set_value('program_website'), 
            'online_booking' => set_value('online_booking'), 
            'allowed_users' => set_value('allowed_users'), 
            'logo' => '', 
            'banner' => '', 
        );
        $urlKey = $vars['event_type'] = $vars['states'] = $vars['cities'] = $vars['sub_events'] = '';
        if(end($this->uri->segments) != $this->router->fetch_method()){
            $urlKey = end($this->uri->segments);
            $symInfo = $this->event_model->getSymposiumInfoByUrlKey($urlKey);
            if (isset($symInfo->id)) {

                $eventType = $symInfo->event_type;
                if($eventType){
                    $eventTypeInfo = $this->event_model->getEventType($eventType);
                    $programCategory = $eventTypeInfo->category_code;
                    $programType = $eventTypeInfo->name_code;
                }
                $programTab = array(
                    'event_id' => $symInfo->id, 
                    'program_name' => $symInfo->name, 
                    'program_start' => $symInfo->event_from, 
                    'program_end' => $symInfo->event_to, 
                    'program_description' => $symInfo->description, 
                    'address' => $symInfo->address, 
                    'contact_info' => $symInfo->contact_info, 
                    'program_category' => $programCategory, 
                    'program_type' => $programType, 
                    'gmap_location' => $symInfo->gmap_location, 
                    'program_website' => $symInfo->website, 
                    'online_booking' => 0, 
                    'allowed_users' => $symInfo->allowed_users, 
                    'logo' => $symInfo->logo, 
                    'banner' => $symInfo->banner, 
                );
                if($symInfo->allowed_users > 0){
                    $programTab['online_booking'] = 1;
                }
                $vars['event_type'] = $this->event_model->getEventTypeByCategory($programCategory);

                if (isset($symInfo->institution_id)) {
                    $institutionInfo = $this->event_model->getInstitution($symInfo->institution_id);
                    $institutionTab = array(
                        'institution_id' => $institutionInfo->id, 
                        'name' => $institutionInfo->name, 
                        'institution_category' => $institutionInfo->institution_category, 
                        'website_url' => $institutionInfo->website_url, 
                        'description' => $institutionInfo->description, 
                        'country' => $institutionInfo->country, 
                        'state' => $institutionInfo->state, 
                        'city' => $institutionInfo->city, 
                        'postal_code' => $institutionInfo->postal_code, 
                        'address' => $institutionInfo->address, 
                        'facebook' => $institutionInfo->facebook, 
                        'google' => $institutionInfo->google, 
                        'twitter' => $institutionInfo->twitter, 
                        'linkedin' => $institutionInfo->linkedin, 
                    );                    
                    if($institutionInfo->country){
                        $vars['states'] = $this->event_model->getStates($institutionInfo->country);
                    }
                    if($institutionInfo->country && $institutionInfo->state){
                        $vars['cities'] = $this->event_model->getCities($institutionInfo->state,$institutionInfo->country);
                    }
                }
                
                
                //SUB EVENTS
                $vars['sub_events'] = $this->event_model->getSubEventsBySymId($symInfo->id);


                
            }            
        }

        $vars['programTab'] = $programTab;
        $vars['institutionTab'] = $institutionTab;
        $vars['urlKey'] = $urlKey;
        
        $userInfo = $this->data;
        if($userInfo['logged_in']['logid']){
            $vars['class'] = '';
            $vars['event_category'] = $this->event_model->getAllEventCategory();
            $vars['countries'] = $this->event_model->getCountries();
            $this->load->template('newEvent',$vars);
            //print_r($_FILES);
        }else{
            redirect('/customer/account/login');
        }
        
    }
}
