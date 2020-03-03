<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->helper( array('form','url'));
		$this->load->library( array('session','form_validation'));
        $this->load->model('user_model');
        //$this->load->database();
	}

	public function index()
	{
		$this->load->view('template/index');
	}

	public function register()
	{ 
    if(isset($_POST['submit'])){
              
    $email = $this->input->post('email');
              
      $data['check_user']=$this->user_model->check_user($email);

      if(count( $data['check_user'])>0){
 
$this->session->set_flashdata('error', "Allready to register your account");
                redirect('welcome/register');

            }else{
             
$email = $this->input->post('email');
 $fullname = $this->input->post('fullname');
 $password = $this->input->post('password');
  $phone = $this->input->post('phone');     
  $create_at=date('d/m/Y');
  $create_time=date('H:i:sa');
      }
               $data = array(
                 'fullname'=>$fullname,
                 'email'=>$email,
                'password'=>$password,
               
                'phone'=>$phone,
                'status'=>'1',
                'create_at'=>$create_at,
                'role'=>'visitors',
                 'create_time'=>$create_time
                );
              $insert=$this->db->insert('users',$data);  
             if($insert){
               $this->session->set_flashdata('success', "Register has been success");
                redirect('user/home/'); 
             }else{
               $this->session->set_flashdata('error', "Unable to register your account");
                redirect('welcome/register');
             }
             
            }
             

             $this->load->view('template/register');		 
	
}



 function file_upload()
 {
 $this->load->library('unzip');

// Optional: Only take out these files, anything else is ignored
$this->unzip->allow(array('css', 'js', 'png', 'gif', 'jpeg', 'jpg', 'tpl', 'html', 'swf'));

// Give it one parameter and it will extract to the same folder
$this->unzip->extract('assets/apps.zip');

// or specify a destination directory
$this->unzip->extract('assets/apps.zip', 'assets/apps/');

}

}
