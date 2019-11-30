<?php

class Event_model extends CI_Model {


        public function get_symposium()
        {
                $limit = 1;$offset = 0;
                $query = $this->db->get_where('symposium', array('status' => '10'), $limit, $offset);
                //echo $this->db->last_query();exit;
                return $query->result();
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

        public function getAllEventCategory(){
            $this->db->select('category, category_code');
            $this->db->group_by('category_code');
            $query = $this->db->get_where('event_type',array('status'=>'10'));
           // $this->db->where('status', 10);
          //  echo $this->db->last_query();exit;
            return $query->result();
        }
        public function getEventType($sym_id)
        {
                $query = $this->db->get_where('event_type', array('id' => $sym_id));                
                return $query->row();
        }
         public function getInstitution($id)
        {
               $query = $this->db->get_where('institution', array('id' => $id));                
                return $query->row();
        }
	
        public function setSymposium($data){
            $this->db->insert('symposium', $data);
            $insert_id = $this->db->insert_id();
            return  $insert_id; 
        }

        public function updateSymposium($data,$id){
            $this->db->update('symposium', $data, array('id' => $id));
            return $id;
        }

        
}