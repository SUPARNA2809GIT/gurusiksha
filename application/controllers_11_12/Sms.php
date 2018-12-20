<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sms extends CI_Controller {

   public function __construct() {

		parent::__construct();
		$this->load->helper(array('url','form','html','text'));
		$this->load->library(array('session','form_validation','pagination','email'));
		$this->load->model(array('common_model'));
		if($this->session->userdata('ADMIN_ID') =='') {

         redirect('admin/login');

		}
		
	}
	
	protected $validation_rules = array
    (
		'Add' => array(
			array(
                'field' => 'templete_name',
                'label' => 'Templete Name',
                'rules' => 'trim|required'
            ),
			array(
                'field' => 'templete_content',
                'label' => 'Content',
                'rules' => 'trim|required'
            ),
			
        ),
    );

	public function index()
	{
	    $data=array();
		$where = " where ";
		$limit=10;
		
		$data['search']		  = $this->input->get('search');
		if($data['search'] != ''){
			$where .= "templete_name LIKE '%".trim($data['search'])."%' OR ";
		}
		
		
		
		$where = substr($where,0,(strlen($where)-3));
		
		
		if($this->input->get("per_page")!= '')
		{
			$offset = $this->input->get("per_page");
		}
		else
		{
			$offset=0;
		}

		$nSer="SELECT * FROM  tb_sms_templete ".$where." ORDER BY templete_name DESC";
		$sql=$nSer." LIMIT ".$limit." OFFSET  ".$offset." ";
		$sms_tempeletes=$this->db->query($sql);		
		$total_rows=count($this->db->query($nSer)->result());	
		$data['sms_tempeletes'] = $sms_tempeletes->result();
		$data['total_rows']=$total_rows;
		$data['limit']=$limit;
		$config['base_url'] = base_url()."admin/sms/";
		$config['total_rows'] = $total_rows;
		$config['per_page'] = $limit;
		$config['page_query_string'] = TRUE;
	    $config['full_tag_open'] = "<ul class='pagination pagination-sm text-center'>";
		$config['full_tag_close'] = "</ul>";
		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';
		$config['cur_tag_open'] = "<li><li class='active'><a href='#'>";
		$config['cur_tag_close'] = "<span class='sr-only'></span></a></li>";
		$config['next_tag_open'] = "<li>";
		$config['next_tagl_close'] = "</li>";
		$config['prev_tag_open'] = "<li>";
		$config['prev_tagl_close'] = "</li>";
		$config['first_tag_open'] = "<li>";
		$config['first_tagl_close'] = "</li>";
		$config['last_tag_open'] = "<li>";
		$config['last_tagl_close'] = "</li>";
		$this->pagination->initialize($config);
		$paginator = $this->pagination->create_links();
		$data['paginator'] = $paginator;
		//echo $this->db->last_query();die;
		$this->load->view('cdms/sms/add',$data);
	}
	//add customer
	public function add()
	{

		$data=array();
		$this->form_validation->set_rules($this->validation_rules['Add']);

		if($this->form_validation->run() == true )
		{
		
		    $templete_name = $this->input->post('templete_name');
			$templete_content = $this->input->post('templete_content');
			
			
			
			$tempt_array = array("templete_name"=>$templete_name,
									"templete_content"=>$templete_content
									);

			$this->common_model->addRecord('tb_sms_templete',$tempt_array);
			$message = '<div class="alert alert-success">SMS templete has been successfully added.</p></div>';
			$this->session->set_flashdata('success', $message);
			redirect('admin/sms');
	
		}
		else
		{
			$where = " where ";
			$limit=10;
			
			$data['search']		  = $this->input->get('search');
			if($data['search'] != ''){
				$where .= "templete_name LIKE '%".trim($data['search'])."%' OR ";
			}
			
			
			
			$where = substr($where,0,(strlen($where)-3));
			
			
			if($this->input->get("per_page")!= '')
			{
				$offset = $this->input->get("per_page");
			}
			else
			{
				$offset=0;
			}
	
			$nSer="SELECT * FROM  tb_sms_templete ".$where." ORDER BY templete_name DESC";
			$sql=$nSer." LIMIT ".$limit." OFFSET  ".$offset." ";
			$sms_tempeletes=$this->db->query($sql);		
			$total_rows=count($this->db->query($nSer)->result());	
			$data['sms_tempeletes'] = $sms_tempeletes->result();
			$data['total_rows']=$total_rows;
			$data['limit']=$limit;
			$config['base_url'] = base_url()."admin/sms/";
			$config['total_rows'] = $total_rows;
			$config['per_page'] = $limit;
			$config['page_query_string'] = TRUE;
			$config['full_tag_open'] = "<ul class='pagination pagination-sm text-center'>";
			$config['full_tag_close'] = "</ul>";
			$config['num_tag_open'] = '<li>';
			$config['num_tag_close'] = '</li>';
			$config['cur_tag_open'] = "<li><li class='active'><a href='#'>";
			$config['cur_tag_close'] = "<span class='sr-only'></span></a></li>";
			$config['next_tag_open'] = "<li>";
			$config['next_tagl_close'] = "</li>";
			$config['prev_tag_open'] = "<li>";
			$config['prev_tagl_close'] = "</li>";
			$config['first_tag_open'] = "<li>";
			$config['first_tagl_close'] = "</li>";
			$config['last_tag_open'] = "<li>";
			$config['last_tagl_close'] = "</li>";
			$this->pagination->initialize($config);
			$paginator = $this->pagination->create_links();
			$data['paginator'] = $paginator;
			$this->load->view('cdms/sms/add',$data);
		}
	}
	
	
	
	public function edit()
	{
	    $data = array();
		$id = $this->uri->segment(4);
		$where_array = array('templete_id'=>$id);
		$sql=$this->common_model->GetAllWhere("tb_sms_templete",$where_array);
		$data['result'] = $sql->result();
		
		$where = " where ";
		$limit=10;
		
		$data['search']		  = $this->input->get('search');
		if($data['search'] != ''){
			$where .= "templete_name LIKE '%".trim($data['search'])."%' OR ";
		}
		
		
		
		$where = substr($where,0,(strlen($where)-3));
		
		
		if($this->input->get("per_page")!= '')
		{
			$offset = $this->input->get("per_page");
		}
		else
		{
			$offset=0;
		}

		$nSer="SELECT * FROM  tb_sms_templete ".$where." ORDER BY templete_name DESC";
		$sql=$nSer." LIMIT ".$limit." OFFSET  ".$offset." ";
		$sms_tempeletes=$this->db->query($sql);		
		$total_rows=count($this->db->query($nSer)->result());	
		$data['sms_tempeletes'] = $sms_tempeletes->result();
		$data['total_rows']=$total_rows;
		$data['limit']=$limit;
		$config['base_url'] = base_url()."admin/sms/";
		$config['total_rows'] = $total_rows;
		$config['per_page'] = $limit;
		$config['page_query_string'] = TRUE;
		$config['full_tag_open'] = "<ul class='pagination pagination-sm text-center'>";
		$config['full_tag_close'] = "</ul>";
		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';
		$config['cur_tag_open'] = "<li><li class='active'><a href='#'>";
		$config['cur_tag_close'] = "<span class='sr-only'></span></a></li>";
		$config['next_tag_open'] = "<li>";
		$config['next_tagl_close'] = "</li>";
		$config['prev_tag_open'] = "<li>";
		$config['prev_tagl_close'] = "</li>";
		$config['first_tag_open'] = "<li>";
		$config['first_tagl_close'] = "</li>";
		$config['last_tag_open'] = "<li>";
		$config['last_tagl_close'] = "</li>";
		$this->pagination->initialize($config);
		$paginator = $this->pagination->create_links();
		$data['paginator'] = $paginator;
		
		$this->load->view('cdms/sms/edit',$data);
	}
	
	public function update()
	{
		$data = array();
    	$id = $this->input->post('templete_id');
		$where_array = array('templete_id'=>$id);
		$sql=$this->common_model->GetAllWhere("tb_sms_templete",$where_array);
		$data['customer'] = $sql->result();
		$this->form_validation->set_rules($this->validation_rules['Add']);
		if($this->form_validation->run() == true )
		{
			$templete_name = $this->input->post('templete_name');
			$templete_content = $this->input->post('templete_content');
			
			
			
			$tempt_array = array("templete_name"=>$templete_name,
									"templete_content"=>$templete_content
									);
									
			$this->db->where('templete_id', $id);
			$this->db->update('tb_sms_templete', $tempt_array);
			
			$message = '<div class="alert alert-success">SMS Templete has been successfully modified.</p></div>';
			$this->session->set_flashdata('success', $message);
			redirect('admin/sms/edit/'.$id);

		}
		else
		{	

			$this->load->view('cdms/sms/edit',$data);

		}

	

	}
	
	
	
	
	public function delete()
	{
	    $id = $this->uri->segment(4);
		$this->db->delete('tb_sms_templete', array('templete_id' => $id));
		$message = '<div class="alert alert-success">SMS Templete data has been successfully deleted.</p></div>';
		$this->session->set_flashdata('success', $message);
		redirect('admin/sms'); 

	
	}
	
	
	
	
	
}
