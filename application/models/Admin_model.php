<?php 
class Admin_model extends CI_Model {

	public function __construct(){
        parent::__construct();
    }

    public function isexists($username, $password){
        $limit = 1;
        $query = $this->db->get_where('hsm_admin', array('username' => $username,'password' => md5($password), 'status' => 1 ), $limit);
        if($query -> num_rows() == 1)
            return $query->result();
        else
            return false;
    }

    public function getadmininfobyId($id){
        $limit = 1;
        $query = $this->db->get_where('hsm_admin', array('id' => $id, 'status' => 1 ), $limit);
        if($query -> num_rows() == 1)
            return $query->result();
        else
            return false;
    }

    
    public function deleteAdmin($id){
        $this->db->where('id',$id);
        $this->db->delete('hsm_admin');
        return true;
    }

    public function isadminuserexists($username){
        $limit = 1;
        $query = $this->db->get_where('hsm_admin', array('username' => $username), $limit);
        if($query -> num_rows() == 1)
            return $query->result();
        else
            return false;
    }

    public function getUsersCount(){
        return $this->db->count_all('users');
    }    

    public function getTodayUsersCount(){
        $from_date = date('Y-m-d 00:00:00');
        $to_date = date('Y-m-d 23:59:59'); 
        $this->db->select("*");
        $this->db->where('created_at BETWEEN "'. $from_date . '" AND "'. $to_date .'"');
        $this->db->from("users");
        $query = $this->db->get();
        return $result = $query->num_rows();
    }

    public function getalluserinfobyId($id){
        $this -> db -> select('*');
        $this -> db -> from('users');
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
        $from_date = date('Y-m-d 00:00:00');
        $to_date = date('Y-m-d 23:59:59'); 
        $this->db->select("*");
        $this->db->where('created_at BETWEEN "'. $from_date . '" AND "'. $to_date .'"');
        $this->db->from("users");
        $query = $this->db->get();
        return $result = $query->result();
    }





    # Subscribers
    public function geteventlist(){
        $aColumns = array(
            'id',
            'name',
            'institution',
            'etypename',
            'etypecategory',
            'status',
        );
        $sIndexColumn = "id";

        $sQuery = "SELECT COUNT('".$sIndexColumn."') AS row_count FROM searchevents";
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
        FROM searchevents
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
          
            if($row[5] == 10)
                $row[5] = '<span class="label label-success"> Active </span>';
            else
                $row[5] = '<span class="label label-danger"> Inactive </span>';
           
            $row[6] = '<ul class="icons-list">
                            <li class="dropdown">
                                <a data-toggle="dropdown" class="dropdown-toggle" href="#" aria-expanded="false">
                                    <i class="icon-menu9"></i>
                                </a>
                                <ul class="dropdown-menu dropdown-menu-right">
                                    <li><a href="'.base_url('admin/view').'/'.$row[0].'"><i class="icon-file-excel"></i> Preview </a></li>
                                    <li><a href="'.base_url('admin/eventupdate').'?id='.$row[0].'&status=10"><i class="icon-file-excel"></i> Activate </a></li>
                                    <li><a href="'.base_url('admin/eventupdate').'?id='.$row[0].'&status=20"><i class="icon-file-excel"></i> Inactivate </a></li>
                                </ul>
                            </li>
                        </ul>';

            $output['data'][] = $row;
        }
        return $output;
    }

    public function updateEvent($records,$id){        
        $this->db->where('id', $id);
        $this->db->update('symposium', $records); 
    }


}