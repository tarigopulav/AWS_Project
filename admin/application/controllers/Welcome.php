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
    
		$this->load->view('index');
	}

	public function register()
	{
		 $this->form_validation->set_rules('company_name', '', 'trim|required');
         if ($this->form_validation->run() == FALSE)
        {
         $this->load->view('template/register');            
        } else{
              $contact_person = $this->input->post('contact_person');
              $phone = $this->input->post('phone');
              $email = $this->input->post('email');
              $notice = $this->input->post('notice');
              $company_name = $this->input->post('company_name');

              $data = array('company_name'=>$company_name,
                'contact_person'=>$contact_person,
                'client_email'=>$email,
                'client_phone'=>$phone,
                'client_notice'=>$notice,

                );
              $this->db->insert('clients',$data);  

              $this->session->set_flashdata('success', "Register has been success"); 

              redirect('welcome/register'); 
 				 
	}
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
