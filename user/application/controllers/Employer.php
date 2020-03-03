<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Employer extends CI_Controller {
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


}