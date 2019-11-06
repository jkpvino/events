<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Account extends CI_Controller {
	
	public function index()
	{
		$this->load->view('api/index');
	}

	public function __construct() {
        parent::__construct();
        $this->load->helper(['jwt', 'authorization']); 
    }

	public function gettoken()
    {
        $tokenData = 'Hello World!';
        
        // Create a token
        $token = AUTHORIZATION::generateToken($tokenData);
        // Set HTTP status code
        $status = 'success';
        // Prepare the response
        $response = ['status' => $status, 'token' => $token];
        print_r($response);
        $data = AUTHORIZATION::validateToken($token);
        print_r($data);
        // REST_Controller provide this method to send responses
        //$this->response($response, $status);
    }

    public function register(){
        echo "vinoth";
    }
}
