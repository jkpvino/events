<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

function getAdminInfobyId($id){
	$CI =& get_instance();
	$CI->load->model('admin_model');
	$userinfo = $CI->admin_model->getadmininfobyId($id);
	$result = $userinfo[0];
	return $result;
}

function isAdminLogged(){
	$CI =& get_instance();
    $CI->load->library('session');
	if($CI->session->userdata('logbyadmin')){
		return true;
	}else{
		return false;
	}
}

function getUsersCount(){
	$CI =& get_instance();
	$CI->load->model('admin_model');
	$count = $CI->admin_model->getUsersCount();
	return $count;
}

function getTodayUsersCount(){
	$CI =& get_instance();
	$CI->load->model('admin_model');
	$count = $CI->admin_model->getTodayUsersCount();
	return $count;
}


function getTodayUsers(){
	$CI =& get_instance();
	$CI->load->model('admin_model');
	$TodayUsers = $CI->admin_model->getTodayUsers();
	return $TodayUsers;
}

function getAllUserInfobyId($id){
	/*echo $id;*/
	$CI =& get_instance();
	$CI->load->model('user_model');
	$userinfo = $CI->admin_model->getalluserinfobyId($id);
	$result = $userinfo[0];
	return $result;

}

function getAdminpermissionbyId($id){
	$CI =& get_instance();
	$CI->load->model('admin_model');
	$userinfo = $CI->admin_model->getadminpermissionbyId($id);
	$result = $userinfo[0];
	return $result;
}

function getClassifiedpermissionbyId($id){
	$CI =& get_instance();
	$CI->load->model('admin_model');
	$userinfo = $CI->admin_model->getclassifiedpermissionbyId($id);
	$result = $userinfo[0];
	return $result;
}

function getCategorypermissionbyId($id){
	$CI =& get_instance();
	$CI->load->model('admin_model');
	$userinfo = $CI->admin_model->getcategorypermissionbyId($id);
	$result = $userinfo[0];
	return $result;
}

function getUserpermissionbyId($id){
	$CI =& get_instance();
	$CI->load->model('admin_model');
	$userinfo = $CI->admin_model->getuserpermissionbyId($id);
	$result = $userinfo[0];
	return $result;
}

function getProfpermissionbyId($id){
	$CI =& get_instance();
	$CI->load->model('admin_model');
	$userinfo = $CI->admin_model->getprofessionpermissionbyId($id);
	$result = $userinfo[0];
	return $result;
}

function getEnquirypermissionbyId($id){
	$CI =& get_instance();
	$CI->load->model('admin_model');
	$userinfo = $CI->admin_model->getenquirypermissionbyId($id);
	$result = $userinfo[0];
	return $result;	
}
function getfeedbackpermissionbyId($id){
	$CI =& get_instance();
	$CI->load->model('admin_model');
	$userinfo = $CI->admin_model->getfeedbackpermissionbyId($id);
	$result = $userinfo[0];
	return $result;
} 

function getMyFriendsCount($id){
	$CI =& get_instance();
	$CI->load->model('user_model');
	$userinfo = $CI->admin_model->getMyFriendsCount($id);
	return $userinfo;	
}

function getFriendsList($id){
	$CI =& get_instance();
	$CI->load->model('user_model');
	$userinfo = $CI->admin_model->getMyFriends($id);
	return $userinfo;	
}

function getLatestFriendsList($id,$limit){
	$CI =& get_instance();
	$CI->load->model('user_model');
	$userinfo = $CI->admin_model->getLatestMyFriends($id,$limit);
	return $userinfo;	
}

function getLatestEventsList($id,$limit){
	$CI =& get_instance();
	$CI->load->model('admin_model');
	$userinfo = $CI->admin_model->getLatestEventsList($id,$limit);
	return $userinfo;	
}

function getEventsCountbyId($id){
	$CI =& get_instance();
	$CI->load->model('admin_model');
	$eventsCount = $CI->admin_model->getEventsCountbyId($id);
	if($eventsCount == '' || $eventsCount == NULL)
		$eventsCount = 0;
	
	return $eventsCount;	
}

function getLatestMyWallet($id,$limit){
	$CI =& get_instance();
	$CI->load->model('admin_model');
	$myWallet = $CI->admin_model->getLatestMyWallet($id,$limit);
	return $myWallet;
}


function getapiinfobyId($id){
	$CI =& get_instance();
	$CI->load->model('admin_model');
	$eventsCount = $CI->admin_model->getApiInfobyId($id);
	return $eventsCount[0];	
}

// function debug($data){
// 	echo "<pre>";
// 	print_r($data);
// 	echo "</pre>";
//}

function getparentcategory(){


$CI =& get_instance();
	$CI->load->model('category_model');
	$parentName = $CI->category_model->getParentCategory();
	return $parentName;
       
    }

 function getchildcategory(){
 $CI =& get_instance();
	$CI->load->model('category_model');
	$childName = $CI->category_model->getChildCategory();

	//debug($childName);
	return $childName;
 	
 }


 

 function getProfessionList(){
 	$CI =& get_instance();
	$CI->load->model('profession_model');
	$professionList = $CI->profession_model->getProfession();
	return $professionList; 	
 }

 function getRootProfession(){
 	$CI =& get_instance();
	$CI->load->model('profession_model');
	$professionList = $CI->profession_model->getRootProfession();
	return $professionList; 	
 }

 function getChildProfessionInfoById($id){
 	$CI =& get_instance();
	$CI->load->model('profession_model');
	$professionList = $CI->profession_model->getChildProfessionInfoById($id);
	return $professionList; 	
 }
 

function getProfessionTreeSelect($level = 0, $prefix = '') {
	$CI =& get_instance();
    $rows = $CI->db
        ->select('id,parent_id,profession_name')
        ->where('parent_id', $level)
        ->order_by('id','asc')
        ->get('T_PROFESSION')
        ->result();
    $category = '';
    $result = array();
    if (count($rows) > 0) {
        foreach ($rows as $row) {
            $category .= '<option value='.$row->id.'>'.$prefix.$row->profession_name .'</option>';
            $category .= getProfessionTreeSelect($row->id, $prefix.'---');
        }
    }
    return $category;
}

function professionTree($parent = 0, $spacing = '', $user_tree_array = '') { 
  if (!is_array($user_tree_array))
    $user_tree_array = array();
    $rows = $this->db
        ->select('id,parent_id,profession_name')
        ->where('parent_id', $parent)
        ->order_by('id','asc')
        ->get('T_PROFESSION')
        ->result();
    if (count($rows) > 0) {
        foreach ($rows as $row) {
          $user_tree_array[] = array("id" => $row->id, "name" => $spacing . $row->profession_name);
          $user_tree_array = $this->fetchCategoryTree($row->id, $spacing . '&nbsp;&nbsp;', $user_tree_array);
        }
    }
  return $user_tree_array;
}
