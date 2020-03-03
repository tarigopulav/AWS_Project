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



//.....................

public function dashboard(){
 if($this->session->userdata('logged_in')){

  $session_data = $this->session->userdata('logged_in');
// echo "<pre>";
// print_r($session_data);die;
  $data['get_teacher_data'] = $this->user_model->get_teacher_data($session_data['id']);
  $data['name'] = $data['get_teacher_data'][0]['name'];

  // $studen_id = $data['student_data'][0]['id'];
  // $data['get_student_id_from_attendance_information'] = $this->user_model->get_student_id_from_attendance_information($studen_id);
  // $data['name'] = $data['student_data'][0]['name'];
  //$data['admin_activity'] = $session_data['admin_activity'];
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
 // print_r($data);die;
  $result = $this->user_model->user_login($data);
  
//$id = $result[0]['id'];
  if($result == true){
    $session_result = $this->user_model->session_data($data['name']);
    
  $id = $session_result[0]['id'];
        $sess_array = array(
      'id'=> $id,
    'name' => $this->input->post('name'),
    );
  //   echo '<pre>';
  // print_r($sess_array);die;

  
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


//...................................


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

 public function submit_attendance($id){
  if($this->session->userdata('logged_in')){
    $data['student_data'] = $this->user_model->get_student($id);
    $attendance = 'yes';
    date_default_timezone_set("Asia/Kolkata");
     $date =  date("l jS \of F Y h:i:s A");

    $myIp = getHostByName(getHostName());
    $sd = array(
      'student_id'=>$data['student_data'][0]['id'],
      'student_name'=>$data['student_data'][0]['name'],
      'attendance'=>$attendance,
      'attendance_date '=>$date,
      'system_ip_address'=>$myIp,
      );
    
    $this->db->insert('attendance_information',$sd);
    redirect('user/dashboard');
  }else{
    redirect('user/index');
  }
 }

 public function attendance_information(){
  if($this->session->userdata('logged_in')){
    
    $session_data = $this->session->userdata('logged_in');
    $data['name'] = $session_data['name'];
  $data['get_student_attendance_record'] = $this->user_model->get_student_attendance_record();
//   echo '<pre>';
//   print_r($data['get_student_attendance_record']);die;
    $this->load->view('attendance_information',$data);

  }else{
    redirect('user/index');
  }
 }
 
 public function student_information(){
     if($this->session->userdata('logged_in')){
         $session_data = $this->session->userdata('logged_in');
         $data['username'] = $session_data['name'];
    $data['show_list_datd'] = $this->user_model->Show_student_list();
    // echo "<pre>";
    // print_r($data);die;
    $this->load->view('Show_student_list',$data);
     }else{redirect('user/index');}
 }
 
 public function edit_teacher($id){
     if($this->session->userdata('logged_in')){
         $session_data = $this->session->userdata('logged_in');
        $data['username'] = $session_data['name'];
         
         $data['get_teacher_data'] = $this->user_model->get_teacher_data1($id);
         
        
        $this->load->view('edit_teacher',$data);
         
     }else{redirect('user/index');}
 }
 
 //...................................
 public function update_teacher($id){
  if($this->session->userdata('logged_in')){
   $session_data = $this->session->userdata('logged_in');
   $data['username'] = $session_data['name'];
   
  $fullname = $this->input->post('fullname');
  $email = $this->input->post('email');
  $fathername = $this->input->post('fathername');
  $mothername = $this->input->post('mothername');
  $password = $this->input->post('password');
  $phone = $this->input->post('phone');
  $gender = $this->input->post('gender');
  $date_of_birth = $this->input->post('date_of_birth');

  $data=array('name'=> $fullname ,
      'email'=> $email,
      'password'=> $password,
      'mobile'=> $phone,
      'gender'=> $gender, 
      'father_name' => $fathername,
      'mother_name' => $mothername,
      'date_of_birth' => $date_of_birth 
      );
      
    
  $this->user_model->update_teacher($id,$data);
  redirect('user/dashboard');
 }else{redirect('user/index');}
}

public function updateteacher_profile_image(){
$teacher_id=$this->input->post('tid');
$file1 =$_FILES['file1']['name'];
$path1 = "assets/teacherimage/";
$path = $path1 . basename($file1);
$updata=array('image'=>$file1);
;
 $update=$this->user_model->update_teacherdata($teacher_id,$updata);
 if(count($update)=='1' ){
    move_uploaded_file($_FILES['file1']['tmp_name'], $path); 
    $this->session->set_flashdata('success', 'Updated student profile image successfully');
      redirect('user/dashboard');
 }else{
    
     $this->session->set_flashdata('error', 'Updated student profile is failed');
     redirect('user/edit_teacher/'.$teacher_id.'');
 }
 
}





}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */