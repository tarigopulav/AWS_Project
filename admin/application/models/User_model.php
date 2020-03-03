<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class user_model extends CI_model
{
    public function __construct()
    {

         $this->load->database();
    }


public function user_login($login){

$username = $this->input->post('username');
$password = $this->input->post('password');
$condition = "username='".$username."' AND password='".$password."'  ";
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

public function session_data($user_username){
    
$condition = "username='".$user_username."'";
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

public function get_all_students(){
  $data = $this->db->query("select * from student");
  $result = $data->result_array();
  return $result;
}

public function get_all_courses(){
  $data = $this->db->query("select * from course");
  $result = $data->result_array();
  return $result;
}

//.................................
  public function check_user($email){
      $data=$this->db->query("SELECT email FROM student WHERE email='$email' ");
       $results = $data->result_array();
        return $results;
    }
    //...............................
    public function check_user_teacher($email){
      $data=$this->db->query("SELECT email FROM teacher WHERE email='$email' ");
       $results = $data->result_array();
        return $results;
    }

  //............................
    public function Show_student_list(){
      $data = $this->db->query("select * from student");
      return $data->result_array();
    }
    //................................
    public function course_list(){
      $data = $this->db->query("select * from course");
      return $data->result_array();
    }
    //..................
    public function delete_course($id){
      //echo $id;die;
     return $this->db->query("delete from course where id = '$id' ");
    }
    //...................
    public function edit_course($id){
      return $this->db->query("select * from course where id = '$id'")->result_array();
    }
    
    
    
    
     public function showcourse(){
      return $this->db->query("select * from course")->result_array();
    }
    
    
    
    //................
    public function all_course(){
      return $this->db->query("select * from course")->result_array();
    }
    public function delete_student($id){
      return $this->db->query("delete from student where id = '$id' ");
    }
    public function edit_student($id){
      return $this->db->query("select * from student where id = '$id'")->result_array();
    }

    public function get_image($id){
      return $this->db->query("select image from student where id = '$id'")->result_array();
    }
    public function get_student($id){
      return $this->db->query("select * from student where id = '$id'")->result_array();
    }
    public function update_student($id,$data){
      $this->db->where('student.id', $id);
      return $this->db->update('student', $data);
    }

    public function Show_teacher_list(){
      $data = $this->db->query("select * from teacher");
      return $data->result_array();
    }
     public function get_image_teacher($id){
      return $this->db->query("select image from teacher where id = '$id'")->result_array();
    }
    public function delete_teacher($id){
      return $this->db->query("delete from teacher where id = '$id' ");
    }
     public function edit_teacher($id){
      return $this->db->query("select * from teacher where id = '$id'")->result_array();
    }
    public function update_teacher($id,$data){
      $this->db->where('teacher.id', $id);
      return $this->db->update('teacher', $data);
    }

    public function Show_attendance_information_list(){
      $data = $this->db->query("select * from attendance_information");
      return $data->result_array();
    }
    
     public function Show_attendance_exel_list($studet,$dmy,$dmy1){
         
         
         
         
      $data = $this->db->query("SELECT * FROM attendance_information WHERE `student_id`='$studet' AND attendance_date BETWEEN '$dmy' AND '$dmy1'");
      return $data->result_array();
    }
    
    public function get_id_for_admin($id){
        return $this->db->query("select * from admin where id = '$id'")->result_array();
    }
    
     public function ip_address(){
        return $this->db->query("select * from ip_address")->result_array();
    }
    
    public function delete_ip($id){
        return $this->db->query("delete from ip_address where ip_id = '$id'");
    }
    
    public function subject_list(){
      $data = $this->db->query("select * from subject");
      return $data->result_array();
    }
    
    public function delete_subject($id){
        return $this->db->query("delete from subject where id = '$id'");
    }
    
    public function edit_subject($id){
      return $this->db->query("select * from subject where id = '$id'")->result_array();
    }
    public function get_course_id($course_name){
        return $this->db->query("select * from course where course_name = '$course_name'")->result_array();
    }
    
    public function update_subject($id,$data){
      $this->db->where('subject.id', $id);
      return $this->db->update('subject', $data);
    }
    
    public function update_studentdata($updata){
    
    $results=$this->db->update('student', $updata);
    return $results; 
    }
    
   public function all_student(){
    
     return $this->db->query("SELECT * FROM `student`")->result_array();
    }
    


}   


