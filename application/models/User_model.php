<?php

class User_model extends CI_Model {

        public $title;
        public $content;
        public $date;

        public function get_last_ten_entries()
        {
                $query = $this->db->get('users', 10);
                return $query->result();
        }

        public function insert($table,$data){
                $this->db->insert($table, $data);
                $insert_id = $this->db->insert_id();
                 return  $insert_id; 
        }
        public function updateUserInfo($data,$logid){
             $this->db->update('user_info', $data, array('user_id' => $logid));
             return true;
        }

        public function update_entry()
        {
                $this->title    = $_POST['title'];
                $this->content  = $_POST['content'];
                $this->date     = time();

                $this->db->update('users', $this, array('id' => $_POST['id']));
        }
        public function mail_exists($key)
        {
            $this->db->where('email',$key);
            $query = $this->db->get('users');
            //echo $this->db->last_query();exit;
                if ($query->num_rows() > 0){
                     return false;
                }
                else{
                        return true;
                }
        }
        public function phone_exists($key){
            $this->db->where('phone_no',$key);
            $query = $this->db->get('users');
            //echo $this->db->last_query();exit;
                if ($query->num_rows() > 0){
                     return false;
                }
                else{
                        return true;
                }
        }
        public function updateUserPhone($key,$logid){
            $this->db->where('id !=',$logid);
           $this->db->where('phone_no',$key);
            $query = $this->db->get('users');
            //echo $this->db->last_query();exit;
                if ($query->num_rows() > 0){                    
                     return true;
                }
                else{
                     $data['phone_no'] = $key;
                     $this->db->update('users', $data, array('id' => $logid));
                     return false;
                } 
        }
        public function login_verify($user){
           $this->db->where('email',$user['email']);
           $this->db->where('password',$user['password']);
            $query = $this->db->get('userview');
            //echo $this->db->last_query();exit;
                if ($query->num_rows() == 1){
                     return true;
                }
                else{
                        return false;
                }
        }
        public function getUserByEmail($email){
            $this->db->where('email',$email);
            $query = $this->db->get('users');


            $this->db->select('users.*,user_info.firstname,user_info.lastname,user_info.gender,user_info.website');
            $this->db->from('users');
            $this->db->join('user_info','users.id= user_info.user_id','left');        
            $this->db->where('users.email', $email);
            
            $query = $this->db->get();
           //  echo $this->db->last_query();exit;
             return $query->result();

        }

}