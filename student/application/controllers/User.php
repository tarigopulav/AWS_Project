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

    $data['name'] = $session_data['name']; 
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

  $target_dir = "D:/xampp2/htdocs/attendanceSystem/admin/upload/";
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
            // echo '<pre>';
            // print_r($data);die;
    $insert=$this->db->insert('student',$data);
    move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file);
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

    $data['name'] = $session_data['name']; 
    $data['show_list_datd'] = $this->user_model->Show_student_list();

    $this->load->view('Show_student_list',$data);

  }else{redirect('user/index',$data);}
}
//................................
public function edit_student($id){
  if($this->session->userdata('logged_in')){
   $session_data['name'] = $this->session->userdata('logged_in');
   $data['name'] = $session_data['name'];
   //print_r($data['name']);die;
        $data['edit_data'] = $this->user_model->edit_student($id);
        //print_r($data['edit_data']);die;
        $this->load->view('edit_student',$data);
  }else{redirect('user/index');}
}
//.............................
public function delete_student($id){
  if($this->session->userdata('logged_in')){
    $get_image = $this->user_model->get_image($id);
    $imagepath="D:/xampp2/htdocs/attendanceSystem//admin/upload/".$get_image[0]['image'];
    $this->user_model->delete_student($id);
    unlink($imagepath); 
    redirect('user/Show_student_list');
  }else{redirect('user/index',$data);}
}

//.....................

public function dashboard(){
 if($this->session->userdata('logged_in')){

  $session_data = $this->session->userdata('logged_in');

  $data['get_student_data'] = $this->user_model->get_student_name($session_data['name']);
  $studen_id = $data['get_student_data'][0]['id'];
  

  
  date_default_timezone_set("Asia/Kolkata");
     $date =  date('d-m-Y');
     $time =  date('h:i:sa');
      
      
  $data['get_student_id_from_attendance_information'] = $this->user_model->get_student_id_from_attendance_information($studen_id,$date);
  $data['get_student_id_from_attendance_add'] =$this->user_model->get_student_id_from_attendance_information($studen_id,$date);
  
 /* print_r($data['get_student_id_from_attendance_information']);
  die;*/
  $data['name'] = $data['get_student_data'][0]['name'];
  $data['admin_activity'] = $session_data['admin_activity'];
  // echo '<pre>';
  // print_r($data['student_data']);die; 
  $this->load->view('dashboard',$data);
}else{redirect('user/index');}
}



  public function login() {
  $data = array(
  'name' => $this->input->post('name'),
  'password'=>$this->input->post('password')
);


  $result = $this->user_model->user_login($data);

  if($result == true){
    $session_result = $this->user_model->session_data($data['name']);
    $sess_array = array(
    'name' => $this->input->post('name'),
    'admin_activity'=>$session_result[0]['admin_activity'],
   
    );

  
  // Add user data in session
  $this->session->set_userdata('logged_in', $sess_array);
  redirect('user/dashboard');
  }else{
    $data = array(
    'error' => 'Invalid name or Password'
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
    $data['name'] = $session_data['name'];
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
     $data['name'] = $session_data['name'];
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
        $data['name'] = $session_data['name'];
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
$data['name'] = $session_data['name'];
$data['show_list_datd'] = $this->user_model->Show_student_list();
$this->load->view('attendance_record',$data);
 }else{
  redirect('user/index');
 }
}

public function add_attendance($id){
  if($this->session->userdata('logged_in')){
    $get_student = $this->user_model->get_student($id);
  }else{
    redirect('user/index');
  }
}

 public function submit_attendance(){
  if($this->session->userdata('logged_in')){
echo $student_id=$this->input->post('student_id');
$student_image =$_FILES['student_image']['name'];
$myIp = $this->get_client_ip();
$id=$student_id;
$data['student_data'] = $this->user_model->get_student($id);

date_default_timezone_set("Asia/Kolkata");
$todaydate =  date('d-m-Y');
$data['check_ipaddress']=$this->user_model->get_ipaddress($myIp);

$data['check_studentinfo'] = $this->user_model->check_studentinfo($student_id,$todaydate);
$attandencecount=count($data['check_studentinfo']);
$time =date('h:i:sa');
$paths = "assets/studentimage/";
    if(count($data['check_ipaddress'])>0){
    
    if($attandencecount=='1'){
    $this->session->set_flashdata('danger', 'Your attendance is all ready marked ');
    $sd = array(
    'student_id'=>$data['student_data'][0]['id'],
    'student_name'=>$data['student_data'][0]['name'],
    'attendance'=>'Yes',
    'attendance_date '=>$todaydate,
    'attendance_time '=>$time,
    'system_ip_address'=>$myIp,
    'student_image'=>$paths.$student_image,
    'attendance_status'=>'1',
    'ip_type'=>'admin_ip'
    );
    

    $this->session->set_flashdata('success', 'Your attendance is successfully marked ');
    $path1 = "assets/studentimage/";
    $path = $path1 . basename($_FILES['student_image']['name']);
    move_uploaded_file($_FILES['student_image']['tmp_name'], $path); 
    
    $data['check_ipaddress']=$this->user_model->update_att($student_id,$sd);
    //$update=$this->user_model->update_attandence();
    
    redirect('user/dashboard');
       }else{
           $sd = array(
'student_id'=>$data['student_data'][0]['id'],
'student_name'=>$data['student_data'][0]['name'],
'attendance'=>'Yes',
'attendance_date '=>$todaydate,
'attendance_time '=>$time,
'system_ip_address'=>$myIp,
'student_image'=>$paths.$student_image,
'attendance_status'=>'1',
'ip_type'=>'admin_ip'
);
    $this->session->set_flashdata('success', 'Your attendance is successfully marked ');
    $path1 = "assets/studentimage/";
         $path = $path1 . basename($_FILES['student_image']['name']);
         move_uploaded_file($_FILES['student_image']['tmp_name'], $path); 
    $this->db->insert('attendance_information',$sd);
   echo "Your attendance is radey marked and valid ip";
        
        
    redirect('user/dashboard');
       }
    
    
}else{
     if($attandencecount=='1'){
         $this->session->set_flashdata('danger', 'Your attendance is all ready marked ');
        
        
         redirect('user/dashboard');
       }else{
    $sd = array(
'student_id'=>$data['student_data'][0]['id'],
'student_name'=>$data['student_data'][0]['name'],
'attendance'=>'no',
'attendance_date '=>$todaydate,
'attendance_time '=>$time,
'system_ip_address'=>$myIp,
'student_image'=>$paths.$student_image,
'attendance_status'=>'0',
'ip_type'=>'proxy'
);
  
$path1 = "assets/studentimage/";
$path = $path1 . basename($_FILES['student_image']['name']);
move_uploaded_file($_FILES['student_image']['tmp_name'], $path); 
$this->db->insert('attendance_information',$sd);
    
  $this->session->set_flashdata('error', 'Your attendance is not valid an ip address ');
 
         redirect('user/dashboard');  
       }
}



     
  }else{
      
    redirect('user/index');
  }
  
  
  
 }

 public function attendance_information($id){
  if($this->session->userdata('logged_in')){
    $data['get_student_data'] = $this->user_model->get_student($id);
    $session_data = $this->session->userdata('logged_in');

  $data['student_data'] = $this->user_model->get_student_name($session_data['name']);
  $data['name'] = $data['student_data'][0]['name'];
  $data['get_student_attendance_record'] = $this->user_model->get_student_attendance_record($id);
 // print_r($data['get_student_attendance_record']);die;
    $this->load->view('attendance_information',$data);

  }else{
    redirect('user/index');
  }
 }

 public function edit_student_profile(){
   if($this->session->userdata('logged_in')){
  
      $id=base64_decode($_GET['slug']);
       $session_data = $this->session->userdata('logged_in');
                $data['name'] = $session_data['name']; 
                $data['username']= $data['name'];
    $data['all_course'] = $this->user_model->all_course();
          $data['get_student_data'] = $this->user_model->get_student($id);

        $this->load->view('edit_studentprofile',$data);
   }else{
    redirect('user/index');
  }  
 }

public function edit_studentform(){
  if($this->session->userdata('logged_in')){
      $slug=$_GET['slug'];
     $student_id=base64_decode($slug);
        $session_data = $this->session->userdata('logged_in');
        $data['name'] = $session_data['name'];
      
$fullname = $this->input->post('fullname');
$email = $this->input->post('email');
$fathername = $this->input->post('fathername');
$mothername = $this->input->post('mothername');
$password = $this->input->post('password');
$phone = $this->input->post('phone');
$gender = $this->input->post('gender');
$dob = $this->input->post('dob');
$course = $this->input->post('course');
$updata=array(
    'name'=>$fullname,
    'email'=>$email,
    'father_name'=>$fathername,
    'mother_name'=>$mothername,
    'password'=>$password,
    'mobile'=>$phone,
    'gender'=>$gender,
    'date_of_birth'=>$dob,
    'course'=>$course
    
    );
   
 
 $update=$this->user_model->update_studentdata($student_id,$updata);

if(count($update)=='1' ){
 $this->session->set_flashdata('success', 'Updated student profile successfully');
     redirect('user/dashboard');
               } else{
$this->session->set_flashdata('error', 'Updated student profile is failed');
redirect('user/edit_studentprofile/'.$student_id.'');
               }
  }else{
    redirect('user/index');
  }   
}

public function updatestudent_profile_image(){
$student_id=$this->input->post('sid');
$file1 =$_FILES['file1']['name'];
$path1 = "assets/studentimage/";
$path = $path1 . basename($file1);
$updata=array('image'=>$file1);
;
 $update=$this->user_model->update_studentdata($student_id,$updata);
 if(count($update)=='1' ){
    move_uploaded_file($_FILES['file1']['tmp_name'], $path); 
    $this->session->set_flashdata('success', 'Updated student profile image successfully');
      redirect('user/dashboard');
 }else{
    
     $this->session->set_flashdata('error', 'Updated student profile is failed');
     redirect('user/edit_studentprofile/'.$student_id.'');
 }
 
}

function get_client_ip() {
    $ipaddress = '';
    if (getenv('HTTP_CLIENT_IP'))
        $ipaddress = getenv('HTTP_CLIENT_IP');
    else if(getenv('HTTP_X_FORWARDED_FOR'))
        $ipaddress = getenv('HTTP_X_FORWARDED_FOR');
    else if(getenv('HTTP_X_FORWARDED'))
        $ipaddress = getenv('HTTP_X_FORWARDED');
    else if(getenv('HTTP_FORWARDED_FOR'))
        $ipaddress = getenv('HTTP_FORWARDED_FOR');
    else if(getenv('HTTP_FORWARDED'))
       $ipaddress = getenv('HTTP_FORWARDED');
    else if(getenv('REMOTE_ADDR'))
        $ipaddress = getenv('REMOTE_ADDR');
    else
        $ipaddress = 'UNKNOWN';
    return $ipaddress;
}

function webcam(){
    $this->load->view('webcam.php');
}


}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */