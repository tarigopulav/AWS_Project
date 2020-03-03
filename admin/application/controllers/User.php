<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->helper( array('form','url'));
        $this->load->library( array('session','form_validation'));
    $this->load->model('user_model');
    $this->load->database();
  }

  public function index($lang=''){
    $this->lang->load('profiler_lang',$lang='' ? 'en' : $lang);
    $data['message'] = $this->lang->line('profiler_no_profiles');
    $this->load->view('index',$data);
  }



  public function add_student(){
   if($this->session->userdata('logged_in')){
    $session_data = $this->session->userdata('logged_in');

    $admin_data = $this->user_model->get_id_for_admin($session_data['id']);
  $data['username'] = $admin_data[0]['username'];  
    $data['all_course'] = $this->user_model->all_course();
    $this->load->view('add_student',$data);
  }else{redirect('user/index');}

}

public function submit_add_student(){
    
 if($this->session->userdata('logged_in')){

  $fullname = $this->input->post('fullname');
  $email = $this->input->post('email');
  $fathername = $this->input->post('fathername');
  $mothername = $this->input->post('mothername');
  $password = $this->input->post('password');
  $phone = $this->input->post('phone');
  $gender = $this->input->post('gender');
  $img_name = $_FILES["fileToUpload"]["name"];
  $course = $this->input->post('course');
  //echo $course;die;
  $create_at=date('d/m/Y');

  $data['check_user']=$this->user_model->check_user($email);

  $target_dir = "upload/";
  $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
  $uploadOk = 1;
  $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

        //check file exists
  if (file_exists($target_file)) {
    //echo "Sorry, file already exists.";
    $uploadOk = 0;
  }

     // Check file size -- Kept for 500Mb
  if ($_FILES["fileToUpload"]["size"] > 500000000) {
    //echo "Sorry, your file is too large.";
    $uploadOk = 0;
  }
  if($uploadOk != 0){

  if(count( $data['check_user'])>0){

    $this->session->set_flashdata('error', "Allready to register your account");
    redirect('user/add_student',$data);

  }else{
    $data=array('name'=> $fullname ,
      'email'=> $email,
      'password'=> $password,
      'mobile'=> $phone,
      'image' => $img_name,
      'gender'=> $gender, 
      'course' => $course,
      'father_name' => $fathername,
      'mother_name' => $mothername  
      );
      $path1 = "upload/";
$path = $path1 . basename($img_name);
move_uploaded_file($_FILES['fileToUpload']['tmp_name'], $path); 
    $insert=$this->db->insert('student',$data);
   
    if($insert)
    {
      redirect('user/Show_student_list');
    }else{
      redirect('user/add_student');
    }

  }
}else
redirect('user/add_student');


}else{redirect('user/index');}

}
//............................
public function Show_student_list(){
  if($this->session->userdata('logged_in')){
    $session_data = $this->session->userdata('logged_in');

    $admin_data = $this->user_model->get_id_for_admin($session_data['id']);
  $data['username'] = $admin_data[0]['username']; 
    $data['show_list_datd'] = $this->user_model->Show_student_list();

    $this->load->view('Show_student_list',$data);

  }else{redirect('user/index',$data);}
}
//................................
public function edit_student($id){
  if($this->session->userdata('logged_in')){
   $session_data = $this->session->userdata('logged_in');
   $admin_data = $this->user_model->get_id_for_admin($session_data['id']);
  $data['username'] = $admin_data[0]['username']; 
   //print_r($data['username']);die;
        $data['edit_data'] = $this->user_model->edit_student($id);
        
        $data['showcourse'] = $this->user_model->showcourse();
    //   echo "<pre>";
    //   print_r($data['edit_data']);die;
        //print_r($data['edit_data']);die;
        $this->load->view('edit_student',$data);
  }else{redirect('user/index');}
}
//.............................
public function delete_student($id){
  if($this->session->userdata('logged_in')){
    $get_image = $this->user_model->get_image($id);
    $imagepath="upload/".$get_image[0]['image'];
    $this->user_model->delete_student($id);
    unlink($imagepath); 
    redirect('user/Show_student_list');
  }else{redirect('user/index');}
}



public function update_student($id){
  if($this->session->userdata('logged_in')){
   $session_data = $this->session->userdata('logged_in');
   $data['username'] = $session_data['username'];
   
  $fullname = $this->input->post('fullname');
  $email = $this->input->post('email');
  $fathername = $this->input->post('fathername');
  $mothername = $this->input->post('mothername');
  $password = $this->input->post('password');
  $phone = $this->input->post('phone');
  $gender = $this->input->post('gender');
   
    $course = $this->input->post('course');
  $img_name = $_FILES["fileToUpload"]["name"];
  $date_of_birth = $this->input->post('date_of_birth');

  $data=array('name'=> $fullname ,
      'email'=> $email,
      'password'=> $password,
      'mobile'=> $phone,
      'image' => $img_name,
      'gender'=> $gender, 
      'gender'=> $gender, 
      'course'=> $course,
      'image'=>$img_name,
      'father_name' => $fathername,
      'mother_name' => $mothername,
      'date_of_birth' => $date_of_birth 
      );
     
     
     
    
$path1 = "upload/";
$path = $path1 . basename($img_name);
  move_uploaded_file($_FILES['fileToUpload']['tmp_name'], $path);
    

  $this->user_model->update_student($id,$data);
  redirect('user/Show_student_list');
 }else{redirect('user/index');}
}















//.....................

public function dashboard(){
 if($this->session->userdata('logged_in')){

  $session_data = $this->session->userdata('logged_in');
  $admin_data = $this->user_model->get_id_for_admin($session_data['id']);
  $data['username'] = $admin_data[0]['username']; 
  //$data['admin_activity'] = $session_data['admin_activity']; 
  $data['get_all_students'] = $this->user_model->get_all_students();
  $data['get_all_students'] = count($data['get_all_students']);
  $data['get_all_courses'] = $this->user_model->get_all_courses();
  $data['get_all_courses'] = count($data['get_all_courses']);
 
  $this->load->view('dashboard',$data);
}else{redirect('user/index');}
}
  public function login() {
  $data = array(
  'username' => $this->input->post('username'),
  'password'=>$this->input->post('password')
);

  $result = $this->user_model->user_login($data);
  //print_r($result);
  if($result == true){
    $session_result = $this->user_model->session_data($data['username']);
 
    $sess_array = array(
        'id' => $session_result[0]['id'],
    'username' =>  $session_result[0]['username'],
   
    );
    
  
  // Add user data in session
  $this->session->set_userdata('logged_in', $sess_array);
  redirect('user/dashboard');
  }else{
    $data = array(
    'error' => 'Invalid Username or Password'
    );
     redirect('user?login=error');
    }
}

//.....................
public function logout() {
// Removing session data
$sess_array = array(
'email' => ''
);
$this->session->unset_userdata('logged_in', $sess_array);
redirect('user');
}

//................................................................................

public function add_course(){
  if($this->session->userdata('logged_in')){
    $session_data = $this->session->userdata('logged_in');
    $admin_data = $this->user_model->get_id_for_admin($session_data['id']);
  $data['username'] = $admin_data[0]['username']; 
    $this->load->view('add_course',$data);
  }else{
    redirect('user/index');
  }
}
//...................................

public function submit_add_course(){
  if($this->session->userdata('logged_in')){
    $session_data = $this->session->userdata('logged_in');
    $course_name = $this->input->post('course');

    $data = array(
            "course_name" =>$course_name
      );
    $this->db->insert('course',$data);
    redirect('user/show_course_list');
  }else{
    redirect('user/index');
  }
}
//.........................................
public function show_course_list(){
  if($this->session->userdata('logged_in')){
     $session_data = $this->session->userdata('logged_in');
     $admin_data = $this->user_model->get_id_for_admin($session_data['id']);
  $data['username'] = $admin_data[0]['username']; 
     $data['course_list'] = $this->user_model->course_list();
     $this->load->view('show_course_list',$data);
  }else{
    redirect('user/index');
  }
}
//........................
public function delete_course($id){
  if($this->session->userdata('logged_in')){
         $this->user_model->delete_course($id);
         redirect('user/show_course_list');
  }else{
    redirect('user/index');
  }
}
//................................
public function edit_course($id){
  if($this->session->userdata('logged_in')){
        $session_data = $this->session->userdata('logged_in');
        $admin_data = $this->user_model->get_id_for_admin($session_data['id']);
  $data['username'] = $admin_data[0]['username']; 
        $data['edit_data'] = $this->user_model->edit_course($id);
        $this->load->view('edit_course',$data);
  }else{
    redirect('user/index');
  }
}
//...........................
public function update_add_course($id){
  if($this->session->userdata('logged_in')){
    $course = $this->input->post('course');
   $this->db->query("UPDATE `course` SET `course_name`='$course' where id = '$id'");
    redirect('user/show_course_list');
  }else{redirect('user/index');}
}

public function attendance_record(){
 if($this->session->userdata('logged_in')){
$session_data = $this->session->userdata('logged_in');
$admin_data = $this->user_model->get_id_for_admin($session_data['id']);
  $data['username'] = $admin_data[0]['username']; 
$data['show_list_datd'] = $this->user_model->Show_attendance_information_list();
$this->load->view('attendance_record',$data);
 }else{
  redirect('user/index');
 }
}
public function add_attendance($id){
  if($this->session->userdata('logged_in')){
    $get_student = $this->user_model->get_student($id);
    // echo '<pre>';
    // print_r($get_student);die;
  }else{
    redirect('user/index');
  }
}

//....................................
public function add_teacher(){
  if($this->session->userdata('logged_in')){
    $session_data = $this->session->userdata('logged_in');
$admin_data = $this->user_model->get_id_for_admin($session_data['id']);
  $data['username'] = $admin_data[0]['username']; 
  $data['all_subject'] = $this->user_model->subject_list();
//   echo "<pre>";
//   print_r($data['all_subject']);die;
$this->load->view('add_teacher',$data);
  }else{redirect('user/index');}
}

//..................................
public function submit_add_teacher(){
 if($this->session->userdata('logged_in')){
  $fullname = $this->input->post('fullname');
  $email = $this->input->post('email');
  $fathername = $this->input->post('fathername');
  $mothername = $this->input->post('mothername');
  $password = $this->input->post('password');
  $phone = $this->input->post('phone');
  $gender = $this->input->post('gender');
  $img_name = $_FILES["fileToUpload"]["name"];
  $date_of_birth = $this->input->post('date_of_birth');
   $subject_id = $this->input->post('subject');
  //echo $course;die;
  $create_at=date('d/m/Y');

  $data['check_user']=$this->user_model->check_user_teacher($email);
// echo '<pre>';
// print_r(count($data['check_user']));die;


  $target_dir = "upload/";
  $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
  $uploadOk = 1;
  $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

        //check file exists
  if (file_exists($target_file)) {
    //echo "Sorry, file already exists.";
    $uploadOk = 0;
  }

     // Check file size -- Kept for 500Mb
  if ($_FILES["fileToUpload"]["size"] > 500000000) {
    //echo "Sorry, your file is too large.";
    $uploadOk = 0;
  }
  if($uploadOk != 0){

  if(count( $data['check_user'])>0){

    $this->session->set_flashdata('error', "Allready to register your account");
    redirect('user/add_student',$data);

  }else{
    $data=array('name'=> $fullname ,
      'email'=> $email,
      'password'=> $password,
      'mobile'=> $phone,
      'image' => $img_name,
      'gender'=> $gender, 
      'father_name' => $fathername,
      'mother_name' => $mothername,
      'date_of_birth' => $date_of_birth,
      'subject_id'=> $subject_id
      );
      
      $path1 = "upload/";
$path = $path1 . basename($img_name);
move_uploaded_file($_FILES['fileToUpload']['tmp_name'], $path); 
            
    $insert=$this->db->insert('teacher',$data);
    
    if($insert)
    {
      redirect('user/Show_teacher_list');
    }else{
      redirect('user/add_teacher');
    }

  }
}else
redirect('user/add_teacher');


}else{redirect('user/index');}

}

//..........................
public function Show_teacher_list(){
  if($this->session->userdata('logged_in')){
    $session_data = $this->session->userdata('logged_in');

    $admin_data = $this->user_model->get_id_for_admin($session_data['id']);
  $data['username'] = $admin_data[0]['username']; 
    $data['show_list_datd'] = $this->user_model->Show_teacher_list();

    $this->load->view('Show_teacher_list',$data);

  }else{redirect('user/index');}
}
//.......................................
public function delete_teacher($id){
  if($this->session->userdata('logged_in')){
    $get_image = $this->user_model->get_image_teacher($id);
    $imagepath="D:/xampp2/htdocs/attendanceSystem//admin/upload/".$get_image[0]['image'];
    $this->user_model->delete_teacher($id);
    unlink($imagepath); 
    redirect('user/Show_teacher_list');
  }else{redirect('user/index');}
}
//...............................
public function edit_teacher($id){
  if($this->session->userdata('logged_in')){
   $session_data = $this->session->userdata('logged_in');
   $admin_data = $this->user_model->get_id_for_admin($session_data['id']);
  $data['username'] = $admin_data[0]['username']; 
   //echo $data['username'];die;
   //$data['all_course'] = $this->user_model->all_course();
        $data['edit_data'] = $this->user_model->edit_teacher($id);
        $data['subject'] =  $this->user_model->subject_list();
        // echo '<pre>';
        // print_r($data['subject']);die;
        $this->load->view('edit_teacher',$data);
  }else{redirect('user/index');}
}
//.............................
//.................................
public function update_teacher($id){
  if($this->session->userdata('logged_in')){
   $session_data = $this->session->userdata('logged_in');
   $data['username'] = $session_data['username'];
   
  $fullname = $this->input->post('fullname');
  $email = $this->input->post('email');
  $fathername = $this->input->post('fathername');
  $mothername = $this->input->post('mothername');
  $password = $this->input->post('password');
  $phone = $this->input->post('phone');
  $gender = $this->input->post('gender');
  $img_name = $_FILES["fileToUpload"]["name"];
  $date_of_birth = $this->input->post('date_of_birth');

  $data = array('name'=> $fullname ,
      'email'=> $email,
      'password'=> $password,
      'mobile'=> $phone,
      'image' => $img_name,
      'gender'=> $gender, 
      'father_name' => $fathername,
      'mother_name' => $mothername,
      'date_of_birth' => $date_of_birth 
      );
     
      $path1 = "upload/";
$path = $path1 . basename($img_name);
move_uploaded_file($_FILES['fileToUpload']['tmp_name'], $path); 


  $this->user_model->update_teacher($id,$data);
  redirect('user/Show_teacher_list');
 }else{redirect('user/index');}
}


 public function add_ip(){
   if($this->session->userdata('logged_in')){
    $session_data = $this->session->userdata('logged_in');

    $admin_data = $this->user_model->get_id_for_admin($session_data['id']);
  $data['username'] = $admin_data[0]['username'];  
    $data['all_course'] = $this->user_model->all_course();
    $this->load->view('add_ip',$data);
  }else{redirect('user/index');}

}

/*public function add_ip(){
  if($this->session->userdata('logged_in')){
    $session_data = $this->session->userdata('logged_in');
    $course_name = $this->input->post('course');

    $data = array(
            "course_name" =>$course_name
      );
    $this->db->insert('course',$data);
    redirect('user/show_course_list');
  }else{
    redirect('user/index');
  }
}*/


public function insert_ip(){
  if($this->session->userdata('logged_in')){
    $session_data = $this->session->userdata('logged_in');
    $ip_name = $this->input->post('ip_name');
    
     $ip_apddress = $this->input->post('ip_apddress');

    $data = array(
            'ip_name' =>$ip_name,
            'ip_address'=>$ip_apddress
      );
      
     /* print_r($data);
      die;*/
    $this->db->insert('ip_address',$data);
    redirect('user/showall_ip');
  }else{
    redirect('user/showall_ip');
  }
}


/*public function showall_ip(){
  if($this->session->userdata('logged_in')){
    $session_data = $this->session->userdata('logged_in');
     $admin_data = $this->user_model->get_id_for_admin($session_data['id']);
  $data['username'] = $admin_data[0]['username'];  
    $data['all_course'] = $this->user_model->all_course();
     $this->load->view('show_ip',$data);
    
  }else{
    redirect('user/index');
  }
}
*/

public function showall_ip(){
  if($this->session->userdata('logged_in')){
     $session_data = $this->session->userdata('logged_in');
     $admin_data = $this->user_model->get_id_for_admin($session_data['id']);
  $data['username'] = $admin_data[0]['username']; 
     $data['ip_address'] = $this->user_model->ip_address();
    /* print_r($data['ip_address']);
     die;*/
     $this->load->view('show_ip',$data);
  }else{
    redirect('user/index');
  }
}



public function exelabc(){
  if($this->session->userdata('logged_in')){
     $session_data = $this->session->userdata('logged_in');
     $admin_data = $this->user_model->get_id_for_admin($session_data['id']);
  $data['username'] = $admin_data[0]['username']; 
     $data['ip_address'] = $this->user_model->ip_address();
    
   $data['show_list_datd'] = $this->user_model->Show_attendance_information_list();
   
    $this->load->view('exel',$data);
 
   
  }else{
    redirect('user/index');
  }
}

public function add_subject(){
    if($this->session->userdata('logged_in')){
        $session_data = $this->session->userdata('logged_in');
        $admin_data = $this->user_model->get_id_for_admin($session_data['id']);
        $data['all_courses'] = $this->user_model->all_course();
        // echo "<pre>";
        // print_r($data['all_courses']);die;
  $data['username'] = $admin_data[0]['username']; 
  $this->load->view('add_subject',$data);
    }else{redirect('user/index');}
}

public function submit_add_subject(){
   if($this->session->userdata('logged_in')){
    $session_data = $this->session->userdata('logged_in');
    $subject_name = $this->input->post('subject');
    $course_id = $this->input->post('course');
    $course_name = $this->user_model->edit_course($course_id);
    

    $data = array(
            "subject_name" =>$subject_name,
            "course_id"=>$course_id,
            "course_name"=>$course_name[0]['course_name']
      );
     
    $this->db->insert('subject',$data);
    //echo 'inserted';die;
    redirect('user/show_subject_list');
  }else{
    redirect('user/index');
  }
}


public function show_subject_list(){
    if($this->session->userdata('logged_in')){
        $session_data = $this->session->userdata('logged_in');
       $admin_data = $this->user_model->get_id_for_admin($session_data['id']);
  $data['username'] = $admin_data[0]['username'];
  $data['subject_list'] = $this->user_model->subject_list();
  $this->load->view('show_subject_list',$data);
    }else{redirect('user/index');}
}

public function deletejob($id){
    if($this->session->userdata('logged_in')){
        $this->user_model->delete_ip($id);
        redirect('user/showall_ip');
    }else{redirect('user/index');}
}

public function delete_subject($id){
    if($this->session->userdata('logged_in')){
        $this->user_model->delete_subject($id);
        redirect('user/show_subject_list');
    }else{redirect('user/index');}
}

public function edit_subject($id){
     if($this->session->userdata('logged_in')){
        $session_data = $this->session->userdata('logged_in');
        $admin_data = $this->user_model->get_id_for_admin($session_data['id']);
  $data['username'] = $admin_data[0]['username']; 
        $data['edit_data'] = $this->user_model->edit_subject($id);
        $data['course'] = $this->user_model->all_course();
        $this->load->view('edit_subject',$data);
  }else{
    redirect('user/index');
  }
}

public function update_add_subject($id){
    if($this->session->userdata('logged_in')){
  $subject_name = $this->input->post('subject_name');
  $course_name = $this->input->post('course_name');
  $get_course_id = $this->user_model->get_course_id($course_name);
  $get_id = $get_course_id[0]['id'];

  $data=array('subject_name'=> $subject_name ,
      'course_name'=> $course_name,
      'course_id' => $get_id
      );
    //   echo "<pre>";
    //   print_r($data);die;
     
  $this->user_model->update_subject($id,$data);
  redirect('user/show_subject_list');
 }else{redirect('user/index');}
}






public function att_recored_with_id(){
  if($this->session->userdata('logged_in')){
    $session_data = $this->session->userdata('logged_in');

    $admin_data = $this->user_model->get_id_for_admin($session_data['id']);
  $data['username'] = $admin_data[0]['username']; 
    $data['show_list_datd'] = $this->user_model->Show_student_list();
    $data['all_student'] = $this->user_model->all_student();
    
    
    
    
    
    
  /*  echo"<pre>";
    print_r($data['all_student']);
    echo"<pre>";
    die;*/
    $this->load->view('att_recored_with_id',$data);

  }else{redirect('user/index',$data);}
}


public function add_att_recored_with_id(){
  if($this->session->userdata('logged_in')){
   $session_data = $this->session->userdata('logged_in');
   $data['username'] = $session_data['username'];
   
    $studet = $this->input->post('student_name');
    $date1 = $this->input->post('date1');
    $date2 = $this->input->post('date2');
    
$timestamp = strtotime($date1);
 $dmy = date("d-m-Y", $timestamp);

$timestamp1 = strtotime($date2);
$dmy1 = date("d-m-Y", $timestamp1);
 $data['show'] = $this->user_model->Show_attendance_exel_list($studet,$dmy,$dmy1);   
  $this->load->view('exel',$data);  
 
 }else{redirect('user/index');}
}




}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */