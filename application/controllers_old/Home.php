<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

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
                'field' => 'customer-name',
                'label' => 'Name',
                'rules' => 'trim|required'
            ),
			array(
                'field' => 'customer-phone',
                'label' => 'Phone',
                'rules' => 'trim|required'
            ),
			array(
                'field' => 'customer-dob',
                'label' => 'Date Of Birth',
                'rules' => 'trim|required'
            ),
			array(
                'field' => 'address',
                'label' => 'Address',
                'rules' => 'trim|required'
            ),
        ),
    );
	
	/*array(
			'field' => 'custome-email-address',
			'label' => 'Email',
			'rules' => 'trim|required|valid_email'
		),*/

	public function index()
	{
	    $data=array();
		$where = " where ";
		$limit=10;
		
		$data['search']		  = $this->input->get('search');
		if($data['search'] != ''){
			$where .= "customer_name LIKE '%".trim($data['search'])."%' OR ";
			$where .= "customer_phone LIKE '%".trim($data['search'])."%' OR ";
			$where .= "custome_email_address LIKE '%".trim($data['search'])."%' OR ";
			if (strpos($data['search'], '/') !== false) {
		        $dob = explode("/",$data['search']);
				$date = $dob[2].'-'.$dob[1].'-'.$dob[0];
				$where .= "customer_dob = '".trim($date)."' OR ";
			}
			$where .= "customer_pan_no LIKE '%".trim($data['search'])."%' OR ";
			$where .= "spouse_name LIKE '%".trim($data['search'])."%' OR ";
			$where .= "spouse_name LIKE '%".trim($data['search'])."%' OR ";
			if (strpos($data['search'], '/') !== false) {
					$dob = explode("/",$data['search']);
					$date = $dob[2].'-'.$dob[1].'-'.$dob[0];		
					$where .= "spouse_dob = '".trim($date)."' OR ";
				}
			
		     if (strpos($data['search'], '/') !== false) {
					$dob = explode("/",$data['search']);
					$date = $dob[2].'-'.$dob[1].'-'.$dob[0];
					$where .= "aniversery_date = '".trim($date)."' OR ";
				
			}
			if (strpos($data['search'], '/') !== false) {
		        $dob = explode("/",$data['search']);
				$date = $dob[2].'-'.$dob[1].'-'.$dob[0];
				$where .= "child1_dob = '".trim($date)."' OR ";
			}
			if (strpos($data['search'], '/') !== false) {
		        $dob = explode("/",$data['search']);
				$date = $dob[2].'-'.$dob[1].'-'.$dob[0];
				$where .= "child2_dob = '".trim($date)."' OR ";
			}
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

		$nSer="SELECT * FROM  tb_customer ".$where." ORDER BY customer_id DESC";
		$sql=$nSer." LIMIT ".$limit." OFFSET  ".$offset." ";
		$customers=$this->db->query($sql);		
		$total_rows=count($this->db->query($nSer)->result());	
		$data['customers'] = $customers->result();
		$data['total_rows']=$total_rows;
		$data['limit']=$limit;
		$config['base_url'] = base_url()."admin/home/";
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
		$this->load->view('cdms/home',$data);
	}
	//add customer
	public function add()
	{

		$data=array();
		$this->form_validation->set_rules($this->validation_rules['Add']);

		if($this->form_validation->run() == true )
		{
		
		    $customer_name = $this->input->post('customer-name');
			$customer_phone = $this->input->post('customer-phone');
			$custome_email_address = $this->input->post('custome-email-address');
			$customer_dob = $this->input->post('customer-dob');
			$customer_pan_no = $this->input->post('customer-pan-no');
			$address = $this->input->post('address');
			$spouse_name = $this->input->post('spouse-name');
			$spouse_phone = $this->input->post('spouse-phone');
			$spouse_dob = $this->input->post('spouse-dob');
			$aniversery_date = $this->input->post('aniversery-date');
			$child1_name = $this->input->post('child1-name');
			$child1_dob = $this->input->post('child1-dob');
			$child2_name = $this->input->post('child2-name');
			$child2_dob = $this->input->post('child2-dob');

			//new
			$spouse_pan = $this->input->post('spouse-pan');
			
			
			$customer_array = array("customer_name"=>$customer_name,
									"customer_phone"=>$customer_phone,
									"custome_email_address"=>$custome_email_address,
									"customer_dob"=>$customer_dob,
									"customer_pan_no"=>$customer_pan_no,
									"address"=>$address,
									"spouse_name"=>$spouse_name,
									"spouse_phone"=>$spouse_phone,
									"spouse_pan_no"=>$spouse_pan,
									"spouse_dob"=>$spouse_dob,
									"aniversery_date"=>$aniversery_date,
									"child1_name"=>$child1_name,
									"child1_dob"=>$child1_dob,
									"child2_name"=>$child2_name,
									"child2_dob"=>$child2_dob,
									"aadhar_no"=>$this->input->post('aadhar_no'),
									"spouse_aadhar_no"=>$this->input->post('spouse_aadhar_no'),
									"child1_aadhar_no"=>$this->input->post('child1_aadhar_no'),
									"child2_aadhar_no"=>$this->input->post('child2_aadhar_no'),
									"published"=>1,
									"created_date"=>date('Y-m-d'),
									"created_time"=>date('H:i:s')
									);

			$this->common_model->addRecord('tb_customer',$customer_array);
			
			$base_url="http://msg.infoskysolutions.com/API/WebSMS/Http/v2.3.6/api.php?";
			
			$msg = "Hello ".$customer_name." ! Thanks for joining with us. Assuring you of our best services always. May your dream come true. NFAC Mob- 9231678172";
			 
			$post_fields="username=NIBEDITAP&api_key=493c5299c90f0534ce15a1a8bdf4cbf7&to=".$customer_phone."&message=".$msg;
			$this->send_sms($base_url,$post_fields);
			
			
			$message = '<div class="alert alert-success">Customer data has been successfully added.</p></div>';
			$this->session->set_flashdata('success', $message);
			redirect('admin/home');
	
		}
		else
		{
		
			$where = " where ";
			$limit=10;
			
			$data['search']		  = $this->input->get('search');
			if($data['search'] != ''){
				$where .= "customer_name LIKE '%".trim($data['search'])."%' OR ";
				$where .= "customer_phone LIKE '%".trim($data['search'])."%' OR ";
				$where .= "custome_email_address LIKE '%".trim($data['search'])."%' OR ";
				if (strpos($data['search'], '/') !== false) {
					$dob = explode("/",$data['search']);
					$date = $dob[2].'-'.$dob[1].'-'.$dob[0];
					$where .= "customer_dob = '".trim($date)."' OR ";
				}
				$where .= "customer_pan_no LIKE '%".trim($data['search'])."%' OR ";
				$where .= "spouse_name LIKE '%".trim($data['search'])."%' OR ";
				$where .= "spouse_name LIKE '%".trim($data['search'])."%' OR ";
				if (strpos($data['search'], '/') !== false) {
						$dob = explode("/",$data['search']);
						$date = $dob[2].'-'.$dob[1].'-'.$dob[0];		
						$where .= "spouse_dob = '".trim($date)."' OR ";
					}
				
				 if (strpos($data['search'], '/') !== false) {
						$dob = explode("/",$data['search']);
						$date = $dob[2].'-'.$dob[1].'-'.$dob[0];
						$where .= "aniversery_date = '".trim($date)."' OR ";
					
				}
				if (strpos($data['search'], '/') !== false) {
					$dob = explode("/",$data['search']);
					$date = $dob[2].'-'.$dob[1].'-'.$dob[0];
					$where .= "child1_dob = '".trim($date)."' OR ";
				}
				if (strpos($data['search'], '/') !== false) {
					$dob = explode("/",$data['search']);
					$date = $dob[2].'-'.$dob[1].'-'.$dob[0];
					$where .= "child2_dob = '".trim($date)."' OR ";
				}
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

		$nSer="SELECT * FROM  tb_customer ".$where." ORDER BY customer_id DESC";
		$sql=$nSer." LIMIT ".$limit." OFFSET  ".$offset." ";
		$customers=$this->db->query($sql);		
		$total_rows=count($this->db->query($nSer)->result());	
		$data['customers'] = $customers->result();
		$data['total_rows']=$total_rows;
		$data['limit']=$limit;
		$config['base_url'] = base_url()."admin/home/";
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
		
			$this->load->view('cdms/home',$data);
		}
	}
	
	
	
	public function edit()
	{
	    $data = array();
		$id = $this->uri->segment(4);
		$where_array = array('customer_id'=>$id);
		$sql=$this->common_model->GetAllWhere("tb_customer",$where_array);
		$data['result'] = $sql->result();
		
		$where = " ";
		$limit=10;
		if($this->input->get("per_page")!= '')
		{
			$offset = $this->input->get("per_page");
		}
		else
		{
			$offset=0;
		}

		$nSer="SELECT * FROM  tb_customer ".$where." ORDER BY customer_id DESC";
		$sql=$nSer." LIMIT ".$limit." OFFSET  ".$offset." ";
		$customers=$this->db->query($sql);		
		$total_rows=count($this->db->query($nSer)->result());	
		$data['customers'] = $customers->result();
		$data['total_rows']=$total_rows;
		$data['limit']=$limit;
		$config['base_url'] = base_url()."admin/home/";
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
		
		$this->load->view('cdms/home/edit',$data);
	}
	
	public function update()
	{
		$data = array();
    	$id = $this->input->post('customer_id');
		$where_array = array('customer_id'=>$id);
		$sql=$this->common_model->GetAllWhere("tb_customer",$where_array);
		$data['result'] = $sql->result();
		
		$this->form_validation->set_rules($this->validation_rules['Add']);
		if($this->form_validation->run() == true )
		{
			$customer_name = $this->input->post('customer-name');
			$customer_phone = $this->input->post('customer-phone');
			$custome_email_address = $this->input->post('custome-email-address');
			$customer_dob = $this->input->post('customer-dob');
			$customer_pan_no = $this->input->post('customer-pan-no');
			
			$aadhar_no = $this->input->post('aadhar_no');
			
			$address = $this->input->post('address');
			$spouse_name = $this->input->post('spouse-name');
			$spouse_phone = $this->input->post('spouse-phone');
			$spouse_dob = $this->input->post('spouse-dob');
			$aniversery_date = $this->input->post('aniversery-date');
			$child1_name = $this->input->post('child1-name');
			$child1_dob = $this->input->post('child1-dob');
			$child2_name = $this->input->post('child2-name');
			$child2_dob = $this->input->post('child2-dob');


			//new
			$spouse_pan = $this->input->post('spouse-pan');
			
			
			$customer_array = array("customer_name"=>$customer_name,
									"customer_phone"=>$customer_phone,
									"custome_email_address"=>$custome_email_address,
									"customer_dob"=>$customer_dob,
									"customer_pan_no"=>$customer_pan_no,
									"aadhar_no"=>$aadhar_no,
									"address"=>$address,
									"spouse_name"=>$spouse_name,
									"spouse_phone"=>$spouse_phone,
									"spouse_pan_no"=>$spouse_pan,
									"spouse_dob"=>$spouse_dob,
									"aniversery_date"=>$aniversery_date,
									"child1_name"=>$child1_name,
									"child1_dob"=>$child1_dob,
									"child2_name"=>$child2_name,
									"child2_dob"=>$child2_dob,
									"aadhar_no"=>$this->input->post('aadhar_no'),
									"spouse_aadhar_no"=>$this->input->post('spouse_aadhar_no'),
									"child1_aadhar_no"=>$this->input->post('child1_aadhar_no'),
									"child2_aadhar_no"=>$this->input->post('child2_aadhar_no'),
									"published"=>1,
									"updated_date"=>date('Y-m-d'),
									"updated_time"=>date('H:i:s')
									);
			$this->db->where('customer_id', $id);
			$this->db->update('tb_customer', $customer_array);
			$message = '<div class="alert alert-success">Customer data has been successfully modified.</p></div>';
			$this->session->set_flashdata('success', $message);
			redirect('admin/home/edit/'.$id);

		}
		else
		{	
			//print_r($data['customer']); die;
			$this->load->view('cdms/home/edit',$data);

		}

	

	}
	
	
	public function details()
	{
	    $data = array();
		$id = $this->uri->segment(4);
		$where_array = array('customer_id'=>$id);
		$sql=$this->common_model->GetAllWhere("tb_customer",$where_array);
		$data['customer'] = $sql->result();
		$this->load->view('cdms/home/customer-details',$data);
	}
	
	
	
	public function delete()
	{
	    $id = $this->uri->segment(4);
		$this->db->delete('tb_customer', array('customer_id' => $id));
		$message = '<div class="alert alert-success">Customer data has been successfully deleted.</p></div>';
		$this->session->set_flashdata('success', $message);
		redirect('admin/home'); 

	
	}
	
	public function send_sms($base_url,$post_fields) 
	{
		$ch = curl_init();
		//echo $sms_massage;
		curl_setopt($ch, CURLOPT_URL,$base_url);
		curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_POSTFIELDS,$post_fields);
		// receive server response ...
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		$server_output = curl_exec ($ch);
		$server_output;
		//print_r($server_output);die;
		curl_close ($ch);
	}

         public function checkPanNo()
	{
		$customer_pan_no = $this->input->post('panNo');
		$where_array = array("customer_pan_no"=>$customer_pan_no);
		$query=$this->common_model->GetAllWhere("tb_customer",$where_array);
		if($query->num_rows()>0)
		{
			$temp = 1;
		}
		else
		{	
			$temp = 0;
		}
		
		echo $temp;
	
	
	}
	
	
	
	
	
}
