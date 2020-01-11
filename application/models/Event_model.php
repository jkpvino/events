<?php

class Event_model extends CI_Model {


        public function get_symposium($like = array(), $limit = '', $offset = '', $orderby = '')
        {
            if(isset($like['location'])){
            	$this->db->like('country', $like['location']); 
            	$this->db->or_like('state', $like['location']); 
            	$this->db->or_like('city', $like['location']);
            } 
            if(isset($like['browse'])){
            	$this->db->like('name', $like['browse']); 
            	$this->db->like('institution', $like['browse']); 
            	$this->db->or_like('url_key', $like['browse']);
            	$this->db->or_like('event_from', $like['browse']);
            	$this->db->or_like('event_to', $like['browse']);
            	$this->db->or_like('event_to', $like['browse']);
            	$this->db->or_like('etypename', $like['browse']);
            	$this->db->or_like('etypecategory', $like['browse']);
            	$this->db->or_like('country', $like['browse']);
            	$this->db->or_like('state', $like['browse']);
            	$this->db->or_like('city', $like['browse']);
            }  
            if(isset($like['category'])){
            	$this->db->like('etypename', $like['category']); 
            	$this->db->or_like('etypecategory', $like['category']);
            }           
            if ($limit) {
                $this->db->limit($limit);
            }
            if($offset){
                $this->db->offset($offset);
            }
            $query = $this->db->get_where('searchevents', array('status' => '10'));
            if($orderby){
                $this->db->order_by("id", $orderby);
            }else{
                $this->db->order_by("id", "desc");
            }            
            //echo $this->db->last_query(); echo "<br>";exit;
            return $query->result();
        }
        public function getSymposiumInfoById($id,$limit=1,$offset=0)
        {
            $this->db->select('url_key,id,event_type,institution_id,user_id');
            $query = $this->db->get_where('symposium', array('id'=>$id), $limit, $offset);
            return $query->row();
        }
        public function getSymposiumInfoByUrlKey($urlKey,$limit=1,$offset=0)
        {
            //$this->db->select('url_key,id,event_type,institution_id,user_id');
            $query = $this->db->get_where('symposium', array('url_key'=>$urlKey), $limit, $offset);
            return $query->row();
        }
        public function getSymposiumById($user_id,$limit=1,$offset=0)
        {
               // $limit = 1;$offset = 0;
                $query = $this->db->get_where('symposium', array('status' => '10','user_id'=>$user_id), $limit, $offset);
                //echo $this->db->last_query();exit;
                return $query->result();
        }
        public function get_event_details($event_type,$url_key){
        	
        	$this->db->select('symposium.*,event_type.name as ename,event_type.category as ecatg');
			$this->db->from('symposium');
			$this->db->join('event_type','symposium.event_type= event_type.id','left');	   
			//$this->db->join('events','events.sym_id= symposium.id','left');	          
			$this->db->where('symposium.url_key', $url_key)->where('event_type.id', $event_type); 
			
			$query = $this->db->get();
			 //echo $this->db->last_query();exit;
			 return $query->row();
        }
        public function getLocationInfo($country,$state,$city){        	
        	$this->db->select('countries.name as country, states.name as state, cities.name as city');
			$this->db->from('countries');
			$this->db->join('states','countries.iso2= states.country_code','left');	   
			$this->db->join('cities','cities.country_code= countries.iso2','left');	     
			$this->db->where('countries.iso2', $country)->where('states.iso2', $state)->where('cities.id', $city); 		
			$query = $this->db->get();
			return $query->row();
        }
        public function get_event($sym_id)
        {
               
                $query = $this->db->get_where('events', array('sym_id' => $sym_id));
                //echo $this->db->last_query();exit;
                return $query->result();
        }
        public function getEventId($event_type){
        	$exp = explode('-',$event_type);

        	$query = $this->db->get_where('event_type', array('name' => $exp[1],'category' => $exp[0]));
             // echo $this->db->last_query();exit;
               $ret = $query->row();
			return $ret->id;
        }

        public function getEventTypes(){
            $query = $this->db->get('event_type');
            return $query->result();
        }

        public function getCountries(){
            $this->db->select('name, iso2');
            $query = $this->db->get('countries');
            return $query->result();
        }

        public function getStates($countryCode){
            $this->db->select('name, iso2');
            $query = $this->db->get_where('states',array('country_code'=>$countryCode));
            return $query->result();
        }

        public function getCities($stateCode, $countryCode){
            $this->db->select('name, id');
            $query = $this->db->get_where('cities',array('state_code'=>$stateCode, 'country_code'=>$countryCode));
            return $query->result();
        }

        public function getAllEventCategory(){
            $this->db->select('category, category_code');
            $this->db->group_by('category_code');
            $query = $this->db->get_where('event_type',array('status'=>'10'));
           // $this->db->where('status', 10);
          //  echo $this->db->last_query();exit;
            return $query->result();
        }
        public function getEventTypeByCategory($category_code)
        {       $this->db->select('name, name_code');
                $query = $this->db->get_where('event_type', array('category_code' => $category_code));                
                return $query->result();
        }
        public function getEventTypeId($catArray)
        {
                $query = $this->db->get_where('event_type', $catArray);                
                return $query->row()->id;
        }
        public function getEventType($id)
        {
                $query = $this->db->get_where('event_type', array('id' => $id));                
                return $query->row();
        }
         public function getInstitution($id)
        {
               $query = $this->db->get_where('institution', array('id' => $id));                
                return $query->row();
        }
	
        public function saveSymposium($data,$id = ''){
            if ($id) {
                $this->db->update('symposium', $data, array('id' => $id));
                return $id;
            }else{                
                $this->db->insert('symposium', $data);
                $insert_id = $this->db->insert_id();
                return  $insert_id; 
            }
        }

        
    
        public function setInstitution($data,$id=''){
            if($id){
                $this->db->update('institution', $data, array('id' => $id));
                return $id;
            }else{                
                $this->db->insert('institution', $data);
                $insert_id = $this->db->insert_id();
                return  $insert_id;
            } 
        }

        public function saveSubEvents($data, $id){
            if($id){
                $this->db->update('events', $data, array('id' => $id));
                return $id;
            }else{
                $this->db->insert('events', $data);
                $insert_id = $this->db->insert_id();
                return  $insert_id; 
            }
        }

        
        public function getSubEventsBySymId($symId){       
            //$this->db->select('name, name_code');
            $query = $this->db->get_where('events', array('sym_id' => $symId));                
            return $query->result();
        }
}