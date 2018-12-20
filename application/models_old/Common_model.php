<?php

class Common_model extends CI_Model {



	public function __construct() {



		parent::__construct();

	}
	
	
	

	public function countAll($table_name,$where_clause) {

		if($where_clause != '')

			$this->db->where($where_clause);

		$this->db->select('*');

		$this->db->from($table_name);

		$query = $this->db->get();  

		$tot_rec = $query->num_rows();

		//echo $this->db->last_query();

		return $tot_rec;

	} // end of countAll

	

	

	public function GetAllWhere($table_name,$where_clause) {

		if($where_clause != '')

			$this->db->where($where_clause);

		$this->db->select('*');

		$this->db->from($table_name);

		$query = $this->db->get();  

		

		

		return $query;

	} // end of countAll

	



	

	

	public function count_records($table_name,$where_clause,$field,$fieldVal) {

		$where_clause .= " AND ".$field." = '".$fieldVal."'";

		//echo $where_clause;

		//exit;

		//$this->db->order_by($order_by_fld,$order_by);

		//$this->db->limit($limit,$offset);

		if($where_clause!='')

		$this->db->where($where_clause);

        //$this->db->distinct();		

		$this->db->select('*');

		$this->db->from($table_name);

		$query = $this->db->get();

		//echo $this->db->last_query();

		//exit;

		//return $query; 

        return $query->num_rows();

	} // end of get_all_records

	

	

	public function get_all_distinct_records($table_name,$field) {

        $this->db->distinct();		

		$this->db->select($field);

        $this->db->order_by($field, "asc");

		$this->db->from($table_name);

		$query = $this->db->get();

		//echo $this->db->last_query();

		//exit;

		return $query; 



	} // end of get_all_records

	
	public function Retrive_record_by_slug($table,$slug) {

		$sql = "SELECT * FROM ".$table." WHERE slug='".addslashes($slug)."'" ;

		$query = $this->db->query($sql);

		$row = $query->row_array(); 

		//echo $this->db->last_query();

		return $row;

	} 



	public function Retrive_Record_By_Where_Clause($table,$where_clause) {

		$this->db->select('*');

		$this->db->from($table);

		if(!empty($where_clause))

		$this->db->where($where_clause);

		$query = $this->db->get();

		$row = $query->row_array();

		return $row;

		//$row = $query->row_array();

		//echo $this->db->last_query();

		//print_r($query);

		return $query;

		//echo $query->num_rows;

	}

	

	public function Retrive_Record_By_Where_Clause1($table,$where_clause) {

		$this->db->select('*');

		$this->db->from($table);

		if(!empty($where_clause))

		$this->db->where($where_clause);

		$query = $this->db->get();

		return $query;

		//$row = $query->row_array();

		//echo $this->db->last_query();

		//print_r($query);

		//return $query;

		//echo $query->num_rows;

	}	

	
	public function get_all_records($table_name, $where_clause='',$order_by_fld='',$order_by='',$offset='',$limit='') {

		if($order_by_fld <> '' && $order_by <> '' ){
			$this->db->order_by($order_by_fld,$order_by);
		}

		if($limit <> '' ){
			$this->db->limit($limit,$offset);
		}
		if($where_clause!=''){
			$this->db->where($where_clause);
		}

		$this->db->select('*');
		$this->db->from($table_name);
		$query = $this->db->get();
		return $query; 

	}
	

	public function get_all_records_cms($table_name, $where_clause,$order_by_fld,$order_by,$offset,$limit) {

		$this->db->order_by($order_by_fld,$order_by);

		$this->db->limit($limit,$offset);

		if($where_clause!='')

		$this->db->where($where_clause);

		$this->db->select('*');

		$this->db->from($table_name);

		$query = $this->db->get();  

		return $query; 



	} // end of get_all_records

	public function getallrecords($table_name) {

		$this->db->order_by("id","desc");

		$this->db->select('*');

		$this->db->from($table_name);

		$query = $this->db->get();  

		return $query; 



	} // end of getallrecords

	

	public function getallrecords1($table_name) {

		$this->db->select('*');

		$this->db->from($table_name);

		$query = $this->db->get();  

		return $query; 



	} // end of getallrecords



	public function getrecord($table_name,$where_clause) {

		$this->db->order_by("countryId","desc");

		$this->db->where("countryId = '$id'");

		$this->db->select('*');

		$this->db->from($table_name);

		$query = $this->db->get(); 

		$row   = $query->result();

		return $row; 



	} // end of getallrecords

	

	public function getComment($table_name,$id) {

		$this->db->order_by("id","desc");

		$this->db->select('*');

		$this->db->from($table_name);

		$this->db->where('id',$id);

		$query = $this->db->get();  

		return $query; 



	} // end of getNewsComment	



	

	function Add_Record($row,$table) {

		$str = $this->db->insert_string($table, $row);        

		$query = $this->db->query($str);    

		$insertid = $this->db->insert_id();

		//echo $this->db->last_query(); exit;

		return $insertid;

	

	}	// end of Add_Record

	

	

	

	
	

	function insert_record($table,$row) {

		$this->db->insert($table, $row); 
		$insertid = $this->db->insert_id();
		//echo $this->db->last_query(); exit;
		return $insertid;

	}	// end of Add_Record

	



	function addRecord($table,$row) {

	

		if(is_array($row)) {

			foreach($row as $key=>$val) {

				$row[$key] = $val;

			}

		}

		

		$str = $this->db->insert($table, $row);   

		//echo $this->db->last_query();

		$insertid = $this->db->insert_id();

		//exit;

		return $insertid;

	

	}	

	



	

	

	public function record_change_id($table,$where_clause,$order_by_fld,$order_by,$offset,$limit) {

		$id="";

		$this->db->order_by($order_by_fld,$order_by);

		$this->db->limit($limit,$offset);

		$this->db->where($where_clause);

		$this->db->select('*');

		$this->db->from($table);

		$query = $this->db->get();

		//echo $this->db->last_query();

		foreach ($query->result() as $row){ 

		$id = $row->id;

		}

		//print_r($row); exit;

		if($id!=""){

		return $id; }

	}

	

		public function getallsecurityquestions($table_name) {

		$this->db->order_by("order","asc");

		$this->db->select('*');

		$this->db->where("is_active = '1' ");

		$this->db->from($table_name);

		$query = $this->db->get();  

		return $query; 



	} // end of getall security question records

	

	

	

	

	

	


	#Decription Function

	public function base64De($num,$val) {

		for($i=0; $i<$num; $i++) {

			$val = base64_decode($val);

		}

		

		return $val;

	}



	#Encryption Function

	public function base64En($num,$val) {

		for($i=0; $i<$num; $i++) {

			$val = base64_encode($val);

		}

		

		Return $val;

	}

	public function getRandomNumber($length)

	{

			

		$random= "";

		$data1 = "";

		srand((double)microtime()*1000000);

		$data1 = "9876549876542156012";

		$data1 .= "0123456789564542313216743132136864313";

		for($i = 0; $i < $length; $i++)

		{

			$random .= substr($data1, (rand()%(strlen($data1))), 1);

		}

		return $random;

	} 



	public function getVerifyNumber($length)

	{		

		$random= "";

		$data1 = "";

		srand((double)microtime()*1000000);

		$data1 = "0123456789";

		$data1 .= "ABCDEFGHIJKLMNOPQRSTUVWXYZ";

		for($i = 0; $i < $length; $i++)

		{

			$random .= substr($data1, (rand()%(strlen($data1))), 1);

		}

		return $random;

	} 



	

	



	function Update_Record($row,$table,$id,$column) {

		$this->db->where($column, $id);

		$this->db->update($table, $row);

	}

	

	

	

	

	

	public function Email_exists($email) {

		$sql = "SELECT * FROM ".USER." WHERE email='".$email."'" ;

		$query = $this->db->query($sql);

		$row = $query->num_rows(); 

		//echo $this->db->last_query();

		return $row;

	} // end of Retrive_User

		

	public function userEmailExists($email) {

		$sql = "SELECT * FROM tbl_registered_user WHERE email='".$email."'" ;

		$query = $this->db->query($sql);

		$row = $query->num_rows(); 

		//echo $this->db->last_query();

		return $row;

	} // end of Retrive_User

	

	

	

	function subwords( $str, $max = 24, $char = ' ', $end = '...' ) {

    $str = trim( $str ) ;

    $str = $str . $char ;

    $len = strlen( $str ) ;

    $words = '' ;

    $w = '' ;

    $c = 0 ;

    for ( $i = 0; $i < $len; $i++ )

        if ( $str[$i] != $char )

            $w = $w . $str[$i] ;

        else

            if ( ( $w != $char ) and ( $w != '' ) ) {

                $words .= $w . $char ;

                $c++ ;

                if ( $c >= $max ) {

                    break ;

                }

                $w = '' ;

            }

    if ( $i+1 >= $len ) {

        $end = '' ;

    }

    return trim( $words ) . $end ;

	}

	

	

	public function delele($tbl,$feild,$field_value){

	
		$this->db->delete($tbl, array($feild => $field_value)); 

	}
	
	
	public function get_records_from_sql($sql)
	{


		$query = $this->db->query($sql);

		return $query->result();

		

	}
    
	public function get_all_record($table_name,$where_array){

		$res=$this->db->get_where($table_name,$where_array);

		return $res->result();

	}

	



}

//end of class

?>