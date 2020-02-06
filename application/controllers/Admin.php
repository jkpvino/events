<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
//error_reporting(E_ALL);
class Admin extends CI_Controller {
	public function __construct(){
        parent::__construct();
        $this->load->helper(array('form', 'url','admin_helper'));
        $this->load->library('form_validation');
        $this->load->library('session');
        $this->load->library('pagination');
        $this->load->model('admin_model');
    }
    public function index(){
        if(isAdminLogged()){
            $session_data = $this->session->userdata('logbyadmin');
            redirect('admin/dashboard', 'refresh');
        }else{
            $data = array(
                'title' => 'Login',
                'body_content' => 'login.php', 
            );
            $this->load->view('admin/login',$data);
        }
	}
    public function loginverify(){
        $this->form_validation->set_rules('username', 'Username', 'trim|required');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|callback_check_database');
        if($this->form_validation->run() == FALSE)
        {
            $data = array(
                'title' => 'Login',
                'body_content' => 'login.php'
            );
            $this->load->view('admin/login',$data);
        }else{      
            //echo "hh";
            //eixt;
            redirect('admin/dashboard', 'refresh');
        }
    }

    public function check_database($password){
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        $result = $this->admin_model->isexists($username, $password);

        if($result){
            $sess_array = array();
            foreach($result as $row){
                $sess_array = array(
                 'id' => $row->id,
                 'username' => $row->username,
                 'usertype'=> $row->usertype
                );
                $this->session->set_userdata('logbyadmin', $sess_array);
            }
            return TRUE;
        }else{
            $this->form_validation->set_message('check_database', 'Invalid username or password');
            return false;
        }
    }

    public function logout(){
        if(isAdminLogged()){
            $this->session->unset_userdata('logbyadmin');
            $this->session->sess_destroy();
            redirect('admin/index', 'refresh');
        }else{
            redirect('admin', 'refresh');
        }
    }


    public function dashboard(){
        if(isAdminLogged()){
            $session_data = $this->session->userdata('logbyadmin');        
            $_method = $this->router->fetch_method();   
            $pagecontent = array(
                'username' => $session_data['username'], 
                'logid' => $session_data['id'],
                'usertype' => $session_data['usertype'],
                'userscount' => getUsersCount(),
            );
            $data = array(
                'title' => 'Dashboard',
                'subtitle' => '',
                'body_content' => 'dashboard.php', 
                //'body_content' => '', 
                'pagecontent' => $pagecontent,
                'method' => $_method,
            );
            $this->load->view('admin/index',$data);
        }else{
            redirect('admin', 'refresh');
        }
    } 


    /* ----------------- Event Collection ----------------- */
    public function manageevent(){
        if(isAdminLogged()){
            $session_data = $this->session->userdata('logbyadmin');        
            $_method = $this->router->fetch_method();   
            $pagecontent = array(
                'username' => $session_data['username'], 
                'logid' => $session_data['id'],
            );
            $data = array(
                'title' => 'Manage Event',
                'subtitle' => '',
                'body_content' => 'manageevent/events.php', 
                'pagecontent' => $pagecontent,
                'method' => $_method,
            );
            $this->load->view('admin/index',$data);
        }else{
            redirect('admin', 'refresh');
        }
    }
    public function eventlist() {
        $results = $this->admin_model->geteventlist();
        echo json_encode($results);
    }
    public function eventupdate(){
        $id = $this->input->get('id') ? $this->input->get('id') : '';
        $status = $this->input->get('status') ? $this->input->get('status') : '';
        if($id && $status){
            $data = array(
                'status' => $status, 
            );
            $this->admin_model->updateevent($data,$id);
        }
        redirect('admin/manageevent', 'refresh');
    }
    /* ----------------- End Event Collection ----------------- */


















































    public function settings(){
        if(isAdminLogged()){
            $session_data = $this->session->userdata('logbyadmin');        
            $_method = $this->router->fetch_method();   
            $pagecontent = array(
                'username' => $session_data['username'], 
                'logid' => $session_data['id']
            );
            $this->form_validation->set_rules('terms_condition', 'Terms Condition ', 'trim');
            $this->form_validation->set_rules('about_us', 'About Us', 'trim');
            $this->form_validation->set_rules('it_works', 'Works', 'trim');
            $this->form_validation->set_rules('policy', 'Policy ', 'trim');
            if($this->form_validation->run() == TRUE){
                if(!empty($this->input->post('terms_condition'))){
                $this->db->where('lang_code', 'terms_condition' );
                $this->db->update('T_SETTINGS', array('value' => $this->input->post('terms_condition') )); }
                /* Work */
                if(!empty($this->input->post('it_works'))){
                 $this->db->where('lang_code', 'work_condition' );                
                $this->db->update('T_SETTINGS', array('value' => $this->input->post('it_works') ));  }
                /* About Us */
                if(!empty($this->input->post('about_us'))){
                 $this->db->where('lang_code', 'about_condition' );
                $this->db->update('T_SETTINGS', array('value' => $this->input->post('about_us') )); }
                /* Policy */
                if(!empty($this->input->post('policy'))){
                 $this->db->where('lang_code', 'policy_condition' );                
                $this->db->update('T_SETTINGS', array('value' => $this->input->post('policy') ));  }

                $message = 'Profile Information Updated Successfully';
                $this->session->set_flashdata('flash_message',$message); 
                /*$records = array(
                    'terms_condition' => $this->input->post('terms_condition')
                );
                $results = $this->admin_model->saveSettings($records);*/
            }
            $data = array(
                'title' => 'Settings',
                'subtitle' => '',
                'body_content' => 'settings.php', 
                //'body_content' => '', 
                'pagecontent' => $pagecontent,
                'method' => $_method,
            );
            $this->load->view('admin/index',$data);
        }else{
            redirect('admin', 'refresh');
        }
    } 



    

    /* -------------Admin Collection -------------------------*/
    public function manageadmin(){
        if(isAdminLogged()){
            $session_data = $this->session->userdata('logbyadmin');        
            $_method = $this->router->fetch_method();   
            $pagecontent = array(
                'username' => $session_data['username'], 
                'logid' => $session_data['id'],
                'usertype' => $session_data['usertype']
            );
            $data = array(
                'title' => 'Manage Admin',
                'subtitle' => '',
                'body_content' => 'manageadmin/admin_grid.php', 
                'pagecontent' => $pagecontent,
                'method' => $_method,
            );
            $this->load->view('admin/index',$data);
        }else{
            redirect('admin', 'refresh');
        }
    }
    public function adminlist() {
        $results = $this->admin_model->getadminlist();
        echo json_encode($results);
    }
    public function addadmin(){
        if(isAdminLogged()){
            $session_data = $this->session->userdata('logbyadmin');        
            $_method = $this->router->fetch_method();   
            $pagecontent = array(
                'username' => $session_data['username'], 
                'logid' => $session_data['id'],
                'usertype' => $session_data['usertype']
            );                       
            $this->form_validation->set_rules('fullname', 'Name', 'trim|required');
            $this->form_validation->set_rules('username', 'Username', 'trim|required|callback_isAdminExists');
            $this->form_validation->set_rules('password', 'Password', 'trim|required|md5');
            $this->form_validation->set_rules('email', 'Email', 'trim|required');
            $this->form_validation->set_rules('usertype', 'User Group', 'trim|required');
            $this->form_validation->set_rules('status', 'Status', 'trim|required');                
            if($this->form_validation->run() == TRUE){
                $records = array(
                            'fullname' => trim($this->input->post('fullname')), 
                            'username' => trim($this->input->post('username')), 
                            'password' => trim($this->input->post('password')), 
                            'email' => trim($this->input->post('email')), 
                            'usertype' => trim($this->input->post('usertype')), 
                            'status' => trim($this->input->post('status'))
                        );
                $permissions=array(
'view'=>trim($this->input->post('admin_view')),
'add'=>trim($this->input->post('admin_add')),
'edit'=>trim($this->input->post('admin_edit')),
'delete'=>trim($this->input->post('admin_delete')),

'cl_view'=>trim($this->input->post('classified_view')),
'cl_add'=>trim($this->input->post('classified_add')),
'cl_edit'=>trim($this->input->post('classified_edit')),
'cl_delete'=>trim($this->input->post('classified_delete')),

'ca_view'=>trim($this->input->post('category_view')),
'ca_add'=>trim($this->input->post('category_add')),
'ca_edit'=>trim($this->input->post('category_edit')),
'ca_delete'=>trim($this->input->post('category_delete')),

'user_view'=>trim($this->input->post('user_view')),
//'user_add'=>trim($this->input->post('user_add')),
'user_edit'=>trim($this->input->post('user_edit')),
'user_delete'=>trim($this->input->post('user_delete')),

'pr_view'=>trim($this->input->post('pr_view')),
'pr_add'=>trim($this->input->post('pr_add')),
'pr_edit'=>trim($this->input->post('pr_edit')),
'pr_delete'=>trim($this->input->post('pr_delete')),

'fb_view'=>trim($this->input->post('fb_view')),
'fb_edit'=>trim($this->input->post('fb_edit')),
'fb_delete'=>trim($this->input->post('fb_delete')),

'en_view'=>trim($this->input->post('en_view')),
'en_edit'=>trim($this->input->post('en_edit')),
'en_delete'=>trim($this->input->post('en_delete')),

//'ca_view'=>trim($this->input->post('category_view')),
//'ca_add'=>trim($this->input->post('category_add')),
//'ca_edit'=>trim($this->input->post('category_edit')),
//'ca_delete'=>trim($this->input->post('category_delete')),

                    );

                //debug($permissions);
                //exit;
                $results = $this->admin_model->saveAdmin($records,$permissions);
                $message = 'New Admin Account Created Successfully';
                $this->session->set_flashdata('flash_message',$message); 
                redirect('admin/manageadmin', 'refresh');
            }else{
                $data = array(
                    'title' => 'Admin',
                    'subtitle' => '',
                    'body_content' => 'manageadmin/add.php', 
                    'pagecontent' => $pagecontent,
                    'method' => $_method,
                );
                // echo "<pre>";
                // print_r($data);
                // exit;
                $this->load->view('admin/index',$data);
            }
            
        }else{
            $message = 'You Dont have rights to access this page';
            $this->session->set_flashdata('flash_message',$message);  
            redirect('admin', 'refresh');
        }
    }
    public function isAdminExists($password){
        $username = $this->input->post('username');
        $result = $this->admin_model->isadminuserexists($username);

        if($result){
            $this->form_validation->set_message('isAdminExists', 'Admin Username Already Exists');
            return false;
        }else{
            return true;
        }
    }
    public function editadmin($id){
        if(isAdminLogged()){
            $session_data = $this->session->userdata('logbyadmin');        
            $_method = $this->router->fetch_method();   
            $pagecontent = array(
                'username' => $session_data['username'], 
                'logid' => $session_data['id'],
                'usertype' => $session_data['usertype']
            );                       
            $this->form_validation->set_rules('fullname', 'Name', 'trim|required');
            $this->form_validation->set_rules('password', 'Password', 'trim|md5');
            $this->form_validation->set_rules('email', 'Email', 'trim|required');
            $this->form_validation->set_rules('usertype', 'User Group', 'trim|required');
            $this->form_validation->set_rules('status', 'Status', 'trim|required');  

            if($this->form_validation->run() == TRUE){                
                if($this->input->post('password')){
                    $records = array(
                            'fullname' => trim($this->input->post('fullname')),  
                            'password' => trim($this->input->post('password')), 
                            'email' => trim($this->input->post('email')), 
                            'usertype' => trim($this->input->post('usertype')), 
                            'status' => trim($this->input->post('status')),
                            'modified' => date("Y-m-d H:i:s"),
                            'modified_by' => $session_data['username']
                        );
                }else{
                    $records = array(
                        'fullname' => trim($this->input->post('fullname')), 
                        'email' => trim($this->input->post('email')), 
                        'usertype' => trim($this->input->post('usertype')), 
                        'status' => trim($this->input->post('status')),
                        'modified' => date("Y-m-d H:i:s"),
                        'modified_by' => $session_data['username']
                    );
                }

                    $permissions=array(
'view'=>trim($this->input->post('admin_view')),
'add'=>trim($this->input->post('admin_add')),
'edit'=>trim($this->input->post('admin_edit')),
'delete'=>trim($this->input->post('admin_delete')),
'd_modified' => date("Y-m-d H:i:s"),
//'modified_by' => $session_data['username']
'cl_view'=>trim($this->input->post('classified_view')),
'cl_add'=>trim($this->input->post('classified_add')),
'cl_edit'=>trim($this->input->post('classified_edit')),
'cl_delete'=>trim($this->input->post('classified_delete')),

'ca_view'=>trim($this->input->post('category_view')),
'ca_add'=>trim($this->input->post('category_add')),
'ca_edit'=>trim($this->input->post('category_edit')),
'ca_delete'=>trim($this->input->post('category_delete')),

'user_view'=>trim($this->input->post('user_view')),
//'user_add'=>trim($this->input->post('user_add')),
'user_edit'=>trim($this->input->post('user_edit')),
'user_delete'=>trim($this->input->post('user_delete')),

'pr_view'=>trim($this->input->post('pr_view')),
'pr_add'=>trim($this->input->post('pr_add')),
'pr_edit'=>trim($this->input->post('pr_edit')),
'pr_delete'=>trim($this->input->post('pr_delete')),

'fb_view'=>trim($this->input->post('fb_view')),
//'fb_add'=>trim($this->input->post('fb_add')),
'fb_edit'=>trim($this->input->post('fb_edit')),
'fb_delete'=>trim($this->input->post('fb_delete')),

'en_view'=>trim($this->input->post('en_view')),
'en_edit'=>trim($this->input->post('en_edit')),
'en_delete'=>trim($this->input->post('en_delete')),

                    );

                   

                //debug($permissions);
                //exit;
                $message = 'Record Updated Successfully';
                $this->session->set_flashdata('flash_message',$message);        
                $results = $this->admin_model->updateAdmin($records,$id,$permissions);
                redirect('admin/manageadmin', 'refresh');
            }else{                 
                $data = array(
                    'title' => 'Edit Admin',
                    'subtitle' => '',
                    'body_content' => 'manageadmin/edit.php', 
                    'pagecontent' => $pagecontent,
                    'method' => $_method,
                    'id' => $id,
                    'admininfo' => getadmininfobyId($id),
                    'permissioninfo'=>$this->admin_model->getpermissioninfobyId($id),
                    'adpermission'=>getAdminpermissionbyId($id),
                    'catpermission'=>getCategorypermissionbyId($id),
                    'classpermission'=>getClassifiedpermissionbyId($id),
                    'propermission'=>getProfpermissionbyId($id),
                    'usrpermission'=>getUserpermissionbyId($id),
                    'fbpermission'=>getfeedbackpermissionbyId($id),
                    'enpermission'=>getEnquirypermissionbyId($id),
                );

                //debug($data);
                //exit;
                $this->load->view('admin/index',$data);
            }
            
        }else{
            $message = 'You Dont have rights to access this page';
            $this->session->set_flashdata('flash_message',$message);  
            redirect('admin', 'refresh');
        }
    }    
    public function deleteadmin($id){
        if(isAdminLogged()){
            $results = $this->admin_model->deleteAdmin($id);
            $message = 'Record deleted Successfully';
            $this->session->set_flashdata('flash_message',$message);
            redirect('admin/manageadmin', 'refresh');
        }else{
            $message = 'You dont have access to Delete this Records';
            $this->session->set_flashdata('flash_message',$message);
            redirect('admin/manageadmin', 'refresh');
        }
    }
    /* ----------------- End Admin Collection -------------------------*/
}