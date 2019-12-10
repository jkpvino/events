<?php

class Event_model extends CI_Model {


        public function get_symposium($limit = '', $offset = '')
        {
            $this->db->select('name,id,event_type,url_key,event_from,event_to,gmap_location');
            if ($limit && $offset) {
                $query = $this->db->get_where('symposium', array('status' => '10'), $limit, $offset);
            }else{
                $query = $this->db->get_where('symposium', array('status' => '10'));
            }
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
			 return $query->result();
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