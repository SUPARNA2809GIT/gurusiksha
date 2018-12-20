<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Send_sms extends CI_Controller {

   public function __construct() {

		parent::__construct();
		$this->load->helper(array('url','form','html','text'));
		$this->load->library(array('session','form_validation','pagination','email'));
		$this->load->model(array('common_model'));
		$this->load->library('curl');
		if($this->session->userdata('ADMIN_ID') =='') {

          redirect('admin/login');

		}
		
	}
	
	public function index()
	{
	    $data=array();
		
		$customer = $this->common_model->GetAllWhere("tb_customer",array());
		$data['customers'] = $customer->result();
		$sms_templete = $this->common_model->GetAllWhere("tb_sms_templete",array());
		$data['sms_templete'] = $sms_templete->result();
		$this->load->view('cdms/send-sms',$data);
		//$this->load->view('cdms/new',$data);
	}
	//send sms
	public function send()
	{
	   
		$choose_customer = explode(",", $this->input->post('choose-customer'));
		
		$count = count($choose_customer);
		
		$choose_template = $this->input->post('choose-template');

		$template =  $this->common_model->GetAllWhere("tb_sms_templete",array("templete_id"=>$choose_template))->row();

		$templete_content = $template->templete_content;

		
		if($choose_customer[0]!='all' && $choose_template!='')
		{
			for($m=0;$m<($count-1);$m++)
			{
				$cust_arr = explode("-", $choose_customer[$m]);
				$custID = $cust_arr[0];
				$custDetail = $this->db->query("select * from tb_customer where customer_id='$custID'")->row();
				
		    	$phone = $custDetail->customer_phone;
				$name = $custDetail->customer_name;

				$templete_content = str_replace("Name",$name,$templete_content);
				
				//sms gateway
				$base_url="http://msg.infoskysolutions.com/API/WebSMS/Http/v2.3.6/api.php?";
				$post_fields="username=NIBEDITAP&api_key=493c5299c90f0534ce15a1a8bdf4cbf7&to=".$phone."&message=".$templete_content;				
				$this->send_sms($base_url,$post_fields);
			}			
			redirect('admin/send_sms');					
		}
		elseif($choose_customer[0]=='all' && $choose_template!='')
		{
			//echo "ok"; die;
			$customers = $this->db->query("select * from tb_customer")->result();
			if($customers)
			{
				foreach($customers as $customer)
				{
					$phone = $customer->customer_phone;
					$name = $customer->customer_name;

					$templete_content = str_replace("Name",$name,$templete_content);
					
					//sms gateway
					$base_url="http://msg.infoskysolutions.com/API/WebSMS/Http/v2.3.6/api.php?";
					$post_fields="username=NIBEDITAP&api_key=493c5299c90f0534ce15a1a8bdf4cbf7&to=".$phone."&message=".$templete_content;					
					$this->send_sms($base_url,$post_fields);
				}
			}			
			redirect('admin/send_sms');	
		}
		
	}
	
	public function get_templete()
	{
	   $templete_id = $this->input->get("templete_id");
	    if($templete_id!='')
		{
			$temp = $this->common_model->GetAllWhere("tb_sms_templete",array("templete_id"=>$templete_id))->result();
			echo $temp[0]->templete_content."||".$temp[0]->templete_name;
		
		}

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
	

}
