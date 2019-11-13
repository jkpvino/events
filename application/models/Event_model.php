<?php

class Event_model extends CI_Model {


        public function get_symposium()
        {
                $limit = 1;$offset = 0;
                $query = $this->db->get_where('symposium', array('status' => '10'), $limit, $offset);
                //echo $this->db->last_query();exit;
                return $query->result();
        }

        
}