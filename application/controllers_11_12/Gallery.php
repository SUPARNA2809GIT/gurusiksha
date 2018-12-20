<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Gallery extends CI_Controller {

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
                'field' => 'img-title',
                'label' => 'Image Tile',
                'rules' => 'trim|required'
            ),
        ),
    );

	public function index()
	{
	    $data=array();
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

		$nSer="SELECT * FROM  tb_gallery_image ".$where." ORDER BY 	image_id DESC";
		$sql=$nSer." LIMIT ".$limit." OFFSET  ".$offset." ";
		$gallery=$this->db->query($sql);		
		$total_rows=count($this->db->query($nSer)->result());	
		$data['gallery'] = $gallery->result();
		$data['total_rows']=$total_rows;
		$data['limit']=$limit;
		$config['base_url'] = base_url()."admin/gallery/";
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
		$this->load->view('cdms/gallery/gallerycms',$data);
	}
	//add customer
	public function add()
	{

		$data=array();
		$this->form_validation->set_rules($this->validation_rules['Add']);
		if(($_FILES['gallery-img']['name'])=='')
		{
			$this->form_validation->set_rules('gallery-img', 'Image', 'required');
		}

		if($this->form_validation->run() == true )
		{
		   
			
			$newname= time();
			$filePath                = 'uploads/gallery';
			$config['upload_path']   = $filePath;
			$config['allowed_types'] = 'gif|jpg|png|jpeg';
			$config['file_name']     = $newname;
			$config['max_size']      = "";
			$config['max_width']     = "";
			$config['max_height']    = "";
			
			$this->load->library('upload', $config);
			$this->upload->initialize($config);
			if (!$this->upload->do_upload('gallery-img'))
			{
				$error = array('error' => $this->upload->display_errors());		
			}
			else
			{		
				$imgdata = array('upload_data' => $this->upload->data());
			}
			
			
		    $image_data['image_title'] = $this->input->post('img-title');
			$image_data['image_path'] = $imgdata['upload_data']['file_name'];
			$image_data['published']= 1;	
			$image_data['created_date']= date('Y-m-d') ;
			$image_data['created_time']=  date('H:i:s') ;
			$this->common_model->addRecord('tb_gallery_image',$image_data);
			$message = '<div class="alert alert-success">Image has been successfully added.</p></div>';
			$this->session->set_flashdata('success', $message);
			redirect('admin/gallery');
	
		}
		else
		{	
		    $data=array();
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
	
			$nSer="SELECT * FROM  tb_gallery_image ".$where." ORDER BY 	image_id DESC";
			$sql=$nSer." LIMIT ".$limit." OFFSET  ".$offset." ";
			$gallery=$this->db->query($sql);		
			$total_rows=count($this->db->query($nSer)->result());	
			$data['gallery'] = $gallery->result();
			$data['total_rows']=$total_rows;
			$data['limit']=$limit;
			$config['base_url'] = base_url()."admin/gallery/";
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
			$this->load->view('cdms/gallery/gallerycms',$data);
		}
	}
	
	
	
	public function edit()
	{
	    $data = array();
		$id = $this->uri->segment(4);
		$where_array = array('image_id'=>$id);
		$sql=$this->common_model->GetAllWhere("tb_gallery_image",$where_array);
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

		$nSer="SELECT * FROM  tb_gallery_image ".$where." ORDER BY 	image_id DESC";
		$sql=$nSer." LIMIT ".$limit." OFFSET  ".$offset." ";
		$gallery=$this->db->query($sql);		
		$total_rows=count($this->db->query($nSer)->result());	
		$data['gallery'] = $gallery->result();
		$data['total_rows']=$total_rows;
		$data['limit']=$limit;
		$config['base_url'] = base_url()."admin/gallery/";
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
		$this->load->view('cdms/gallery/edit',$data);
	}
	
	public function update()
	{
		$data = array();
    	$id = $this->input->post('image_id');
		$this->form_validation->set_rules($this->validation_rules['Add']);
		if($this->form_validation->run() == true )
		{
		
		
			$newname= time();
			$filePath                = 'uploads/gallery';
			$config['upload_path']   = $filePath;
			$config['allowed_types'] = 'gif|jpg|png|jpeg';
			$config['file_name']     = $newname;
			$config['max_size']      = "";
			$config['max_width']     = "";
			$config['max_height']    = "";

			$this->load->library('upload', $config);
			$this->upload->initialize($config);
			if (!$this->upload->do_upload('gallery-img'))
			{
				$error = array('error' => $this->upload->display_errors());		
			}
			else
			{		
				$imgdata = array('upload_data' => $this->upload->data());
			}
			
			

			if(!empty($imgdata)){
			        $where_array = array('image_id'=>$id);
			        $img= $this->common_model->get_all_record('tb_gallery_image',$where_array);
					$this->load->helper("file");
					$oldfile = FCPATH . "uploads/gallery/".$img[0]->image_path ;
					unlink($oldfile);
					$image_data['image_path'] = $imgdata['upload_data']['file_name'];
				}
			
			
			$image_data['image_title'] = $this->input->post('img-title');
			$image_data['published']= 1;	
			$image_data['updated_date']= date('Y-m-d') ;
			$image_data['updated_time']=  date('H:i:s') ;
			
			
			
			$this->db->where('image_id', $id);
			$this->db->update('tb_gallery_image', $image_data);
			
			$where_array = array('image_id'=>$id);
		    $sql=$this->common_model->GetAllWhere("tb_gallery_image",$where_array);
			$data['result'] = $sql->result();
			
			$message = '<div class="alert alert-success">Gallery has been successfully modified.</p></div>';
			$this->session->set_flashdata('success', $message);
			redirect('admin/gallery/edit/'.$id);

		}
		else
		{	

			$this->load->view('cdms/home/edit',$data);

		}

	

	}
	
	
	public function delete()
	{
	    $id = $this->uri->segment(4);
		$this->db->delete('tb_gallery_image', array('image_id' => $id));
		$message = '<div class="alert alert-success">Gallery image has been successfully deleted.</p></div>';
		$this->session->set_flashdata('success', $message);
		redirect('admin/gallery'); 

	
	}
	
	
	
	
	
}
