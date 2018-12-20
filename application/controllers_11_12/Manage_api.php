<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Manage_api extends CI_Controller {

   public function __construct() {

		parent::__construct();
		$this->load->helper(array('url','form','html','text'));
		$this->load->library(array('session','form_validation','email'));
		$this->load->model(array('common_model'));
		
		
	}

    //Mobile verification Student
    public function mobileVerification()
    {

        if($this->input->post('studentPhone')!='')
        {
	           $email = $this->input->post('studentemail');
	           $mobile = $this->input->post('studentPhone');

	           $numRows = $this->db->query("SELECT * FROM tb_students WHERE email='".$email."' OR mobile='".$mobile."'")->num_rows();
	           $numRowsG = $this->db->query("SELECT * FROM tb_guardian WHERE guardian_email='".$email."' OR guardian_mobile='".$mobile."'")->num_rows();

	           $numRowsM = $this->db->query("SELECT * FROM tb_mentors WHERE mentor_email='".$email."' OR mentor_mobile='".$mobile."'")->num_rows();

	           if($numRows>0 || $numRowsG>0 || $numRowsM>0)
	           {
	                echo json_encode(array('success'=>0));
	           }
	           else
	           {




	               $otp = rand(1000,9999);

	               $base_url="https://sms.infoskysolutions.com/API/WebSMS/Http/v2.3.6/api.php?";
	               $post_fields="username=BEBONGT&api_key=c6a5991b36e64e09a1845f818cac2eb2&sender=BeBong&to=".$mobile."&message=Hello, Your Order ".$otp." has been placed successfully. Be Bong Store.";
	               $this->send_sms($base_url,$post_fields);



	               // $emailVCode = rand(1000,9999);
	               // $this->sendemail($email,$emailVCode);

	               //tb_class

	               //date('h:i A', strtotime($v->time))

	               $class = $this->db->query("SELECT * FROM tb_class ORDER BY class ASC ")->result();
	               $subject = $this->db->query("SELECT * FROM tb_subject ORDER BY subject ASC ")->result();
	               $days = $this->db->query("SELECT * FROM tb_teaching_days ORDER BY day_id ASC ")->result();
	               $time = $this->db->query("SELECT * FROM tb_teaching_time ORDER BY time_id ASC ")->result();
	               $language = $this->db->query("SELECT * FROM tb_language ORDER BY language_name ASC ")->result();

	               $time1 = array();
	               foreach ($time as $v) {
	               	 $time1[]= date('h:i A', strtotime($v->time));
	               }
	               
	               header('Access-Control-Allow-Origin: *');
	               echo json_encode(array('success'=>1, 'mobile'=>$mobile,'otp'=>$otp,"email"=>$email, "class"=>$class, "subject"=>$subject, "days"=>$days, "time"=>$time1, "language"=>$language));

	           }

	    }

	}

	//Save student data
	public function saveStudent()
	{

		//{ studentPhone: studentPhone, studentEmail: studentEmail, studentName: studentName, studentDOB: studentDOB, studentGender: studentGender, studentAddress: studentAddress, studentPin: studentPin, studentGname: studentGname, studentGphone: studentGphone, studentSchool: studentSchool, studentClass: studentClass, studentBoard: studentBoard, studentSubject1: studentSubject1, studentSubject2: studentSubject2, studentSubject3: studentSubject3, studentSubject4: studentSubject4, studentDay: studentDay, studentTime: studentTime, studentLanguage: studentLanguage}.

	    $name = $this->input->post('studentName');
	    $dob = $this->input->post('studentDOB');
	    $gender = $this->input->post('studentGender');
	    $email = $this->input->post('studentEmail');
	    $mobile = $this->input->post('studentPhone');
	    $address = $this->input->post('studentAddress');
	    $pin = $this->input->post('studentPin');

	    $school = $this->input->post('studentSchool');
	    $class = $this->input->post('studentClass');
	    $board_name = $this->input->post('studentBoard');
	    $preferred_day = $this->input->post('studentDay');
	    $preferred_time = $this->input->post('studentTime');
	    $language = $this->input->post('studentLanguage');


	    $guardian_name = $this->input->post('studentGname');
	    $guardian_phone = $this->input->post('studentGphone');


		$students_array = array("name"=>$name,
							   "dob"=>$dob,
							   "gender"=>$gender,
							   "email"=>$email,
							   "mobile"=>$mobile,
							   "address"=>$address,
							   "pin"=>$pin,
							   "school"=>$school,
							   "class"=>$class,
							   "board_name"=>$board_name,
							   "preferred_day"=>$preferred_day,
							   "preferred_time"=>$preferred_time,
							   "language"=>$language,
							   "guardian_name"=>$guardian_name,
							   "guardian_phone"=>$guardian_phone,
							   "status"=>1,
							   "created_date"=>date('Y-m-d'),
							   "created_time"=>date('H:i:s')
							   );

		$student_id = $this->common_model->addRecord('tb_students',$students_array);


		if($student_id!=''){

				$subject1 = $this->input->post('studentSubject1');
				$subject2 = $this->input->post('studentSubject2');
				$subject3 = $this->input->post('studentSubject3');
				$subject4 = $this->input->post('studentSubject4');


				if(!empty($subject1))
				{
					$subject_array1 = array("student_id"=>$student_id,
				                           "subject_id"=>$subject1,
				                           "created_date"=>date('Y-m-d'),
									       "created_time"=>date('H:i:s')
									      );

					$this->common_model->addRecord('tb_students_subject',$subject_array1);
				}

				if(!empty($subject2))
				{
					$subject_array2 = array("student_id"=>$student_id,
				                           "subject_id"=>$subject2,
				                           "created_date"=>date('Y-m-d'),
									       "created_time"=>date('H:i:s')
									      );

					$this->common_model->addRecord('tb_students_subject',$subject_array2);
				}


				if(!empty($subject3))
				{
					$subject_array3 = array("student_id"=>$student_id,
				                           "subject_id"=>$subject3,
				                           "created_date"=>date('Y-m-d'),
									       "created_time"=>date('H:i:s')
									      );

					$this->common_model->addRecord('tb_students_subject',$subject_array3);
				}

				if(!empty($subject4))
				{
					$subject_array4 = array("student_id"=>$student_id,
				                           "subject_id"=>$subject4,
				                           "created_date"=>date('Y-m-d'),
									       "created_time"=>date('H:i:s')
									      );

					$this->common_model->addRecord('tb_students_subject',$subject_array4);
				}

		
			header('Access-Control-Allow-Origin: *');
	        echo json_encode(array('success'=>1));
		}

	}


	//Mobile verification Guardian
	public function mobileVerificationG()
	{
		//{ gPhone: gPhone, gEmail: gEmail}
		if($this->input->post('gPhone')!='')
        {
	           $email = $this->input->post('gEmail');
	           $mobile = $this->input->post('gPhone');


	           // $numRows = $this->db->query("SELECT * FROM tb_guardian WHERE guardian_email='".$email."' OR guardian_mobile='".$mobile."'")->num_rows();
	           // if($numRows>0)
	           // { }

	           $numRows = $this->db->query("SELECT * FROM tb_students WHERE email='".$email."' OR mobile='".$mobile."'")->num_rows();
	           $numRowsG = $this->db->query("SELECT * FROM tb_guardian WHERE guardian_email='".$email."' OR guardian_mobile='".$mobile."'")->num_rows();

	           $numRowsM = $this->db->query("SELECT * FROM tb_mentors WHERE mentor_email='".$email."' OR mentor_mobile='".$mobile."'")->num_rows();

	           if($numRows>0 || $numRowsG>0 || $numRowsM>0)
	           {
	                echo json_encode(array('success'=>0));
	           }
	           else
	           {
	               $otp = rand(1000,9999);

	               $base_url="https://sms.infoskysolutions.com/API/WebSMS/Http/v2.3.6/api.php?";
	               $post_fields="username=BEBONGT&api_key=c6a5991b36e64e09a1845f818cac2eb2&sender=BeBong&to=".$mobile."&message=Hello, Your Order ".$otp." has been placed successfully. Be Bong Store.";
	               //$this->send_sms($base_url,$post_fields);
	               
	               header('Access-Control-Allow-Origin: *');
	               echo json_encode(array('success'=>1, 'mobile'=>$mobile,'otp'=>$otp));

	           }

	    }
	}


	public function saveGuardian(){

			//{ gName: gName, gPhone: gPhone, gEmail: gEmail, gAddress: gAddress, gRelation: gRelation, gGender: gGender}

		if($this->input->post('gName')!='')
		{
			$name                = $this->input->post('gName');
			$gender              = $this->input->post('gGender');
			$email               = $this->input->post('gEmail');
			$mobile              = $this->input->post('gPhone');
			$address             = $this->input->post('gAddress');
			$pin                 = $this->input->post('gPin');
			$rel_with_stud       = $this->input->post('gRelation');


			$guardian_array = array("guardian_name"=>$name,
									"guardian_gender"=>$gender,
									"guardian_email"=>$email,
									"guardian_mobile"=>$mobile,
									"guardian_address"=>$address,
									"guardian_pin"=>$pin,
									"rel_with_stud"=>$rel_with_stud,
									"status"=>1,
									"created_date"=>date('Y-m-d'),
									"created_time"=>date('H:i:s')
			                      );

			$guardian_id = $this->common_model->addRecord('tb_guardian',$guardian_array);

			if($guardian_id!='')
			{
				 header('Access-Control-Allow-Origin: *');
	             echo json_encode(array('success'=>1));
			}
		}
	}




	//Mobile verification Mentor
	public function mobileVerificationM()
	{
		//{ gPhone: gPhone, gEmail: gEmail}
		if($this->input->post('mentorPhone')!='')
        {
	           $email = $this->input->post('mentoremail');
	           $mobile = $this->input->post('mentorPhone');


	           // $numRows = $this->db->query("SELECT * FROM tb_mentors WHERE mentor_email='".$email."' OR mentor_mobile='".$mobile."'")->num_rows();
	           // if($numRows>0)
	           // {}
	           $numRows = $this->db->query("SELECT * FROM tb_students WHERE email='".$email."' OR mobile='".$mobile."'")->num_rows();
	           $numRowsG = $this->db->query("SELECT * FROM tb_guardian WHERE guardian_email='".$email."' OR guardian_mobile='".$mobile."'")->num_rows();

	           $numRowsM = $this->db->query("SELECT * FROM tb_mentors WHERE mentor_email='".$email."' OR mentor_mobile='".$mobile."'")->num_rows();

	           if($numRows>0 || $numRowsG>0 || $numRowsM>0)
	           {
	                echo json_encode(array('success'=>0));
	           }
	           else
	           {
	               $otp = rand(1000,9999);

	               $base_url="https://sms.infoskysolutions.com/API/WebSMS/Http/v2.3.6/api.php?";
	               $post_fields="username=BEBONGT&api_key=c6a5991b36e64e09a1845f818cac2eb2&sender=BeBong&to=".$mobile."&message=Hello, Your Order ".$otp." has been placed successfully. Be Bong Store.";
	               //$this->send_sms($base_url,$post_fields);


	              
	               $subject = $this->db->query("SELECT * FROM tb_subject ORDER BY subject ASC ")->result();
	               $days = $this->db->query("SELECT * FROM tb_teaching_days ORDER BY day_id ASC ")->result();
	               $time = $this->db->query("SELECT * FROM tb_teaching_time ORDER BY time_id ASC ")->result();
	               $language = $this->db->query("SELECT * FROM tb_language ORDER BY language_name ASC ")->result();

	               $time1 = array();
	               foreach ($time as $v) {
	               	 $time1[]= date('h:i A', strtotime($v->time));
	               }
	               
	               header('Access-Control-Allow-Origin: *');
	               echo json_encode(array('success'=>1, 'mobile'=>$mobile,'otp'=>$otp,"email"=>$email, "subject"=>$subject, "days"=>$days, "time"=>$time1, "language"=>$language));


	           }

	    }
	}


	//Save Mentor Data
	public function saveMentor(){

		//{ mentorPhone: mentorPhone, mentorEmail: mentorEmail, mentorName: mentorName, mentorDOB: mentorDOB, mentorGender: mentorGender, mentorAddress: mentorAddress, mentorPin: mentorPin, mentorAbout: mentorAbout, mentorSchool: mentorSchool, mentorAchievment: mentorAchievment, mentorSubject1: mentorSubject1, mentorSubject2: mentorSubject2, mentorSubject3: mentorSubject3, mentorSubject4: mentorSubject4, mentorDay: mentorDay, mentorTime: mentorTime, mentorLanguage: mentorLanguage}

		if($this->input->post('mentorName')!='')
		{
			$name                 = $this->input->post('mentorName');
		    $dob                  = $this->input->post('mentorDOB');
		    $gender               = $this->input->post('mentorGender');
		    $email                = $this->input->post('mentorEmail');
		    $mobile               = $this->input->post('mentorPhone');
		    $address              = $this->input->post('mentorAddress');
		    $pin                  = $this->input->post('mentorPin');
		    $school               = $this->input->post('mentorSchool');
		    $about                = $this->input->post('mentorAbout');
		    $achievement          = $this->input->post('mentorAchievment');

		    $preferred_day        = $this->input->post('mentorDay');
		    $preferred_time       = $this->input->post('mentorTime');
		    $language             = $this->input->post('mentorLanguage');

		    $mentor_qualification = $this->input->post('mentorQualification');
		    $mentor_experience    = $this->input->post('mentorExperience');
		    //$mentor_fee           = $this->input->post('mMentorFee');

		    
			$students_array = array("mentor_name"=>$name,
								   "mentor_dob"=>$dob,
								   "mentor_gender"=>$gender,
								   "mentor_email"=>$email,
								   "mentor_mobile"=>$mobile,
								   "mentor_address"=>$address,
								   "mentor_pin"=>$pin,
								   "associated_school"=>$school,
								   "about" => $about,
								   "achievements" => $achievement,
								   "mentor_preferred_day"=>$preferred_day,
								   "mentor_preferred_time"=>$preferred_time,
								   "mentor_language"=>$language,
								   "mentor_qualification"=>$mentor_qualification,
								   "mentor_experience"=>$mentor_experience,
								   "status"=>1,
								   "created_date"=>date('Y-m-d'),
								   "created_time"=>date('H:i:s')
								   );

			$mentor_id = $this->common_model->addRecord('tb_mentors',$students_array);


			if($mentor_id!=''){

				$subject1 = $this->input->post('mentorSubject1');
				$subject2 = $this->input->post('mentorSubject2');
				$subject3 = $this->input->post('mentorSubject3');
				$subject4 = $this->input->post('mentorSubject4');


				if(!empty($subject1))
				{
					$subject_array1 = array("mentor_id"=>$mentor_id,
				                           "subject_id"=>$subject1,
				                           "created_date"=>date('Y-m-d'),
									       "created_time"=>date('H:i:s')
									      );

					$this->common_model->addRecord('tb_mentors_subject',$subject_array1);
				}

				if(!empty($subject2))
				{
					$subject_array2 = array("mentor_id"=>$mentor_id,
				                           "subject_id"=>$subject2,
				                           "created_date"=>date('Y-m-d'),
									       "created_time"=>date('H:i:s')
									      );

					$this->common_model->addRecord('tb_mentors_subject',$subject_array2);
				}


				if(!empty($subject3))
				{
					$subject_array3 = array("mentor_id"=>$mentor_id,
				                           "subject_id"=>$subject3,
				                           "created_date"=>date('Y-m-d'),
									       "created_time"=>date('H:i:s')
									      );

					$this->common_model->addRecord('tb_mentors_subject',$subject_array3);
				}

				if(!empty($subject4))
				{
					$subject_array4 = array("mentor_id"=>$mentor_id,
				                           "subject_id"=>$subject4,
				                           "created_date"=>date('Y-m-d'),
									       "created_time"=>date('H:i:s')
									      );

					$this->common_model->addRecord('tb_mentors_subject',$subject_array4);
				}

		
			header('Access-Control-Allow-Origin: *');
	        echo json_encode(array('success'=>1));
		}





			
		}

			

	}


	//all type user login
   public function login()
   {

   	/*
   		Timeline data will be sent
   	*/
   	if($this->input->post('mobile')!='')
   	{
   		$mobile = $this->input->post('mobile');

   		$numRows = $this->db->query("SELECT * FROM tb_students WHERE mobile='".$mobile."'")->num_rows();
		$numRowsG = $this->db->query("SELECT * FROM tb_guardian WHERE guardian_mobile='".$mobile."'")->num_rows();
		$numRowsM = $this->db->query("SELECT * FROM tb_mentors WHERE mentor_mobile='".$mobile."'")->num_rows();

		if($numRows>0 || $numRowsG>0 || $numRowsM>0)
		{
		    if($numRows>0)
		    {
				$temp = 'S';
				$userDetails = $this->db->query("SELECT * FROM tb_students WHERE mobile='".$mobile."'")->result();
				$subDetails = $this->db->query("SELECT a.*,b.subject FROM tb_students_subject a
											    INNER JOIN tb_subject b ON a.subject_id=b.subject_id
											    WHERE a.student_id=".$userDetails[0]->student_id)->result();
		    }

		    if($numRowsG>0)
		    {
		    	$temp = 'G';
		    	$userDetails = $this->db->query("SELECT * FROM tb_guardian WHERE guardian_mobile='".$mobile."'")->result();
		    	$subDetails = array();
		    }

		    if($numRowsM>0)
		    {
		    	$temp = 'M';
		    	$userDetails = $this->db->query("SELECT * FROM tb_mentors WHERE mentor_mobile='".$mobile."'")->result();
		    	$subDetails = $this->db->query("SELECT a.*,b.subject FROM tb_mentors_subject a
											    INNER JOIN tb_subject b ON a.subject_id=b.subject_id
											    WHERE a.mentor_id=".$userDetails[0]->mentor_id)->result();
		    	//$subDetails = array();
		    	
		    }

		    $otp = rand(1000,9999);

            $base_url="https://sms.infoskysolutions.com/API/WebSMS/Http/v2.3.6/api.php?";
            $post_fields="username=BEBONGT&api_key=c6a5991b36e64e09a1845f818cac2eb2&sender=BeBong&to=".$mobile."&message=Hello, Your Order ".$otp." has been placed successfully. Be Bong Store.";
             // $this->send_sms($base_url,$post_fields);

	        header('Access-Control-Allow-Origin: *');
            echo json_encode(array('success'=>1, 'mobile'=>$mobile,'otp'=>$otp,"utype"=>$temp,"userDetails"=>$userDetails,"subDetails"=>$subDetails));




		}
		else
		{
			echo json_encode(array('success'=>0));
		}
   	}
		
   }


   //user details sent
   public function getUserData()
   {
	   	if($this->input->post('mobile')!='')
	   	{
	   		$mobile = $this->input->post('mobile');

	   		$numRows = $this->db->query("SELECT * FROM tb_students WHERE mobile='".$mobile."'")->num_rows();
			$numRowsG = $this->db->query("SELECT * FROM tb_guardian WHERE guardian_mobile='".$mobile."'")->num_rows();
			$numRowsM = $this->db->query("SELECT * FROM tb_mentors WHERE mentor_mobile='".$mobile."'")->num_rows();

			if($numRows>0 || $numRowsG>0 || $numRowsM>0)
			{
			    if($numRows>0)
			    {
					$temp = 'S';
					$userDetails = $this->db->query("SELECT * FROM tb_students WHERE mobile='".$mobile."'")->result();
					$subDetails = $this->db->query("SELECT a.*,b.subject FROM tb_students_subject a
												    INNER JOIN tb_subject b ON a.subject_id=b.subject_id
												    WHERE a.student_id=".$userDetails[0]->student_id)->result();
			    }

			    if($numRowsG>0)
			    {
			    	$temp = 'G';
			    	$userDetails = $this->db->query("SELECT * FROM tb_guardian WHERE guardian_mobile='".$mobile."'")->result();
			    	$subDetails = array();
			    }

			    if($numRowsM>0)
			    {
			    	$temp = 'M';
			    	$userDetails = $this->db->query("SELECT * FROM tb_mentors WHERE mentor_mobile='".$mobile."'")->result();
			    	$subDetails = $this->db->query("SELECT a.*,b.subject FROM tb_mentors_subject a
												    INNER JOIN tb_subject b ON a.subject_id=b.subject_id
												    WHERE a.mentor_id=".$userDetails[0]->mentor_id)->result();
			    	//$subDetails = array();
			    	
			    }

			   

		        header('Access-Control-Allow-Origin: *');
	            echo json_encode(array('success'=>1, 'mobile'=>$mobile,"utype"=>$temp,"userDetails"=>$userDetails,"subDetails"=>$subDetails));




			}
			else
			{
				echo json_encode(array('success'=>0));
			}
	   	}
		
   }




	//sent post by user id
	public function getPosts()
	{
		if($this->input->post('userId')!='')
		{
			$userId = $this->input->post('userId');
			$userType = $this->input->post('userType');

			$result = $this->db->query("SELECT * FROM tb_posts a
					LEFT JOIN tb_post_comments b ON a.post_id=b.post_id
					LEFT JOIN tb_post_save c ON a.post_id=c.post_id
					LEFT JOIN tb_post_view d ON a.post_id=b.post_id
				    WHERE a.user_id=".$userId." AND a.user_type=".$userType)->result();

			if(count($result)>0)
			{
				echo json_encode(array('success'=>1,"allpost"=>$result));
			}
			else
			{
				echo json_encode(array('success'=>0));
			}
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
        curl_close ($ch);
    }


    public function sendemail($to,$rand)
    {
        //SMTP & mail configuration
        $config = array(
                'protocol'  => 'smtp',
                'smtp_host' => 'mail.guru-siksha.com',
                'smtp_port' => 2525,
                'smtp_user' => 'no-reply@guru-siksha.com',
                'smtp_pass' => '=Dq}W!jNl{,{',
                'mailtype'  => 'html',
                'charset'   => 'utf-8'

        );

        $this->email->initialize($config);
        $this->email->set_mailtype("html");
        $this->email->set_newline("\r\n");

        //Email content

        $htmlContent = '<h3>Please Use The Following Code</h3>';
        $htmlContent.= '<h3>Verification Code: '.$rand.'</h3>';
        //$htmlContent.= '<a href="'.base_url().'authentication/verification/'.$adminId.'">click here</a>';

        $this->email->to($to);
        $this->email->from('no-reply@guru-siksha.com', 'GURUSIKSHA');
        $this->email->subject('Verification Code');
        $this->email->message($htmlContent);
        //Send email
        $this->email->send();
        return 1;

   }


   



   




   public function sendemailTest()
    {
        $rand = '1111';
        //SMTP & mail configuration
        $config = array(
                'protocol'  => 'smtp',
                'smtp_host' => 'mail.guru-siksha.com',
                'smtp_port' => 2525,
                'smtp_user' => 'no-reply@guru-siksha.com',
                'smtp_pass' => '=Dq}W!jNl{,{',
                'mailtype'  => 'html',
                'charset'   => 'utf-8'

        );

        $this->email->initialize($config);
        $this->email->set_mailtype("html");
        $this->email->set_newline("\r\n");

        //Email content

        $htmlContent = '<h3>Please Use The Following Code</h3>';
        $htmlContent.= '<h3>Verification Code: '.$rand.'</h3>';
        //$htmlContent.= '<a href="'.base_url().'authentication/verification/'.$adminId.'">click here</a>';

        $this->email->to("suporna.projukti@gmail.com");
        $this->email->from('no-reply@guru-siksha.com', 'GURUSIKSHA');
        $this->email->subject('Verification Code');
        $this->email->message($htmlContent);
        //Send email
        $this->email->send();
        return 1;

   }


	
}
