<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Delete extends CI_Controller {

   public function __construct() {

        parent::__construct();
        $this->load->helper(array('url','form','html','text'));
        $this->load->library(array('session','form_validation','pagination','email'));
        $this->load->model(array('common_model'));
        if($this->session->userdata('ADMIN_ID') =='') {

         redirect('login');

        }
        
    }

    public function dlt($tbl,$dltClm,$value,$redirect)
    {
        $this->db->delete($tbl,array($dltClm=>$value));
        $message = '<div class="alert alert-success">Success!!</div>';
        $this->session->set_flashdata('success', $message);
        redirect("add/".$redirect);

    }


    public function assesmentdlt($assmnt_id)
    {
        $this->db->delete("tb_self_assesment",array("assmnt_id"=>$assmnt_id));
        $this->db->delete("tb_self_assesment_q",array("assmnt_id"=>$assmnt_id));
        $this->db->delete("tb_assesments_opt",array("assmnt_id"=>$assmnt_id));
        $message = '<div class="alert alert-success">Success!!</div>';
        $this->session->set_flashdata('success', $message);
        redirect("add/self_assesments");

    }



}