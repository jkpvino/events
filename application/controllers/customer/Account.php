<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH . '/libraries/API_Controller.php';

class Account extends API_Controller {
	
    public function __construct() {

        parent::__construct();
    }

    public function getRandomPassword() {
        $alphabet = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890&$@';
        $pass = array(); //remember to declare $pass as an array
        $alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
        for ($i = 0; $i < 8; $i++) {
            $n = rand(0, $alphaLength);
            $pass[] = $alphabet[$n];
        }
        return implode($pass); //turn the array into a string
    }
    
  public function index()
  {
      $this->load->view('api/index');
  }
  public function myaccount()
  {
    if (!isset($this->session->userdata['logged_in'])) { 
      redirect('/index');
    }
    $this->load->model('user_model');
    $this->load->model('event_model'); 
    $logged_info = $this->session->userdata['logged_in'];
    $email = $logged_info['email'];
    
    $userInfo = $this->user_model->getUserByEmail($email);
    $logid = $userInfo[0]->id;
    $myEvents = $this->event_model->getSymposiumById($logid);
      $vars['class'] = '';
      $vars['user'] = $userInfo;
      $vars['events'] = $myEvents;
      $this->load->template('my-account',$vars);
  }
  public function forgot()
  {
    $vars['class'] = '';
    $this->load->template('forgotpass',$vars);
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
        $response = array();
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
            'password' => md5($this->getRandomPassword())
        );
        $userid  = $this->user_model->insert('users',$user);
        $users_info =  array(
            'firstname' => $this->input->post('firstname'),
            'lastname' => $this->input->post('lastname'),            
            'gender' => $this->input->post('gender'),
            'user_id'=>$userid         

        );
        $insertId = $this->user_model->insert('user_info',$users_info);
        if($insertId){
          $response = array(
            'status' => true,
            'message' => "We appreciate your registration to Cognizant. <br> System will generate the new password and will send across to your Email ID."
          );
        }
         $vars['validation_msg'] = 'Your account has been created';
          $this->session->set_flashdata('msg', 'Account created successfully');
         redirect('/index');
          //echo json_encode($response);
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
                    'logid' => $result,
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
      public function updateprofile(){
        if (!isset($this->session->userdata['logged_in'])) { 
          redirect('/index');
        }
        $logged_info = $this->session->userdata['logged_in'];
        $email = $logged_info['email'];
        $this->load->model('user_model'); 
        $userInfo = $this->user_model->getUserByEmail($email);
        $logid = $userInfo[0]->id;
        $this->load->helper('form');
        $this->load->library('form_validation');

       
       
       if(count($_POST) == 0){
         redirect('/customer/account/myaccount');
       }else{
             $firstname = $this->input->post('firstname');
            $lastname = $this->input->post('lastname');
            $phone_no = $this->input->post('phone_no');
            $gender = $this->input->post('gender');
            $website = $this->input->post('website');
            
              $user_info = array(
                'firstname' => $firstname,
                'lastname' => $lastname,                
                'gender' => $gender,
                'website' => $website,
            );
            
            $res = $this->user_model->updateUserPhone($phone_no,$logid);
           // print_r($res);exit;
            if ($res == true) {
                
                $this->session->set_flashdata('msg', 'Phone no is already exist');
                redirect('/customer/account/myaccount');
            }
            $result  = $this->user_model->updateUserInfo($user_info,$logid);

            if ($result != false) {
                
                $this->session->set_flashdata('msg', 'Updated successfully');
                redirect('/customer/account/myaccount');
            } else {
                $this->session->set_flashdata('msg', 'Invalid fields');
                redirect('/customer/account/myaccount');
            }

            
          

       }
    }


}
