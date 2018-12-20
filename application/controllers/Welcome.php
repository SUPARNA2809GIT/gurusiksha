<?php

defined('BASEPATH') OR exit('No direct script access allowed');



class Welcome extends CI_Controller {



   public function __construct() {



		parent::__construct();

		$this->load->helper(array('url','form','html','text'));

		$this->load->library(array('session','form_validation','pagination','email'));

		$this->load->model(array('common_model'));


	}


	public function index()

	{

		$this->load->view('cdms/welcome');

	}	

}

