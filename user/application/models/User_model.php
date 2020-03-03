<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class user_model extends CI_model
{
    public function __construct()
    {

         $this->load->database();
    }


public function user_login($login){

$email = $this->input->post('email');
$password = $this->input->post('password');
$condition = "email='".$email."' AND password='".$password."' ";
$this->db->select('*');
$this->db->from('users');
$this->db->where($condition);
$this->db->limit(1);
$query = $this->db->get();
if ($query->num_rows() == 1) {
return true;
} else {
return false;
}
}



public function session_data($email){
$condition = "email='".$email."'";
$this->db->select('*');
$this->db->from('users');
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

        $data = $this->db->query("select * form users where user_id='$user_id' ");

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


  public function getJobs($job_id) {
        $data = $this->db->query("select * from jobs where job_id=$job_id");
        $data = $data->result_array();
        return $data;

  }
  public function deletejob($job_id) {
        $data = $this->db->query(" DELETE FROM `jobs` WHERE job_id=$job_id ");
    
        return $data;

  }


public function viewjob($user_id) {
        $data = $this->db->query("select * from jobs where client_id=$user_id");
        $data = $data->result_array();
        return $data;

  }



 public function updatejobdata($id,$data) {
         
        $this->db->where('job_id', $id);
      $this->db->update('jobs', $data);

            }
    
   function table_post(){
       
    $plot=$this->input->post('plot');
    $area=$this->input->post('area');
    $class=$this->input->post('class');
    $desc=$this->input->post('desc');
    $shrubland=$this->input->post('shrubland');
    $woodland=$this->input->post('woodland');
    $direction=$this->input->post('direction');
    
    $data = array(
        'job_plot'=>$plot,
        'area'=>$area,
        'class'=>$class,
        'desc'=>$desc,
        'shrubland'=>$shrubland,
        'woodland'=>$woodland,
        'direction'=>$direction
    );

    $this->db->insert('formdata',$data);
}


 public function getforgot($email){  
    $data = $this->db->query("select * from clients where client_email='$email'");
    return $data->result_array();
      }
 
 


}   

