<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');



class Change_password extends CI_Controller {

	 public function __construct() {

		parent::__construct();

		$this->load->helper(array('url','form','html','text'));

		$this->load->library(array('session','form_validation','pagination','email'));

		$this->load->model(array('common_model'));

		if($this->session->userdata('ADMIN_ID') =='') {

          redirect('login');

		  }

	}

	

	protected $validation_rules = array
        (
		'passChange' => array(
            array(
                'field' => 'oldPass',
                'label' => 'Old Password',
                'rules' => 'trim|required'
            ),

			array(
                'field'   => 'password',
                'label'   => 'New Password',
                'rules'   => 'trim|required'
            ),
			array(
                'field'   => 'cnfpwd',
                'label'   => 'Confirm Password',
                'rules'   => 'trim|required|matches[password]'

            )

        ),

    );


	public function index()
	{
		$data=array();
		$this->load->view('cdms/account-settings', $data);
	}

	public function save_changes()
	{
	
		$data=array();
		$admin_id=$this->session->userdata('ADMIN_ID');
		$this->form_validation->set_rules($this->validation_rules['passChange']);
		if($this->form_validation->run())
		{
			$oldPass=$this->common_model->base64En(2,$this->input->post('oldPass'));
			$sql="select admin_id from tb_admin where admin_id=".$admin_id." and admin_pwd='".$oldPass."'";
			$record = $this->common_model->get_records_from_sql($sql);
			if(count($record)>0)
			{
			
				$data['admin_pwd']=  $this->common_model->base64En(2,$this->input->post('password')); 
				$data['updated_date']= date('Y-m-d') ;				
				$this->db->where('admin_id', $admin_id);
				$this->db->update('tb_admin', $data);
				$message = '<div class="alert alert-success"><p>Password has been successfully changed! Please Login.</p></div>';
				$this->session->set_flashdata('success', $message);
				redirect('login/logout');
			
			}else{
				$message = '<div class="alert alert-danger" role="alert">Old Password Not Matched.</div>';
				$this->session->set_flashdata('success', $message);
				redirect('change_password');	
		
		}
	
	}else{
		
			$this->load->view('cdms/account-settings', $data);
		
		}
	
	}

	





	

}?>