<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class user_model extends CI_model
{
	public function __construct()
	{

		 $this->load->database();
	}


//check user
    public function check_user($email){
      $data=$this->db->query("SELECT email FROM users WHERE email='$email' ");
       $results = $data->result_array();
        return $results;
    }

public function user_login($login){
$username = $this->input->post('username');
$password = $this->input->post('password');
$condition = "username='".$email."' AND password='".$password."' ";
$this->db->select('*');
$this->db->from('admin');
$this->db->where($condition);
$this->db->limit(1);
$query = $this->db->get();
if ($query->num_rows() == 1) {
return true;
} else {
return false;
}
}

public function session_data($user_email){
$condition = "username='".$username."'";
$this->db->select('*');
$this->db->from('admin');
$this->db->where($condition);
$this->db->limit(1);
$query = $this->db->get();
if ($query->num_rows() == 1) {
	$query2=$query->result_array();
return $query2;
} else {
return false;
}
}



  function getTotalKeysCounts($user_id) {
  	  $counts = array();
        $count = 0;
        $projects = array();
        $lastProjectId = null;

        $data = $this->db->query("select st_project.id,st_project.no_keys, st_project.theme_name, st_project.project_id, st_project.client_company,st_user.user_status,st_user.user_license_key from st_user join st_project on st_user.client_id=st_project.id where st_project.user_admin_id=$user_id");

        $results = $data->result_array();
        return $results;

  }

  function getAllKeys($theme_id1=null, $totals, $user_id, $limit = 20) {
        $results = array();
        $index = 0;
        $keysTotal = array();
        foreach($totals as $total){
            if($theme_id1 != null && $total['id'] != $theme_id1)
                continue;
            $offset = $total['row'];
            $theme_id = $total['id'];
            $keysTotal[$theme_id] = $total['total'];
            $keysTotal[$theme_id.'+'] = $offset;

             $data = $this->db->query("select st_user.user_id, st_user.client_id, st_user.user_status, st_user.user_license_key, st_user.user_imei, st_user.barcode FROM st_user JOIN st_theme_users ON  st_user.client_id=st_theme_users.theme_id  where st_user.client_id = '$theme_id' AND st_theme_users.user_id = '$user_id' LIMIT ".$limit." OFFSET $offset ");
        }
        	$results = $data->result_array();
        return $results;
    }






}	

