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

        public function insert($data){
                $this->db->insert('users', $data);
        }

        public function update_entry()
        {
                $this->title    = $_POST['title'];
                $this->content  = $_POST['content'];
                $this->date     = time();

                $this->db->update('users', $this, array('id' => $_POST['id']));
        }

}