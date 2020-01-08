<?php 
class Admin_model extends CI_Model {

	public function __construct(){
        parent::__construct();
    }

    public function saveSettings($records){
        print_r(key($records));exit();
        if(count($records) > 0){
            $query = $this->db->get_where('T_SETTINGS', array('terms_condition' => $records['terms_condition'] ));
            if($query->num_rows() >= 1){
                $this->db->where('id', 'terms_condition' );
                $this->db->update('HSM_ADMIN', $records['terms_condition']); 
            }
        }
        
    }

    public function isexists($username, $password){
        //echo "hi";
        //exit;
        $limit = 1;
        $query = $this->db->get_where('HSM_ADMIN', array('username' => $username,'password' => md5($password), 'status' => 1 ), $limit);
        if($query -> num_rows() == 1)
            return $query->result();
        else
            return false;
    }

    public function getadmininfobyId($id){
        $limit = 1;
        $query = $this->db->get_where('HSM_ADMIN', array('id' => $id, 'status' => 1 ), $limit);
        if($query -> num_rows() == 1)
            return $query->result();
        else
            return false;
    }

    public function getpermissioninfobyId($id){
        //$limit = 1;
        $query = $this->db->get_where('T_PERMISSION', array('user_id' => $id));
        if($query -> num_rows() > 0)
            return $query->result();
        else
            return false;
    }
    public function getadminpermissionbyId($id){
     $limit=1;   
     $query = $this->db->get_where('T_PERMISSION', array('user_id' => $id,'module_id'=>MANAGEADMIN
        ),$limit);
        if($query -> num_rows() == 1)
            return $query->result();
        else
            return false;   
    }

    public function getclassifiedpermissionbyId($id){
     $limit=1;   
     $query = $this->db->get_where('T_PERMISSION', array('user_id' => $id,'module_id'=>MANAGECLASSIFIED
        ),$limit);
        if($query -> num_rows() == 1)
            return $query->result();
        else
            return false;   
    }

    public function getcategorypermissionbyId($id){
     $limit=1;   
     $query = $this->db->get_where('T_PERMISSION', array('user_id' => $id,'module_id'=>MANAGECATEGORY
        ),$limit);
        if($query -> num_rows() == 1)
            return $query->result();
        else
            return false;   
    }

    public function getprofessionpermissionbyId($id){
     $limit=1;   
     $query = $this->db->get_where('T_PERMISSION', array('user_id' => $id,'module_id'=>MANAGEPROFESSION
        ),$limit);
        if($query -> num_rows() == 1)
            return $query->result();
        else
            return false;   
    }


    public function getuserpermissionbyId($id){
     $limit=1;   
     $query = $this->db->get_where('T_PERMISSION', array('user_id' => $id,'module_id'=>MANAGEUSERS
        ),$limit);
        if($query -> num_rows() == 1)
            return $query->result();
        else
            return false;   
    }
    

    public function getfeedbackpermissionbyId($id){
     $limit=1;   
     $query = $this->db->get_where('T_PERMISSION', array('user_id' => $id,'module_id'=>MANAGEFEEDBACK
        ),$limit);
        if($query -> num_rows() == 1)
            return $query->result();
        else
            return false;   
    }

    public function getenquirypermissionbyId($id){
      $limit=1;   
     $query = $this->db->get_where('T_PERMISSION', array('user_id' => $id,'module_id'=>MANAGEENQUIRY
        ),$limit);
        if($query -> num_rows() == 1)
            return $query->result();
        else
            return false;      
    }

    public function getadminlist() {

                 
        $aColumns = array(
            'id',
            'profileimage',
            'fullname',
            'email',
            'usertype',
            'status',
            'created'
        );
        $sIndexColumn = "id";

        /* Total data set length */
        $sQuery = "SELECT COUNT('".$sIndexColumn."') AS row_count FROM HSM_ADMIN";
        $rResultTotal = $this->db->query($sQuery);
        $aResultTotal = $rResultTotal->row();
        $iTotal = $aResultTotal->row_count;

        /*
         * Paging
         */
        $sLimit = "";
        $iDisplayStart = $this->input->get_post('start', true);
        $iDisplayLength = $this->input->get_post('length', true);
        if (isset($iDisplayStart) && $iDisplayLength != '-1') {
            $sLimit = "LIMIT " . intval($iDisplayStart) . ", " .
            intval($iDisplayLength);
        }

        $uri_string = $_SERVER['QUERY_STRING'];
        $uri_string = preg_replace("/\%5B/", '[', $uri_string);
        $uri_string = preg_replace("/\%5D/", ']', $uri_string);

        $get_param_array = explode("&", $uri_string);
        $arr = array();
        foreach ($get_param_array as $value) {
            $v = $value;
            $explode = explode("=", $v);
            $arr[$explode[0]] = $explode[1];
        }

        $index_of_columns = strpos($uri_string, "columns", 1);
        $index_of_start = strpos($uri_string, "start");
        $uri_columns = substr($uri_string, 7, ($index_of_start - $index_of_columns - 1));
        $columns_array = explode("&", $uri_columns);
        $arr_columns = array();
        foreach ($columns_array as $value) {
            $v = $value;
            $explode = explode("=", $v);
            if (count($explode) == 2) {
                $arr_columns[$explode[0]] = $explode[1];
            } else {
                $arr_columns[$explode[0]] = '';
            }
        }

        /*
         * Ordering
         */
        $sOrder = "ORDER BY ";
        $sOrderIndex = $arr['order[0][column]'];
        $sOrderDir = $arr['order[0][dir]'];
        $bSortable_ = $arr_columns['columns[' . $sOrderIndex . '][orderable]'];
        if ($bSortable_ == "true") {
            $sOrder .= $aColumns[$sOrderIndex] .
                    ($sOrderDir === 'asc' ? ' asc' : ' desc');
        }

        /*
         * Filtering
         */
        $sWhere = "";
        $sSearchVal = $arr['search[value]'];
        if (isset($sSearchVal) && $sSearchVal != '') {
            $sWhere = "WHERE (";
            for ($i = 0; $i < count($aColumns); $i++) {
                $sWhere .= $aColumns[$i] . " LIKE '%" . $this->db->escape_like_str($sSearchVal) . "%' OR ";
            }
            $sWhere = substr_replace($sWhere, "", -3);
            $sWhere .= ')';
        }

        /* Individual column filtering */
        $sSearchReg = $arr['search[regex]'];
        for ($i = 0; $i < count($aColumns); $i++) {
            $bSearchable_ = $arr['columns[' . $i . '][searchable]'];
            if (isset($bSearchable_) && $bSearchable_ == "true" && $sSearchReg != 'false') {
                $search_val = $arr['columns[' . $i . '][search][value]'];
                if ($sWhere == "") {
                    $sWhere = "WHERE ";
                } else {
                    $sWhere .= " AND ";
                }
                $sWhere .= $aColumns[$i] . " LIKE '%" . $this->db->escape_like_str($search_val) . "%' ";
            }
        }

        /*
         * SQL queries
         * Get data to display
         */
        $sQuery = "SELECT SQL_CALC_FOUND_ROWS " . str_replace(" , ", " ", implode(", ", $aColumns)) . "
        FROM HSM_ADMIN
        $sWhere
        $sOrder
        $sLimit
        ";
        $rResult = $this->db->query($sQuery);

        /* Data set length after filtering */
        $sQuery = "SELECT FOUND_ROWS() AS length_count";
        $rResultFilterTotal = $this->db->query($sQuery);
        $aResultFilterTotal = $rResultFilterTotal->row();
        $iFilteredTotal = $aResultFilterTotal->length_count;

        /*
         * Output
         */
        $sEcho = $this->input->get_post('draw', true);
        $output = array(
            "draw" => intval($sEcho),
            "recordsTotal" => $iTotal,
            "recordsFiltered" => $iFilteredTotal,
            "data" => array()
        );
        foreach ($rResult->result_array() as $aRow) {
            $row = array();
            foreach ($aColumns as $col) {
                $row[] = $aRow[$col];                
            }

            

            

            // Profile Image
            if($row[1]){
                $row[1] = '<img class="profileimg img-circle img-sm" src="'.base_url().'assests/uploads/users/'.$row[1].'">';    
            }else{
                $row[1] = '<img class="profileimg img-circle img-sm" src="'.base_url().'assests/admin/assets/images/placeholder.jpg">';
            }

//$user_type=$row[4];
            // Usertype
            if($row[4] == 1)
                $row[4] = '<span class="label label-success">SuperAdmin</span>';
            else
                $row[4] = '<span class="label label-danger">Admin</span>';

            //Online Status            
            /*if($row[5] == 1)
                $row[5] = '<span class="label label-success"> Online </span>';
            else
                $row[5] = '<span class="label label-danger"> Offline </span>';*/

            //Status
            if($row[5] == 1)
                $row[5] = '<span class="label label-success"> Active </span>';
            else
                $row[5] = '<span class="label label-danger"> In Active </span>';

$e_href="";
$d_href="";
        
$adminpermission=getadminpermissionbyId($_SESSION['logbyadmin']['id']);
       
if(isset($adminpermission) && $adminpermission->view==1 && $adminpermission->edit==1){
$e_href=base_url('admin/editadmin').'/'.$row[0];
}
 if(isset($adminpermission) &&  $adminpermission->view==1 && $adminpermission->delete==1){
$d_href=base_url('admin/deleteadmin').'/'.$row[0];
}
   
            $row[7] = '<ul class="icons-list">
                            <li class="dropdown">
                                <a data-toggle="dropdown" class="dropdown-toggle" href="#" aria-expanded="false">
                                    <i class="icon-menu9"></i>
                                </a>
                                <ul class="dropdown-menu dropdown-menu-right">
                                    <li><a href='.$e_href.'><i class="icon-file-excel"></i> View / Edit </a></li>
                                    <li><a href='.$d_href.'><i class="icon-file-excel"></i> Delete </a></li>
                                </ul>
                            </li>
                        </ul>';
                    
                    
            $output['data'][] = $row;
        }
        return $output;
    }


    public function saveAdmin($records,$permission){
        $query = $this->db->insert('HSM_ADMIN',$records);
        $insert_id = $this->db->insert_id();

 /*admin*/       

 $data=array('user_id'=>$insert_id,'module_id'=>MANAGEADMIN,'add'=>$permission['add'],'edit'=>$permission['edit'],'view'=>$permission['view'],'delete'=>$permission['delete']);
 $result= $this->db->insert('T_PERMISSION',$data);

/*classified*/

$data=array('user_id'=>$insert_id,'module_id'=>MANAGECLASSIFIED,'add'=>$permission['cl_add'],'edit'=>$permission['cl_edit'],'view'=>$permission['cl_view'],'delete'=>$permission['cl_delete']);
$result= $this->db->insert('T_PERMISSION',$data);

/*Category*/

$data=array('user_id'=>$insert_id,'module_id'=>MANAGECATEGORY,'add'=>$permission['ca_add'],'edit'=>$permission['ca_edit'],'view'=>$permission['ca_view'],'delete'=>$permission['ca_delete']);
$result= $this->db->insert('T_PERMISSION',$data);

/*profession*/

$data=array('user_id'=>$insert_id,'module_id'=>MANAGEPROFESSION,'add'=>$permission['pr_add'],'edit'=>$permission['pr_edit'],'view'=>$permission['pr_view'],'delete'=>$permission['pr_delete']);
$result= $this->db->insert('T_PERMISSION',$data);

/*feeedback */

$data=array('user_id'=>$insert_id,'module_id'=>MANAGEFEEDBACK,'edit'=>$permission['fb_edit'],'view'=>$permission['fb_view'],'delete'=>$permission['fb_delete']);
$result= $this->db->insert('T_PERMISSION',$data);

/* User */

$data=array('user_id'=>$insert_id,'module_id'=>MANAGEUSERS,'edit'=>$permission['user_edit'],'view'=>$permission['user_view'],'delete'=>$permission['user_delete']);
$result= $this->db->insert('T_PERMISSION',$data);

/*Enquiry*/

$data=array('user_id'=>$insert_id,'module_id'=>MANAGEENQUIRY,'edit'=>$permission['en_edit'],'view'=>$permission['en_view'],'delete'=>$permission['en_delete']);
$result= $this->db->insert('T_PERMISSION',$data);

        return  $insert_id;
    }


    public function updateAdmin($records,$id,$permission){        

        $this->db->where('id', $id);
        $this->db->update('HSM_ADMIN', $records); 

 /*admin*/

        $data=array('add'=>$permission['add'],'edit'=>$permission['edit'],'view'=>$permission['view'],'delete'=>$permission['delete'],'d_modified'=>$permission['d_modified']);
        $this->db->where('user_id', $id);
        $this->db->where('module_id',MANAGEADMIN);
        $result= $this->db->update('T_PERMISSION',$data);


/*classified*/

$data=array('add'=>$permission['cl_add'],'edit'=>$permission['cl_edit'],'view'=>$permission['cl_view'],'delete'=>$permission['cl_delete']);
$data['d_modified']=$permission['d_modified'];
$this->db->where('user_id', $id);
$this->db->where('module_id',MANAGECLASSIFIED);
$result= $this->db->update('T_PERMISSION',$data);

/*Category*/

$data=array('add'=>$permission['ca_add'],'edit'=>$permission['ca_edit'],'view'=>$permission['ca_view'],'delete'=>$permission['ca_delete']);
$data['d_modified']=$permission['d_modified'];
$this->db->where('user_id', $id);
$this->db->where('module_id',MANAGECATEGORY);
$result= $this->db->update('T_PERMISSION',$data);

/*profession*/

$data=array('add'=>$permission['pr_add'],'edit'=>$permission['pr_edit'],'view'=>$permission['pr_view'],'delete'=>$permission['pr_delete']);
$data['d_modified']=$permission['d_modified'];
$this->db->where('user_id', $id);
$this->db->where('module_id',MANAGEPROFESSION);
$result= $this->db->update('T_PERMISSION',$data);

/*feeedback */

$data=array('edit'=>$permission['fb_edit'],'view'=>$permission['fb_view'],'delete'=>$permission['fb_delete']);
$data['d_modified']=$permission['d_modified'];
$this->db->where('user_id', $id);
$this->db->where('module_id',MANAGEFEEDBACK);
$result= $this->db->update('T_PERMISSION',$data);


/* User */

$data=array('edit'=>$permission['user_edit'],'view'=>$permission['user_view'],'delete'=>$permission['user_delete']);
$data['d_modified']=$permission['d_modified'];
$this->db->where('user_id', $id);
$this->db->where('module_id',MANAGEUSERS);
$result= $this->db->update('T_PERMISSION',$data);

/*Enquiry*/

$data=array('edit'=>$permission['en_edit'],'view'=>$permission['en_view'],'delete'=>$permission['en_delete']);
$data['d_modified']=$permission['d_modified'];
$this->db->where('user_id', $id);
$this->db->where('module_id',MANAGEENQUIRY);
$result= $this->db->update('T_PERMISSION',$data);


    }

    public function deleteAdmin($id){
        $this->db->where('id',$id);
        $this->db->delete('HSM_ADMIN');
        return true;
    }

    public function isadminuserexists($username){
        $limit = 1;
        $query = $this->db->get_where('HSM_ADMIN', array('username' => $username), $limit);
        if($query -> num_rows() == 1)
            return $query->result();
        else
            return false;
    }









    public function getclientlist() {
        $aColumns = array(
            'id',
            'ProfileImage',
            'FullName',
            'Phone_no',
            'created_by',
            'Online_status',
            'user_status',
            'd_created'
        );
        $sIndexColumn = "id";

        /* Total data set length */
        $sQuery = "SELECT COUNT('".$sIndexColumn."') AS row_count FROM T_APP_USERS";
        $rResultTotal = $this->db->query($sQuery);
        $aResultTotal = $rResultTotal->row();
        $iTotal = $aResultTotal->row_count;

        /*
         * Paging
         */
        $sLimit = "";
        $iDisplayStart = $this->input->get_post('start', true);
        $iDisplayLength = $this->input->get_post('length', true);
        if (isset($iDisplayStart) && $iDisplayLength != '-1') {
            $sLimit = "LIMIT " . intval($iDisplayStart) . ", " .
            intval($iDisplayLength);
        }

        $uri_string = $_SERVER['QUERY_STRING'];
        $uri_string = preg_replace("/\%5B/", '[', $uri_string);
        $uri_string = preg_replace("/\%5D/", ']', $uri_string);

        $get_param_array = explode("&", $uri_string);
        $arr = array();
        foreach ($get_param_array as $value) {
            $v = $value;
            $explode = explode("=", $v);
            $arr[$explode[0]] = $explode[1];
        }

        $index_of_columns = strpos($uri_string, "columns", 1);
        $index_of_start = strpos($uri_string, "start");
        $uri_columns = substr($uri_string, 7, ($index_of_start - $index_of_columns - 1));
        $columns_array = explode("&", $uri_columns);
        $arr_columns = array();
        foreach ($columns_array as $value) {
            $v = $value;
            $explode = explode("=", $v);
            if (count($explode) == 2) {
                $arr_columns[$explode[0]] = $explode[1];
            } else {
                $arr_columns[$explode[0]] = '';
            }
        }

        /*
         * Ordering
         */
        $sOrder = "ORDER BY ";
        $sOrderIndex = $arr['order[0][column]'];
        $sOrderDir = $arr['order[0][dir]'];
        $bSortable_ = $arr_columns['columns[' . $sOrderIndex . '][orderable]'];
        if ($bSortable_ == "true") {
            $sOrder .= $aColumns[$sOrderIndex] .
                    ($sOrderDir === 'asc' ? ' asc' : ' desc');
        }

        /*
         * Filtering
         */
        $sWhere = "";
        $sSearchVal = $arr['search[value]'];
        if (isset($sSearchVal) && $sSearchVal != '') {
            $sWhere = "WHERE (";
            for ($i = 0; $i < count($aColumns); $i++) {
                $sWhere .= $aColumns[$i] . " LIKE '%" . $this->db->escape_like_str($sSearchVal) . "%' OR ";
            }
            $sWhere = substr_replace($sWhere, "", -3);
            $sWhere .= ')';
        }

        /* Individual column filtering */
        $sSearchReg = $arr['search[regex]'];
        for ($i = 0; $i < count($aColumns); $i++) {
            $bSearchable_ = $arr['columns[' . $i . '][searchable]'];
            if (isset($bSearchable_) && $bSearchable_ == "true" && $sSearchReg != 'false') {
                $search_val = $arr['columns[' . $i . '][search][value]'];
                if ($sWhere == "") {
                    $sWhere = "WHERE ";
                } else {
                    $sWhere .= " AND ";
                }
                $sWhere .= $aColumns[$i] . " LIKE '%" . $this->db->escape_like_str($search_val) . "%' ";
            }
        }

        /*
         * SQL queries
         * Get data to display
         */
        $sQuery = "SELECT SQL_CALC_FOUND_ROWS " . str_replace(" , ", " ", implode(", ", $aColumns)) . "
        FROM T_APP_USERS
        $sWhere
        $sOrder
        $sLimit
        ";
        $rResult = $this->db->query($sQuery);

        /* Data set length after filtering */
        $sQuery = "SELECT FOUND_ROWS() AS length_count";
        $rResultFilterTotal = $this->db->query($sQuery);
        $aResultFilterTotal = $rResultFilterTotal->row();
        $iFilteredTotal = $aResultFilterTotal->length_count;

        /*
         * Output
         */
        $sEcho = $this->input->get_post('draw', true);
        $output = array(
            "draw" => intval($sEcho),
            "recordsTotal" => $iTotal,
            "recordsFiltered" => $iFilteredTotal,
            "data" => array()
        );
        foreach ($rResult->result_array() as $aRow) {
            $row = array();
            foreach ($aColumns as $col) {
                $row[] = $aRow[$col];                
            }

            

            

            // Profile Image
            if($row[1]){
                $row[1] = '<img class="profileimg img-circle img-sm" src="'.base_url().'assests/uploads/users/'.$row[1].'">';    
            }else{
                $row[1] = '<img class="profileimg img-circle img-sm" src="'.base_url().'assests/admin/assets/images/placeholder.jpg">';
            }

            // Usertype
            /*if($row[4] == 1)
                $row[4] = '<span class="label label-success"> SuperAdmin </span>';
            else
                $row[4] = '<span class="label label-danger"> Admin </span>';*/

            //Online Status            
            if($row[5] == 1)
                $row[5] = '<span class="label label-success"> Online </span>';
            else
                $row[5] = '<span class="label label-danger"> Offline </span>';

            //Status
            if($row[6] == 1)
                $row[6] = '<span class="label label-success"> Active </span>';
            else
                $row[6] = '<span class="label label-danger"> In Active </span>';

            $row[8] = '<ul class="icons-list">
                            <li class="dropdown">
                                <a data-toggle="dropdown" class="dropdown-toggle" href="#" aria-expanded="false">
                                    <i class="icon-menu9"></i>
                                </a>
                                <ul class="dropdown-menu dropdown-menu-right">

                                    <li><a id="edit_admin" href="'.base_url('admin/editadmin').'/'.$row[0].'"><i class="icon-file-excel edit_admin"></i> Edit </a></li>
                                    <li><a id="delete_admin" href="'.base_url('admin/deleteadmin').'/'.$row[0].'"><i class="icon-file-excel delete_admin"></i> Delete </a></li>
                                </ul>
                            </li>
                        </ul>';
            $output['data'][] = $row;
        }
        return $output;
    }






    public function getUsersCount(){
        return $this->db->count_all('T_APP_USERS');
    }










    



    

    public function getTodayUsersCount(){
        /*$query = $this->db->query('SELECT * FROM `bluefills_users` WHERE DATE(`created`) = CURDATE()');
        return $result = $query->num_rows();*/
        $from_date = date('Y-m-d 00:00:00');
        $to_date = date('Y-m-d 23:59:59'); 
        $this->db->select("*");
        $this->db->where('d_created BETWEEN "'. $from_date . '" AND "'. $to_date .'"');
        $this->db->from("T_APP_USERS");
        $query = $this->db->get();
        return $result = $query->num_rows();
    }

    public function getalluserinfobyId($id){
        $this -> db -> select('*');
        $this -> db -> from('T_APP_USERS');
        $this -> db -> where('id', $id);
        $this -> db -> limit(1);     
        $query = $this -> db -> get();     
        if($query -> num_rows() == 1){
            return $query->result();
        }else{
            return false;
        }
    }

    

    public function getTodayUsers(){
        /*$query = $this->db->query('SELECT * FROM `bluefills_users` WHERE DATE(`created`) = CURDATE()');
        return $result = $query->num_rows();*/
        $from_date = date('Y-m-d 00:00:00');
        $to_date = date('Y-m-d 23:59:59'); 
        $this->db->select("*");
        $this->db->where('d_created BETWEEN "'. $from_date . '" AND "'. $to_date .'"');
        $this->db->from("T_APP_USERS");
        $query = $this->db->get();
        return $result = $query->result();
    }



    public function getMyFriends($id){
        $this->db->select('bluefills_users.id,bluefills_users.firstname,bluefills_users.lastname,bluefills_users.email,bluefills_users.location,bluefills_users.profileimg,bluefills_friends.status');
        $this->db->from('bluefills_friends');
        $this->db->join('bluefills_users', 'bluefills_friends.friend_id = bluefills_users.id');
        $this->db->where('bluefills_friends.refer_id',$id);
        $this->db->where('bluefills_friends.status','1');
        $this->db->where('bluefills_users.status',1);
        $query = $this->db->get()->result();
        return $query;
    }

    public function getLatestMyFriends($id,$limit){
        $this->db->select('bluefills_users.id,bluefills_users.firstname,bluefills_users.lastname,bluefills_users.email,bluefills_users.location,bluefills_users.profileimg,bluefills_friends.status');
        $this->db->from('bluefills_friends');
        $this->db->join('bluefills_users', 'bluefills_friends.friend_id = bluefills_users.id');
        $this->db->where('bluefills_friends.refer_id',$id);
        $this->db->where('bluefills_friends.status','1');
        $this->db->where('bluefills_users.status',1);
        $this->db->limit($limit);
        $this->db->order_by("bluefills_friends.id", "desc"); 
        $query = $this->db->get()->result();
        return $query;
    }


    public function getMyFriendsCount($id){
        $this->db->select('bluefills_users.id,bluefills_users.firstname,bluefills_users.lastname,bluefills_users.email,bluefills_users.location,bluefills_users.profileimg,bluefills_friends.status');
        $this->db->from('bluefills_friends');
        $this->db->join('bluefills_users', 'bluefills_friends.friend_id = bluefills_users.id');
        $this->db->where('bluefills_friends.refer_id',$id);
        $this->db->where('bluefills_friends.status','1');
        $this->db->where('bluefills_users.status',1);
        $query = $this->db->get()->num_rows();
        return $query;
    }


    public function getLatestEventsList($id,$limit){
        $today_date = date('Y-m-d');
        $query = $this->db->get_where('bluefills_events', array('user_id' => $id, 'event_status' => 1 ), $limit);
        if($query -> num_rows() >= 1)
            return $query->result();
        else
            return false;
    }


    public function getEventsCountbyId($id){
        $today_date = date('Y-m-d');
        $query = $this->db->get_where('bluefills_events', array('user_id' => $id, 'event_status' => 1 ));
        if($query -> num_rows() >= 1)
            return $query->num_rows();
        else
            return false;
    }


    public function getLatestMyWallet($id,$limit){
        $this->db->select('*');
        $this->db->from('bluefills_giftwallets');
        $this->db->join('bluefills_giftrecords', 'bluefills_giftrecords.record_id = bluefills_giftwallets.giftrecord_id');
        $this->db->join('bluefills_events', 'bluefills_giftrecords.event_id = bluefills_events.event_id');
        $this->db->join('bluefills_users', 'bluefills_giftrecords.user_id = bluefills_users.id');   
        $this->db->where(array(
            'bluefills_giftrecords.gift_type' => 'wallet', 
            'bluefills_giftrecords.gift_status' => 1,
            'bluefills_giftwallets.wallet_status' => 1,
        ));
        $query = $this->db->get();
        if($query -> num_rows() >= 1)
            return $query->result();
        else
            return false;     
    }

    




    


    #contactLists
    public function getcontactlist(){
        $aColumns = array(
            'id',
            'name',
            'to',
            'status',
            'created',
        );
        $sIndexColumn = "id";

        $sQuery = "SELECT COUNT('".$sIndexColumn."') AS row_count FROM bluefills_contacts";
        $rResultTotal = $this->db->query($sQuery);
        $aResultTotal = $rResultTotal->row();
        $iTotal = $aResultTotal->row_count;

        $sLimit = "";
        $iDisplayStart = $this->input->get_post('start', true);
        $iDisplayLength = $this->input->get_post('length', true);
        if (isset($iDisplayStart) && $iDisplayLength != '-1') {
            $sLimit = "LIMIT " . intval($iDisplayStart) . ", " .
            intval($iDisplayLength);
        }

        $uri_string = $_SERVER['QUERY_STRING'];
        $uri_string = preg_replace("/\%5B/", '[', $uri_string);
        $uri_string = preg_replace("/\%5D/", ']', $uri_string);

        $get_param_array = explode("&", $uri_string);
        $arr = array();
        foreach ($get_param_array as $value) {
            $v = $value;
            $explode = explode("=", $v);
            $arr[$explode[0]] = $explode[1];
        }

        $index_of_columns = strpos($uri_string, "columns", 1);
        $index_of_start = strpos($uri_string, "start");
        $uri_columns = substr($uri_string, 7, ($index_of_start - $index_of_columns - 1));
        $columns_array = explode("&", $uri_columns);
        $arr_columns = array();
        foreach ($columns_array as $value) {
            $v = $value;
            $explode = explode("=", $v);
            if (count($explode) == 2) {
                $arr_columns[$explode[0]] = $explode[1];
            } else {
                $arr_columns[$explode[0]] = '';
            }
        }

        
        $sOrder = "ORDER BY ";
        $sOrderIndex = $arr['order[0][column]'];
        $sOrderDir = $arr['order[0][dir]'];
        $bSortable_ = $arr_columns['columns[' . $sOrderIndex . '][orderable]'];
        if ($bSortable_ == "true") {
            $sOrder .= $aColumns[$sOrderIndex] .
                    ($sOrderDir === 'asc' ? ' asc' : ' desc');
        }

        $sWhere = "";
        $sSearchVal = $arr['search[value]'];
        if (isset($sSearchVal) && $sSearchVal != '') {
            $sWhere = "WHERE (";
            for ($i = 0; $i < count($aColumns); $i++) {
                $sWhere .= $aColumns[$i] . " LIKE '%" . $this->db->escape_like_str($sSearchVal) . "%' OR ";
            }
            $sWhere = substr_replace($sWhere, "", -3);
            $sWhere .= ')';
            #$sWhere .= ') AND event_type = "global"';
        }
        //echo $sWhere; exit;
        /* Individual column filtering */
        $sSearchReg = $arr['search[regex]'];
        for ($i = 0; $i < count($aColumns); $i++) {
            $bSearchable_ = $arr['columns[' . $i . '][searchable]'];
            if (isset($bSearchable_) && $bSearchable_ == "true" && $sSearchReg != 'false') {
                $search_val = $arr['columns[' . $i . '][search][value]'];
                if ($sWhere == "") {
                    $sWhere = "WHERE ";
                } else {
                    $sWhere .= " AND ";
                }
                $sWhere .= $aColumns[$i] . " LIKE '%" . $this->db->escape_like_str($search_val) . "%' ";
            }
        }

        /*if($sWhere == ''){
           $sWhere = "WHERE event_type='global'"; 
        }*/

        /*
         * SQL queries
         * Get data to display
         */
        $sQuery = "SELECT SQL_CALC_FOUND_ROWS " . str_replace(" , ", " ", implode(", ", $aColumns)) . "
        FROM bluefills_contacts
        $sWhere
        $sOrder
        $sLimit
        ";
        $rResult = $this->db->query($sQuery);

        /* Data set length after filtering */
        $sQuery = "SELECT FOUND_ROWS() AS length_count";
        $rResultFilterTotal = $this->db->query($sQuery);
        $aResultFilterTotal = $rResultFilterTotal->row();
        $iFilteredTotal = $aResultFilterTotal->length_count;

        
        /*
         * Output
         */
        $sEcho = $this->input->get_post('draw', true);
        $output = array(
            "draw" => intval($sEcho),
            "recordsTotal" => $iTotal,
            "recordsFiltered" => $iFilteredTotal,
            "data" => array()
        );
        foreach ($rResult->result_array() as $aRow) {
            $row = array();
            foreach ($aColumns as $col) {
                $row[] = $aRow[$col];                
            }



            


           /* if($row[3] == 1)
                $row[3] = '<span class="label label-success"> Active </span>';
            else
                $row[3] = '<span class="label label-danger"> Inactive </span>';
            

            $row[5] = '<ul class="icons-list">
                            <li class="dropdown">
                                <a data-toggle="dropdown" class="dropdown-toggle" href="#" aria-expanded="false">
                                    <i class="icon-menu9"></i>
                                </a>
                                <ul class="dropdown-menu dropdown-menu-right">
                                    <li><a href="'.base_url('admin/viewsub').'/'.$row[0].'"><i class="icon-file-excel"></i> View </a></li>
                                </ul>
                            </li>
                        </ul>';*/
            
            $output['data'][] = $row;
        }
        return $output;
    }


    # Subscribers
    public function getsubscriptionlist(){
        $aColumns = array(
            'subscriber_id',
            'subscriber_name',
            'subscriber_email',
            'subscriber_status',
            'subscriber_created',
        );
        $sIndexColumn = "subscriber_id";

        $sQuery = "SELECT COUNT('".$sIndexColumn."') AS row_count FROM tbl_subscribers";
        $rResultTotal = $this->db->query($sQuery);
        $aResultTotal = $rResultTotal->row();
        $iTotal = $aResultTotal->row_count;

        $sLimit = "";
        $iDisplayStart = $this->input->get_post('start', true);
        $iDisplayLength = $this->input->get_post('length', true);
        if (isset($iDisplayStart) && $iDisplayLength != '-1') {
            $sLimit = "LIMIT " . intval($iDisplayStart) . ", " .
            intval($iDisplayLength);
        }

        $uri_string = $_SERVER['QUERY_STRING'];
        $uri_string = preg_replace("/\%5B/", '[', $uri_string);
        $uri_string = preg_replace("/\%5D/", ']', $uri_string);

        $get_param_array = explode("&", $uri_string);
        $arr = array();
        foreach ($get_param_array as $value) {
            $v = $value;
            $explode = explode("=", $v);
            $arr[$explode[0]] = $explode[1];
        }

        $index_of_columns = strpos($uri_string, "columns", 1);
        $index_of_start = strpos($uri_string, "start");
        $uri_columns = substr($uri_string, 7, ($index_of_start - $index_of_columns - 1));
        $columns_array = explode("&", $uri_columns);
        $arr_columns = array();
        foreach ($columns_array as $value) {
            $v = $value;
            $explode = explode("=", $v);
            if (count($explode) == 2) {
                $arr_columns[$explode[0]] = $explode[1];
            } else {
                $arr_columns[$explode[0]] = '';
            }
        }

        
        $sOrder = "ORDER BY ";
        $sOrderIndex = $arr['order[0][column]'];
        $sOrderDir = $arr['order[0][dir]'];
        $bSortable_ = $arr_columns['columns[' . $sOrderIndex . '][orderable]'];
        if ($bSortable_ == "true") {
            $sOrder .= $aColumns[$sOrderIndex] .
                    ($sOrderDir === 'asc' ? ' asc' : ' desc');
        }

        $sWhere = "";
        $sSearchVal = $arr['search[value]'];
        if (isset($sSearchVal) && $sSearchVal != '') {
            $sWhere = "WHERE (";
            for ($i = 0; $i < count($aColumns); $i++) {
                $sWhere .= $aColumns[$i] . " LIKE '%" . $this->db->escape_like_str($sSearchVal) . "%' OR ";
            }
            $sWhere = substr_replace($sWhere, "", -3);
            $sWhere .= ')';
            #$sWhere .= ') AND event_type = "global"';
        }
        //echo $sWhere; exit;
        /* Individual column filtering */
        $sSearchReg = $arr['search[regex]'];
        for ($i = 0; $i < count($aColumns); $i++) {
            $bSearchable_ = $arr['columns[' . $i . '][searchable]'];
            if (isset($bSearchable_) && $bSearchable_ == "true" && $sSearchReg != 'false') {
                $search_val = $arr['columns[' . $i . '][search][value]'];
                if ($sWhere == "") {
                    $sWhere = "WHERE ";
                } else {
                    $sWhere .= " AND ";
                }
                $sWhere .= $aColumns[$i] . " LIKE '%" . $this->db->escape_like_str($search_val) . "%' ";
            }
        }

        /*if($sWhere == ''){
           $sWhere = "WHERE event_type='global'"; 
        }*/

        /*
         * SQL queries
         * Get data to display
         */
        $sQuery = "SELECT SQL_CALC_FOUND_ROWS " . str_replace(" , ", " ", implode(", ", $aColumns)) . "
        FROM tbl_subscribers
        $sWhere
        $sOrder
        $sLimit
        ";
        $rResult = $this->db->query($sQuery);

        /* Data set length after filtering */
        $sQuery = "SELECT FOUND_ROWS() AS length_count";
        $rResultFilterTotal = $this->db->query($sQuery);
        $aResultFilterTotal = $rResultFilterTotal->row();
        $iFilteredTotal = $aResultFilterTotal->length_count;

        /*
         * Output
         */
        $sEcho = $this->input->get_post('draw', true);
        $output = array(
            "draw" => intval($sEcho),
            "recordsTotal" => $iTotal,
            "recordsFiltered" => $iFilteredTotal,
            "data" => array()
        );
        foreach ($rResult->result_array() as $aRow) {
            $row = array();
            foreach ($aColumns as $col) {
                $row[] = $aRow[$col];                
            }



            


            if($row[3] == 1)
                $row[3] = '<span class="label label-success"> Active </span>';
            else
                $row[3] = '<span class="label label-danger"> Inactive </span>';
            

            $row[5] = '<ul class="icons-list">
                            <li class="dropdown">
                                <a data-toggle="dropdown" class="dropdown-toggle" href="#" aria-expanded="false">
                                    <i class="icon-menu9"></i>
                                </a>
                                <ul class="dropdown-menu dropdown-menu-right">
                                    <li><a href="'.base_url('admin/viewsub').'/'.$row[0].'"><i class="icon-file-excel"></i> View </a></li>
                                </ul>
                            </li>
                        </ul>';
            
            $output['data'][] = $row;
        }
        return $output;
    }



    public function getorderslist() {
        $aColumns = array(
            'order_id',
            'increment_id',
            'transaction_id',
            'extension_id',
            'transaction_amount',
            'currency_code',
            'order_status',
            'created'
        );
        $sIndexColumn = "order_id";

        $sQuery = "SELECT COUNT('".$sIndexColumn."') AS row_count FROM bluefills_orders";
        $rResultTotal = $this->db->query($sQuery);
        $aResultTotal = $rResultTotal->row();
        $iTotal = $aResultTotal->row_count;

        $sLimit = "";
        $iDisplayStart = $this->input->get_post('start', true);
        $iDisplayLength = $this->input->get_post('length', true);
        if (isset($iDisplayStart) && $iDisplayLength != '-1') {
            $sLimit = "LIMIT " . intval($iDisplayStart) . ", " .
            intval($iDisplayLength);
        }

        $uri_string = $_SERVER['QUERY_STRING'];
        $uri_string = preg_replace("/\%5B/", '[', $uri_string);
        $uri_string = preg_replace("/\%5D/", ']', $uri_string);

        $get_param_array = explode("&", $uri_string);
        $arr = array();
        foreach ($get_param_array as $value) {
            $v = $value;
            $explode = explode("=", $v);
            $arr[$explode[0]] = $explode[1];
        }

        $index_of_columns = strpos($uri_string, "columns", 1);
        $index_of_start = strpos($uri_string, "start");
        $uri_columns = substr($uri_string, 7, ($index_of_start - $index_of_columns - 1));
        $columns_array = explode("&", $uri_columns);
        $arr_columns = array();
        foreach ($columns_array as $value) {
            $v = $value;
            $explode = explode("=", $v);
            if (count($explode) == 2) {
                $arr_columns[$explode[0]] = $explode[1];
            } else {
                $arr_columns[$explode[0]] = '';
            }
        }

        
        $sOrder = "ORDER BY ";
        $sOrderIndex = $arr['order[0][column]'];
        $sOrderDir = $arr['order[0][dir]'];
        $bSortable_ = $arr_columns['columns[' . $sOrderIndex . '][orderable]'];
        if ($bSortable_ == "true") {
            $sOrder .= $aColumns[$sOrderIndex] .
                    ($sOrderDir === 'asc' ? ' asc' : ' desc');
        }

        $sWhere = "";
        $sSearchVal = $arr['search[value]'];
        if (isset($sSearchVal) && $sSearchVal != '') {
            $sWhere = "WHERE (";
            for ($i = 0; $i < count($aColumns); $i++) {
                $sWhere .= $aColumns[$i] . " LIKE '%" . $this->db->escape_like_str($sSearchVal) . "%' OR ";
            }
            $sWhere = substr_replace($sWhere, "", -3);
            $sWhere .= ')';
            #$sWhere .= ') AND event_type = "global"';
        }
        //echo $sWhere; exit;
        /* Individual column filtering */
        $sSearchReg = $arr['search[regex]'];
        for ($i = 0; $i < count($aColumns); $i++) {
            $bSearchable_ = $arr['columns[' . $i . '][searchable]'];
            if (isset($bSearchable_) && $bSearchable_ == "true" && $sSearchReg != 'false') {
                $search_val = $arr['columns[' . $i . '][search][value]'];
                if ($sWhere == "") {
                    $sWhere = "WHERE ";
                } else {
                    $sWhere .= " AND ";
                }
                $sWhere .= $aColumns[$i] . " LIKE '%" . $this->db->escape_like_str($search_val) . "%' ";
            }
        }

        /*if($sWhere == ''){
           $sWhere = "WHERE event_type='global'"; 
        }*/

        /*
         * SQL queries
         * Get data to display
         */
        $sQuery = "SELECT SQL_CALC_FOUND_ROWS " . str_replace(" , ", " ", implode(", ", $aColumns)) . "
        FROM bluefills_orders
        $sWhere
        $sOrder
        $sLimit
        ";
        $rResult = $this->db->query($sQuery);

        /* Data set length after filtering */
        $sQuery = "SELECT FOUND_ROWS() AS length_count";
        $rResultFilterTotal = $this->db->query($sQuery);
        $aResultFilterTotal = $rResultFilterTotal->row();
        $iFilteredTotal = $aResultFilterTotal->length_count;

        /*
         * Output
         */
        $sEcho = $this->input->get_post('draw', true);
        $output = array(
            "draw" => intval($sEcho),
            "recordsTotal" => $iTotal,
            "recordsFiltered" => $iFilteredTotal,
            "data" => array()
        );
        foreach ($rResult->result_array() as $aRow) {
            $row = array();
            foreach ($aColumns as $col) {
                $row[] = $aRow[$col];                
            }



            if($row[5] == 'inr'){
                $symbol = '₹';
                $row[5] = '<span class="btn btn-success"> CCAvenue </span>';
            }
            else{
                $symbol = '$';
                $row[5] = '<span class="btn btn-primary"> Paypal </span>';
            }

            $row[4] = $row[4].' '.$symbol;


            if($row[6] == 'completed')
                $row[6] = '<span class="label label-success"> '.$row[6].' </span>';
            elseif ($row[6] == 'pending') {
                $row[6] = '<span class="label label-default"> '.$row[6].' </span>';
            }else{
                $row[6] = '<span class="label label-danger"> '.$row[6].' </span>';
            }


            


            $row[8] = '<ul class="icons-list">
                            <li class="dropdown">
                                <a data-toggle="dropdown" class="dropdown-toggle" href="#" aria-expanded="false">
                                    <i class="icon-menu9"></i>
                                </a>
                                <ul class="dropdown-menu dropdown-menu-right">
                                    <li><a href="'.base_url('admin/vieworders').'/'.$row[0].'"><i class="icon-file-excel"></i> View </a></li>
                                </ul>
                            </li>
                        </ul>';
            
            $output['data'][] = $row;
        }
        return $output;
    }

    public function saveMerchant($records){
        $query = $this->db->insert('bluefills_apiservice',$records);
        $insert_id = $this->db->insert_id();
        return  $insert_id;
    }

    public function updateMerchant($records,$id){        
        $this->db->where('id', $id);
        $this->db->update('bluefills_apiservice', $records); 
    }

    


    public function getAllUsers($limit,$offset){
        $query = $this->db->get_where('bluefills_users', array('status' => 1 ), $limit, $offset);
        if($query->num_rows() >= 1)
            return $query->result();
        else
            return false;   
    } 


    
    function getapilist() {
        /* Array of table columns which should be read and sent back to DataTables. Use a space where
         * you want to insert a non-database field (for example a counter or static image)
         */
        $aColumns = array(
            'id',
            'merchant',
            'username',
            'password',
            'created',
            'status');

        /* Indexed column (used for fast and accurate table cardinality) */
        $sIndexColumn = "id";

        /* Total data set length */
        $sQuery = "SELECT COUNT('" . $sIndexColumn . "') AS row_count
            FROM bluefills_apiservice";
        $rResultTotal = $this->db->query($sQuery);
        $aResultTotal = $rResultTotal->row();
        $iTotal = $aResultTotal->row_count;

        /*
         * Paging
         */
        $sLimit = "";
        $iDisplayStart = $this->input->get_post('start', true);
        $iDisplayLength = $this->input->get_post('length', true);
        if (isset($iDisplayStart) && $iDisplayLength != '-1') {
            $sLimit = "LIMIT " . intval($iDisplayStart) . ", " .
                    intval($iDisplayLength);
        }

        $uri_string = $_SERVER['QUERY_STRING'];
        $uri_string = preg_replace("/\%5B/", '[', $uri_string);
        $uri_string = preg_replace("/\%5D/", ']', $uri_string);

        $get_param_array = explode("&", $uri_string);
        $arr = array();
        foreach ($get_param_array as $value) {
            $v = $value;
            $explode = explode("=", $v);
            $arr[$explode[0]] = $explode[1];
        }

        $index_of_columns = strpos($uri_string, "columns", 1);
        $index_of_start = strpos($uri_string, "start");
        $uri_columns = substr($uri_string, 7, ($index_of_start - $index_of_columns - 1));
        $columns_array = explode("&", $uri_columns);
        $arr_columns = array();
        foreach ($columns_array as $value) {
            $v = $value;
            $explode = explode("=", $v);
            if (count($explode) == 2) {
                $arr_columns[$explode[0]] = $explode[1];
            } else {
                $arr_columns[$explode[0]] = '';
            }
        }

        /*
         * Ordering
         */
        $sOrder = "ORDER BY ";
        $sOrderIndex = $arr['order[0][column]'];
        $sOrderDir = $arr['order[0][dir]'];
        $bSortable_ = $arr_columns['columns[' . $sOrderIndex . '][orderable]'];
        if ($bSortable_ == "true") {
            $sOrder .= $aColumns[$sOrderIndex] .
                    ($sOrderDir === 'asc' ? ' asc' : ' desc');
        }

        /*
         * Filtering
         */
        $sWhere = "";
        $sSearchVal = $arr['search[value]'];
        if (isset($sSearchVal) && $sSearchVal != '') {
            $sWhere = "WHERE (";
            for ($i = 0; $i < count($aColumns); $i++) {
                $sWhere .= $aColumns[$i] . " LIKE '%" . $this->db->escape_like_str($sSearchVal) . "%' OR ";
            }
            $sWhere = substr_replace($sWhere, "", -3);
            $sWhere .= ')';
        }

        /* Individual column filtering */
        $sSearchReg = $arr['search[regex]'];
        for ($i = 0; $i < count($aColumns); $i++) {
            $bSearchable_ = $arr['columns[' . $i . '][searchable]'];
            if (isset($bSearchable_) && $bSearchable_ == "true" && $sSearchReg != 'false') {
                $search_val = $arr['columns[' . $i . '][search][value]'];
                if ($sWhere == "") {
                    $sWhere = "WHERE ";
                } else {
                    $sWhere .= " AND ";
                }
                $sWhere .= $aColumns[$i] . " LIKE '%" . $this->db->escape_like_str($search_val) . "%' ";
            }
        }


        /*
         * SQL queries
         * Get data to display
         */
        $sQuery = "SELECT SQL_CALC_FOUND_ROWS " . str_replace(" , ", " ", implode(", ", $aColumns)) . "
        FROM bluefills_apiservice
        $sWhere
        $sOrder
        $sLimit
        ";
        $rResult = $this->db->query($sQuery);

        /* Data set length after filtering */
        $sQuery = "SELECT FOUND_ROWS() AS length_count";
        $rResultFilterTotal = $this->db->query($sQuery);
        $aResultFilterTotal = $rResultFilterTotal->row();
        $iFilteredTotal = $aResultFilterTotal->length_count;

        /*
         * Output
         */
        $sEcho = $this->input->get_post('draw', true);
        $output = array(
            "draw" => intval($sEcho),
            "recordsTotal" => $iTotal,
            "recordsFiltered" => $iFilteredTotal,
            "data" => array()
        );

        foreach ($rResult->result_array() as $aRow) {
            $row = array();
            foreach ($aColumns as $col) {
                $row[] = $aRow[$col];

            }
            if($row[5] == 1)
                $row[5] = '<span class="label label-success"> Active </span>';
            else
                $row[5] = '<span class="label label-danger"> Inactive </span>';


            $row[6] = '<ul class="icons-list">
                            <li class="dropdown">
                                <a data-toggle="dropdown" class="dropdown-toggle" href="#" aria-expanded="false">
                                    <i class="icon-menu9"></i>
                                </a>
                                <ul class="dropdown-menu dropdown-menu-right">
                                    <li><a href="'.base_url('admin/deletemerchant').'/'.$row[0].'"><i class="icon-file-excel"></i> Delete </a></li>
                                    <li><a href="'.base_url('admin/editmerchant').'/'.$row[0].'"><i class="icon-file-excel"></i> Edit </a></li>
                                </ul>
                            </li>
                        </ul>';




            $output['data'][] = $row;


        }



        return $output;
    }



    #API
    public function getApiInfobyId($id){
        $limit = 1;
        $query = $this->db->get_where('bluefills_apiservice', array('id' => $id ), $limit);
        if($query -> num_rows() >= 1)
            return $query->result();
        else
            return false;
    }

    public function deleteMerchant($id){
        $this->db->where('id',$id);
        $this->db->delete('bluefills_apiservice');
        return true;
    }

}