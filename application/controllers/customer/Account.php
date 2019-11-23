<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH . '/libraries/API_Controller.php';

class Account extends API_Controller {
	
    public function __construct() {

        parent::__construct();
    }
    
    public function index()
    {
      $this->load->view('api/index');
  }

  public function create(){
    header("Access-Control-Allow-Origin: *");

        // API Configuration [Return Array: User Token Data]
    $user_data = $this->_apiConfig([
        'methods' => ['POST'],
        'requireAuthorization' => false,
    ]);

        // return data
    $this->api_return(
        [
            'status' => true,
            "result" => [
                'user_data' => $this->input->post()
            ],
        ],
        200);
}
    public function register(){
        $this->load->helper('form');
       $this->load->library('form_validation');


       $this->load->model('user_model'); 
        $vars['class'] = '';
       if(count($_POST) == 0){
         $this->load->template('register',$vars); 
       }else{
       

       $this->form_validation->set_rules('firstname', 'First Name', 'required');
       $this->form_validation->set_rules('lastname', 'Last Name', 'required');
       $this->form_validation->set_rules('email', 'Email', 'required|valid_email|callback_email_exists');
       $this->form_validation->set_rules('phone_no', 'Phone', 'required|numeric|min_length[10]|max_length[11]|callback_phone_exists');
       $this->form_validation->set_rules('gender', 'Gender', 'required');
       $this->form_validation->set_rules('terms', 'Terms&conditions', 'required');
       //$this->form_validation->set_rules('password', 'Password', 'required|min_length[4]|max_length[32]');
      // $this->form_validation->set_rules('password_confirm', 'Password Confirm', 'required|matches[password]');

        
       if ($this->form_validation->run() == FALSE){
         $vars['validation_msg'] = '';
         $this->load->template('register',$vars); 
      }else{

        $user = array(
            'email' => $this->input->post('email'),
            'phone_no' => $this->input->post('phone_no'),
            'password' => md5('123456')
        );
        $userid  = $this->user_model->insert('users',$user);
        $users_info =  array(
            'firstname' => $this->input->post('firstname'),
            'lastname' => $this->input->post('lastname'),            
            'gender' => $this->input->post('gender'),
            'user_id'=>$userid         

        );
        $this->user_model->insert('user_info',$users_info);

         $vars['validation_msg'] = 'Your account has been created';
        // $this->load->template('register',$vars); 
          $this->session->set_flashdata('msg', 'Account created successfully');
         redirect('/index');
      }
     }
    }
    function email_exists($key) {
      
      $exist = $this->user_model->mail_exists($key);
      if($exist){
        return true;
      }else{
       $this->form_validation->set_message('email_exists', "The {$key} is already exists.");
       return false;
      }
      
    }
    function phone_exists($key) {
      
      $exist = $this->user_model->phone_exists($key);
      if($exist){
        return true;
      }else{
       $this->form_validation->set_message('phone_exists', "The {$key} is already exists.");
       return false;
      }
      
    }
    public function login(){
           $this->load->helper('form');
       $this->load->library('form_validation');

       $this->load->model('user_model'); 
        $vars['class'] = '';
        $vars['validation_msg'] ='';
       if(count($_POST) == 0){
         $this->load->template('login',$vars); 
       }else{
         $this->form_validation->set_rules('email', 'Email', 'trim|required');
         $this->form_validation->set_rules('password', 'Password', 'trim|required');
          if ($this->form_validation->run() == FALSE){
             $this->load->template('login',$vars); 
          }else{
            $password = $this->input->post('password');
            $email = $this->input->post('email');
              $user = array(
                'email' => $email,
                'password' => md5($password)
            );
             $result  = $this->user_model->login_verify($user);

             if ($result != false) {
                $session_data = array(                    
                    'email' => $email,
                );

                $this->session->set_userdata('logged_in', $session_data);
                $this->session->set_flashdata('msg', 'Loggedin successfully');
                redirect('/index');
            } else {
                $vars['validation_msg'] ='Invalid Username or Password';
                
                $this->load->template('login', $vars);
            }

             //$this->session->set_flashdata('msg', 'Loggedin successfully');
             //redirect('/index');
          }


       }
    }

            // Logout from admin page
        public function logout() {

            // Removing session data
            $sess_array = array(
            'email' => ''
            );
            $this->session->unset_userdata('logged_in', $sess_array);
            $this->session->set_flashdata('msg', 'Loggedout successfully');
                redirect('/index');
        }


}
