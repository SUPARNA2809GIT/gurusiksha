<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {
	 public function __construct() { 
		parent::__construct();

		$this->load->helper(array('url','form','html','text'));
		$this->load->library(array('session','form_validation'));
		$this->load->model(array('adminlogin','common_model'));
	}
	

	public function index()
	{
		$data = array();
		$this->load->view('cdms/login', $data);
	}
	public function admin_login()
	{

		 $data=array();
		 $user_name = $this->input->post('username');
		 $user_password = $this->input->post('password');
		 $user_password = $this->common_model->base64En(2,$user_password);
		 $query = $this->adminlogin->loginCheck($user_name,$user_password); 
		 //echo $this->db->last_query(); die;
			if ($query->num_rows() > 0) 
			{ 
				$row = $query->row(); 
				$this->session->set_userdata('ADMIN_USERNAME', $row->admin_user_name); 
				$this->session->set_userdata('ADMIN_ID', $row->admin_id); 
				redirect('add/language');  

			}
			else { 
				$message = '<div class="alert alert-danger">'."Login Error!!".'</div>';
				$this->session->set_flashdata('success', $message);
				redirect('login'); 
			} 
	}
	
	
	function logout() {		
		$this->session->sess_destroy();		
		redirect(base_url().'login');

	}

}?>