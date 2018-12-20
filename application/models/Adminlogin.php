<?php

class Adminlogin extends CI_Model { 



	public function __construct() { 

		parent::__construct(); 

	}

	

	/*

	Name : loginCheck

	Purpose : to authentication

	Parameter : username and password

	Return : query;

	*/

	public function loginCheck($user_name,$password) 

	{

		$sql = "SELECT * FROM `tb_admin` WHERE admin_user_name='".$user_name."' AND admin_pwd='".$password."' AND active='Y'" ;

		$query = $this->db->query($sql);

		return $query;

	} /* end of login check function */	

} /* end of class */

?>