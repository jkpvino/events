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

    public function deleteagenda(){
        if($this->input->post('id')){
            $deleteStatus = $this->event_model->deleteSubEvents($this->input->post('id'));
            return true;
        }else{
            return false;
        }
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
        	$contactArray = array(
        		'name' => $this->input->post('coordinator_name'), 
        		'phone' => $this->input->post('coordinator_phone'), 
        		'email' => $this->input->post('coordinator_email'), 
        	);
        	$contact_info = json_encode($contactArray);
            $eventArray = array(
                'name' => $this->input->post('program_name'), 
                'url_key' => $urlKey,
                'gmap_location' => $this->input->post('gmap_location'), 
                'website' => $this->input->post('program_website'), 
                'event_from' => $this->input->post('program_start'), 
                'event_to' => $this->input->post('program_end'), 
                'description' => htmlentities($this->input->post('program_description')), 
                //'address' => htmlentities($this->input->post('address')), 
                //'contact_info' => htmlentities($this->input->post('contact_info')), 
                'contact_info' => $contact_info, 
                'event_type' => $eventTypeId, 
                //'allowed_users' => $this->input->post('allowed_users'), 
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
            if($this->input->post('event_id')){
            	$eventId = $this->input->post('event_id');
	            $eventArray = array(
	            	'country' => $this->input->post('country'), 
	                'state' => $this->input->post('state'), 
	                'city' => $this->input->post('city'), 
                    'postal_code' => $this->input->post('postal_code'), 
	                'address' => htmlentities($this->input->post('address')),
	            );
	            $this->event_model->saveSymposium($eventArray, $eventId);
	        }
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
                $startHour = $this->input->post('event_start_hour')[$i];
                $startMins = $this->input->post('event_start_minute')[$i];
                $endHour = $this->input->post('event_end_hour')[$i];
                $endMins = $this->input->post('event_end_minute')[$i];
                $eventStartDate = $this->input->post('event_start')[$i];
                $eventEndDate = $this->input->post('event_end')[$i];

                $subEventsInfo = array(
                    'name' => $this->input->post('event_name')[$i], 
                    'description' => htmlentities($this->input->post('event_description')[$i]), 
                    'event_from' => date('Y-m-d H:i:s', strtotime('+'.$startHour.' hour'.' +'.$startMins.' minutes', strtotime($eventStartDate))), 
                    'event_to' => date('Y-m-d H:i:s', strtotime('+'.$endHour.' hour'.' +'.$endMins.' minutes', strtotime($eventEndDate))), 
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
                //echo $url = 'event/'.$eventCatg->category.'-'.$eventCatg->name.'/'.$url_key;
                echo $url = 'customer/account/myaccount';
            }else{
                echo $status;
            }
            
        }
        
    }
    
    public function location($location='',$limit='',$offset='')
    { 
        $vars['browse'] = $location;
        if($location){
            $searchData = array("location" => $location);
            $vars['sympos'] = $this->event_model->get_symposium($searchData,$limit,$offset);
        }else{
            $vars['sympos'] = $this->event_model->get_symposium();
        }
        $vars['class'] = '';   
        $this->load->template('events',$vars);
    }
    
    public function browse($browse='',$limit='',$offset='',$method='browse')
    {   
        $request_body = file_get_contents('php://input');
        $data = json_decode($request_body,true);
        $ajax = '';
        if(isset($data['isAjax'])){
            $ajax = true;
        }
        if($browse == 'false'){$browse = '';}
        $vars[$method] = $browse;
        if($browse){
            $searchData = array($method => $browse);            
            $vars['sympos'] = $this->event_model->get_symposium($searchData,$limit,$offset);
        }else{
            $vars['sympos'] = $this->event_model->get_symposium('',$limit,$offset);
        }
        $vars['class'] = '';   
        if($this->input->post('isAjax') == true || $ajax == true){
            foreach($vars['sympos'] as $key => $data){
                if(!$vars['sympos'][$key]->banner){
                    $vars['sympos'][$key]->banner = 'noimg.jpg';
                }
                $vars['sympos'][$key]->name = (strlen($data->name) > 25) ? substr($data->name,0,25).'...' : $data->name;
                $vars['sympos'][$key]->event_from = date("dS F Y", strtotime($data->event_from));
            }
            echo json_encode($vars['sympos']);
        }else{
            $this->load->template('events',$vars);
        }        
    }
    
    public function category($browse='',$limit='',$offset='')
    { 
        $vars['browse'] = $browse;
        if($browse){
            $searchData = array("category" => $browse);
            $vars['sympos'] = $this->event_model->get_symposium($searchData,$limit,$offset);
        }else{
            $vars['sympos'] = $this->event_model->get_symposium();
        }
        $vars['class'] = '';   
        $this->load->template('events',$vars);
    }
    
	public function index()
	{
        $vars['class'] = '';
        $vars['browse'] = '';
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
             if($event->status != 10){
                echo "<div class= 'demonotice' > Admin approval required to publish page content </div>";
             }
             if($event){                
                 $institution = $this->event_model->getInstitution($event->institution_id); 
                 if($institution->country && $institution->state && $institution->city){
                    $locationInfo = $this->event_model->getLocationInfo($institution->country, $institution->state, $institution->city); 
                    $vars['locationInfo'] = $locationInfo; 
                 } else{
                    $vars['locationInfo'] = '';
                 }

                 //SUB EVENTS
                 $vars['subevents'] = $this->event_model->getSubEventsBySymId($event->id);


                 $vars['class'] = 'page-course-detail';
                 $vars['event'] = $event; 
                 $vars['institution'] = $institution; 

                 $e = array(
					'general' => true, //description
					'og' => true,
					'twitter'=> true,
					'robot'=> true
				);
                if($event->logo){
                	$imgURL = base_url().'assets/images/logo/'.$event->logo;
                }else{
                	$imgURL = base_url().'assets/img/logo.png';
                }
                
				$metaTags = meta_tags($e, $title = 'icoots.com | '.$event->name.' | '.$locationInfo->country.', '.$locationInfo->state.', '.$locationInfo->city, $desc = '', $imgurl = $imgURL, $url = base_url().'events/createevent');
		        $vars['metatags'] = $metaTags;
                // $vars['sub_event'] = $sub_event;
                $this->load->template('event',$vars);
            }else{
                $this->output->set_status_header('404');
                $this->load->view('err404'); 
            }
        }else{
            $this->output->set_status_header('404');
            $this->load->view('err404'); 
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
                    $message .= 'Invalid file type. Only JPG, GIF and PNG types are accepted.<br/> '; $status = false;
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
                if(($bannersize[0] != 1600)  || ($bannersize[1] != 570) ){
                    //$bannererrors[] = 'Banner Size Should be 1920 X 684 Dimension.';
                    $message .= "Banner Size Should be 1600 X 570 Dimension.<br/> "; $status = false;
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
        $contact_info = array(
        	'name' => set_value('coordinator_name'),
        	'phone' => set_value('coordinator_phone'),
        	'email' => set_value('coordinator_email'),
        );
        $programTab = array(
            'event_id' => set_value('event_id'), 
            'program_name' => set_value('program_name'), 
            'program_start' => '', 
            'program_end' => '',
            'program_description' => set_value('program_description'),
            'address' => set_value('address'),
            'contact_info' => $contact_info,            
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
            $userData = $this->session->userdata('logged_in');
            if (isset($symInfo->id) && isset($symInfo->user_id)) {
            	if($symInfo->user_id == $userData['logid']){
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
                    $contact_info = json_decode($symInfo->contact_info);                    
                    if($contact_info){
                        $programTab['contact_info'] = array(
                            'name' => $contact_info->name,
                            'phone' => $contact_info->phone,
                            'email' => $contact_info->email,
                        );
                    }else{
                        $programTab['contact_info'] = array(
                            'name' => '',
                            'phone' => '',
                            'email' => '',
                        );
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
        }

        $vars['programTab'] = $programTab;
        $vars['institutionTab'] = $institutionTab;
        $vars['urlKey'] = $urlKey;


    	$e = array(
			'general' => true, //description
			'og' => true,
			'twitter'=> true,
			'robot'=> true
		);
		$metaTags = meta_tags($e, $title = ' | Online Event Registration Software', $desc = '', $imgurl =base_url().'assets/img/logo.png', $url = base_url().'events/createevent');
        $vars['metatags'] = $metaTags;


        $userInfo = $this->data;
        if($userInfo['logged_in']['logid']){
            $vars['class'] = '';
            $vars['event_category'] = $this->event_model->getAllEventCategory();
            $vars['countries'] = $this->event_model->getCountries();
            $this->load->template('newEvent',$vars);
            //print_r($_FILES);
        }else{
            $this->session->set_userdata('previous_url', current_url());
            redirect('/customer/account/login');
        }
        
    }
}
