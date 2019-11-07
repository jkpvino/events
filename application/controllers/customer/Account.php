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
}
