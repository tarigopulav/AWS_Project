<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {
  public function __construct()
  {
    parent::__construct();
    $this->load->helper( array('form','url'));
    $this->load->library( array('session','form_validation','encrypt'));
        $this->load->model('user_model');
        $this->load->database();
  }
  public function login() {

  $data = array(
  'email' => $this->input->post('email'),
  'password'=>$this->input->post('password')
);

  $result = $this->user_model->user_login($data);
  
  if($result == true){

    $session_result = $this->user_model->session_data($data['email']);

    $sess_array = array(
    'email' => $this->input->post('email'),
    'fullname' =>$session_result[0]['fullname'],
    'admin_activity'=>$session_result[0]['admin_activity'],
    'role'=>$session_result[0]['role'],
    'user_id'=>$session_result[0]['user_id']
    );

  
  // Add user data in session
  $this->session->set_userdata('logged_in', $sess_array);
  redirect('home/dashboard');
  }else{
    $data = array(
    'error' => 'Invalid Username or Password'
    );
  
 $this->session->set_userdata('error', "Invalid Username or Password");
     redirect('home');
    }
}


public function logout() {
// Removing session data
$sess_array = array(
'email' => ''
);
$this->session->unset_userdata('logged_in', $sess_array);
redirect('home');
}

public function index($lang=''){
  $this->lang->load('profiler_lang',$lang='' ? 'en' : $lang);
  $data['message'] = $this->lang->line('profiler_no_profiles');
$this->load->view('index',$data);
}

public function dashboard(){
   if($this->session->userdata('logged_in')){
      
      $session_data = $this->session->userdata('logged_in');
      $data['email'] = $session_data['email']; 

      $data['fullname'] = $session_data['fullname'];
      
     
      //$data['role'] = $session_data['role']; 
      $data['admin_activity'] = $session_data['admin_activity']; 

      $this->load->view('dashboard',$data);
  }else{redirect('home/index');}
}

//create meeting
public function create_meeting(){
   if($this->session->userdata('logged_in')){

      $session_data = $this->session->userdata('logged_in');
      $data['email'] = $session_data['email']; 
      $data['fullname'] = $session_data['fullname']; 
      $data['role'] = $session_data['role']; 
      $data['admin_activity'] = $session_data['admin_activity']; 
      $this->load->view('create_meeting',$data);
      

  }else{redirect('home/index');}
}


public function viewjobs(){
   if($this->session->userdata('logged_in')){
      $session_data = $this->session->userdata('logged_in');
      $data['user_email'] = $session_data['user_email']; 
      $data['user_name'] = $session_data['user_name']; 
      $data['admin_activity'] = $session_data['admin_activity']; 
      $data['user_id'] = $session_data['user_id']; 
      extract($data);
      $user_id= $data['user_id'];
      $data['getjobs'] = $this->user_model->viewjob($user_id);

      $this->load->view('viewjobs',$data);
  }else{redirect('home/index');}
}



public function deletejob($job_id){
   if($this->session->userdata('logged_in')){

 $data['delete'] = $this->user_model->deletejob($job_id);
   redirect('home/viewjobs',$data);

   }else{redirect('home/index',$data);}
 }



public function create_job(){
   if($this->session->userdata('logged_in')){
     
      $session_data = $this->session->userdata('logged_in');
       $this->load->library('form_validation');
      $data['user_email'] = $session_data['user_email']; 
      $data['user_name'] = $session_data['user_name']; 
      $data['admin_activity'] = $session_data['admin_activity']; 
      $data['user_id'] = $session_data['user_id']; 
      $this->load->helper('string');
      $data['jobnumber'] = random_string('alnum',5);
      $this->session->set_flashdata('response'," Successfully Create a job");
      $this->load->view('create_job',$data);
  }else{redirect('home/index');}
}

public function edit_job($job_id){
    
  $data['getjobdata'] = $this->user_model->getJobs($job_id);
    $this->load->view('editjob' ,$data);
  
    
}

 public function updatejob(){
      $id=$this->input->post('editid');
      $data=array(       
         
          'job_lot' => $this->input->post('lot'),
          'job_house'  => $this->input->post('house'),
            'job_date' => $this->input->post('date'),
              'job_suburb' => $this->input->post('suburb'),
               'job_street' => $this->input->post('street_name'),
                'map_location' =>$this->input->post('map_location'),
             'job_notes' =>$this->input->post('notes')
            );        

  $data['getuser'] = $this->user_model->updatejobdata($id,$data);
     redirect('home/viewjobs');
    }
    
public function submit_job(){
     $this->load->library('email', $config);
      
      
   if($this->session->userdata('logged_in')){

      $session_data = $this->session->userdata('logged_in');
      $data['user_email'] = $session_data['user_email']; 
      $data['user_name'] = $session_data['user_name']; 
      $data['admin_activity'] = $session_data['admin_activity']; 
      $data['user_id'] = $session_data['user_id']; 
      extract($data);
      
       $uploadDir = "assets/files/";
     $fileName = time().'_'.basename($_FILES['fileupload']['name']);
     $targetPath = $uploadDir. $fileName;
     move_uploaded_file($_FILES['fileupload']['tmp_name'], $targetPath);
 
            $job_number = $this->input->post('job_number');
              $lot = $this->input->post('lot');
              $street_name = $this->input->post('street_name');
              $house = $this->input->post('house');
              $date = $this->input->post('date');
              $suburb = $this->input->post('suburb');
              $fileupload = $this->input->post('fileupload');
              $notes = $this->input->post('notes');
              $user_email = $this->input->post('user_email');
              $data = array('job_name'=>'',
                'job_number'=>$job_number,
                'job_lot'=>$lot,
                'job_street'=>$street_name,
                'job_house'=>$house,
                'job_date'=>$date,
                'job_suburb'=>$suburb,
                'job_notes'=>$notes,
                'client_id'=>$user_id,
                'files'=>$fileName
                );
               
             
              $result=$this->db->insert('jobs',$data); 
             
               $config = array (
                  'mailtype' => 'html',
                  'charset'  => 'utf-8',
                  'priority' => '1'
                   );
        $this->email->initialize($config);
      $this->email->set_newline("\r\n");       
    $this->email->from('booking1@balrati.com.au');
    $this->email->to($user_email);
    $this->email->subject('my Subject');
    $message = $this->load->view('emaillayout',$data,TRUE);
      $this->email->message($message);
    
    if($this->email->send()){
        echo "send mail";
    }else{echo "do not create job";}
            
     $this->session->flashdata('success','Job Created'); 
     redirect('home/viewjobs');
  }else{redirect('home/index');}
   
}


  function sendMail()
{
        $this->load->view('emaillayout');
}



  

     public function register(){ 
        $this->form_validation->set_rules('user_name', '', 'trim|required');
         if ($this->form_validation->run() == FALSE)
        {
         $this->load->view('register');            
        } else{
              $name = $this->input->post('user_name');
              $email = $this->input->post('user_email');
              $password = $this->input->post('user_password');

              $data = array('user_name'=>$name,
                'user_email'=>$email,
                'user_password'=>$password
                );
              $this->db->insert('user_admin',$data);   
                $email_data=array(
  'email_to' => $this->input->post('user_email'),
  'email_from' =>'smarttheme360 <postmaster@smarttheme360.com>',
  'email_reply' =>'info@swifnix.com',
  'email_subject' =>'Verify Account',
  'email_body' =>'Dear User'
  );               
   $this->sent_email($email_data); 
    }



}



public function sent_email($email_data){
$config = array();
          $config['api_key'] = "key-4f558f80e4c0bd231b643112b3884d72";
        $config['api_url'] = "https://api.mailgun.net/v3/smarttheme360.com/messages";
        $message = array();
        $message['from'] =$email_data['email_from'];
        $message['to'] = $email_data['email_to'];
        $message['h:Reply-To'] =$email_data['email_reply']; 
        $message['subject'] = $email_data['email_subject'];
      //  $message['html'] = file_get_contents("http://dummyimage.com/"); 
        $message['html'] = '<body>Dear User,<br /><br />Please click on the below activation link to verify your email address.<br /><br />'.base_url().'home/verify/' . md5($this->input->post('user_email')) . '<br /><br /><br />Thanks<br /><b>Smarttheme360 Team</b></body>';
        $ch = curl_init(); 
        curl_setopt($ch, CURLOPT_URL, $config['api_url']);
        curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
        curl_setopt($ch, CURLOPT_USERPWD, "api:{$config['api_key']}");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 10);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_POST, true); 
        curl_setopt($ch, CURLOPT_POSTFIELDS,$message);
        $result = curl_exec($ch);
        curl_close($ch);
        redirect('home/register?emailsent=success');
          
}


 function verify($key){
   if ($key){
   $data = array('status' => 1);
   $this->db->where('md5(user_email)', $key);
   $this->db->update('user_admin', $data);
   redirect('home/register_form?email=1');
 }else{
  // error
 redirect('home/register?email=2');
 }
    
  }
  
     public function table(){
    
    $this->user_model->table_post();

    $this->load->view('table');
     
      }
      
      
      function forgotPassword(){
    $email = $this->input->post('forgot_user_email');
    $userdetails = $this->user_model->getforgot($email);
    $oldemail = $userdetails[0]['email'];
    $password = $userdetails[0]['password'];
    
    $to = $email; // this is your Email address
    $from = 'info@swifnix.com'; // this is the sender's Email address
    $email = $email;
    $pssword = $password;
    $subject = "Forgot Password Deatails";
    //$message = "<b>Email Id :</b>".$email . " <br><b>Password  : </b>" . $pssword;
      $headers = "From:" . $from;
    $headers .= "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
    $message = '
    <html>
    <head>
        <title>Forgot Password Deatails</title>
    </head>
    <body>

        <table cellspacing="0" style="border: 2px dashed #FB4314; width: 300px; height: 200px;">

            <tr style="background-color: #e0e0e0;">
                <th>Email:</th><td>'.$email.'</td>
            </tr>
            <tr>
                <th>Password:</th><td>'.$pssword.'</td>
            </tr>
        </table>
    </body>
    </html>';

   $mail =  mail($to,$subject,$message,$headers);
    if($mail){
        $this->session->set_flashdata('forgotsuccess', 'Please Check Your Email..');
        redirect();
    }
}

      


}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */