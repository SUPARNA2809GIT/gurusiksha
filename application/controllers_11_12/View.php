<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class View extends CI_Controller {

   public function __construct() {

		parent::__construct();
		$this->load->helper(array('url','form','html','text'));
		$this->load->library(array('session','form_validation','pagination','email'));
		$this->load->model(array('common_model'));
		if($this->session->userdata('ADMIN_ID') =='') {

         redirect('login');

		}
		
	}
	

	public function student()
	{
		$id = $this->uri->segment(3);
		$data['v']=$this->db->query("SELECT * FROM tb_students WHERE student_id=".$id)->row();
		$this->load->view('cdms/stud_reg_view',$data);
	}


	public function mentor()
	{
		$id = $this->uri->segment(3);
		$data['v']=$this->db->query("SELECT * FROM tb_mentors WHERE mentor_id=".$id)->row();
		$this->load->view('cdms/mentor-view',$data);

	}

	public function guardian()
	{
		$id = $this->uri->segment(3);
		$data['v']=$this->db->query("SELECT * FROM tb_guardian WHERE guardian_id=".$id)->row();
		$this->load->view('cdms/guardian-view',$data);

	}
	public function Enquiry()
	{
		
		$this->load->view('cdms/enquiry-view');

	}
	public function Contact()
	{
		
		$this->load->view('cdms/contact-view');

	}
	public function chat()
	{
		
		$this->load->view('cdms/chat-view');

	}
	public function student_payment()
	{
		
		$this->load->view('cdms/stud-pay-view');

	}
	public function mentor_details()
	{
		
		$this->load->view('cdms/mentor-pay-view');

	}
	public function assesment_details()
	{
		
		$this->load->view('cdms/stud-pay-view');

	}
	public function progress_reports()
	{
		
		$this->load->view('cdms/stud-progress-view');

	}

}
