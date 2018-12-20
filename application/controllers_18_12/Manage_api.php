<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Manage_api extends CI_Controller
{

	public function __construct()
	{

		parent::__construct();
		$this->load->helper(array('url', 'form', 'html', 'text'));
		$this->load->library(array('session', 'form_validation', 'email'));
		$this->load->model(array('common_model'));
		date_default_timezone_set('Asia/Kolkata');


	}

    //Mobile verification Student
	public function mobileVerification()
	{

		if ($this->input->post('studentPhone') != '') 
		{
			$email = $this->input->post('studentemail');
			$mobile = $this->input->post('studentPhone');

			$numRows = $this->db->query("SELECT * FROM tb_students WHERE email='" . $email . "' OR mobile='" . $mobile . "'")->num_rows();
			$numRowsG = $this->db->query("SELECT * FROM tb_guardian WHERE guardian_email='" . $email . "' OR guardian_mobile='" . $mobile . "'")->num_rows();

			$numRowsM = $this->db->query("SELECT * FROM tb_mentors WHERE mentor_email='" . $email . "' OR mentor_mobile='" . $mobile . "'")->num_rows();

			if ($numRows > 0 || $numRowsG > 0 || $numRowsM > 0) {
				echo json_encode(array('success' => 0));
			} else {

				$otp = rand(1000, 9999);
				// http://msg.infoskysolutions.com/API/WebSMS/Http/v2.3.6/api.php?username=PRAEDUOTP&api_key=20c35cf0419566416a8391352286f10d&sender=my+senderID&to=my+recipient&message=Hello+Test+Message 
				$base_url = "http://msg.infoskysolutions.com/API/WebSMS/Http/v2.3.6/api.php?";
				$post_fields = "username=PRAEDUOTP&api_key=20c35cf0419566416a8391352286f10d&sender=GURUSK&to=".$mobile."&message=Your OTP for login to Gurusiksha App ".$otp." . Do not share with anyone.";
				$this->send_sms($base_url, $post_fields);



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
					$time1[] = date('h:i A', strtotime($v->time));
				}

				header('Access-Control-Allow-Origin: *');
				echo json_encode(array('success' => 1, 'mobile' => $mobile, 'otp' => $otp, "email" => $email, "class" => $class, "subject" => $subject, "days" => $days, "time" => $time1, "language" => $language));

			}

		}

	}

	//Save student data
	public function saveStudent()
	{

		

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


		$students_array = array(
			"name" => $name,
			"dob" => $dob,
			"gender" => $gender,
			"email" => $email,
			"mobile" => $mobile,
			"address" => $address,
			"pin" => $pin,
			"school" => $school,
			"class" => $class,
			"board_name" => $board_name,
			"preferred_day" => $preferred_day,
			"preferred_time" => $preferred_time,
			"language" => $language,
			"guardian_name" => $guardian_name,
			"guardian_phone" => $guardian_phone,
			"status" => 1,
			"created_date" => date('Y-m-d'),
			"created_time" => date('H:i:s')
		);

		$student_id = $this->common_model->addRecord('tb_students', $students_array);


		if ($student_id != '') {

			$subject1 = $this->input->post('studentSubject1');
			$subject2 = $this->input->post('studentSubject2');
			$subject3 = $this->input->post('studentSubject3');
			$subject4 = $this->input->post('studentSubject4');


			if (!empty($subject1)) {
				$subject_array1 = array(
					"student_id" => $student_id,
					"subject_id" => $subject1,
					"created_date" => date('Y-m-d'),
					"created_time" => date('H:i:s')
				);

				$this->common_model->addRecord('tb_students_subject', $subject_array1);
			}

			if (!empty($subject2)) {
				$subject_array2 = array(
					"student_id" => $student_id,
					"subject_id" => $subject2,
					"created_date" => date('Y-m-d'),
					"created_time" => date('H:i:s')
				);

				$this->common_model->addRecord('tb_students_subject', $subject_array2);
			}


			if (!empty($subject3)) {
				$subject_array3 = array(
					"student_id" => $student_id,
					"subject_id" => $subject3,
					"created_date" => date('Y-m-d'),
					"created_time" => date('H:i:s')
				);

				$this->common_model->addRecord('tb_students_subject', $subject_array3);
			}

			if (!empty($subject4)) {
				$subject_array4 = array(
					"student_id" => $student_id,
					"subject_id" => $subject4,
					"created_date" => date('Y-m-d'),
					"created_time" => date('H:i:s')
				);

				$this->common_model->addRecord('tb_students_subject', $subject_array4);
			}


			header('Access-Control-Allow-Origin: *');
			echo json_encode(array('success' => 1, 'last_id'=> $student_id));
		}

	}


	//Mobile verification Guardian
	public function mobileVerificationG()
	{
		//{ gPhone: gPhone, gEmail: gEmail}
		if ($this->input->post('gPhone') != '') {
			$email = $this->input->post('gEmail');
			$mobile = $this->input->post('gPhone');


	           // $numRows = $this->db->query("SELECT * FROM tb_guardian WHERE guardian_email='".$email."' OR guardian_mobile='".$mobile."'")->num_rows();
	           // if($numRows>0)
	           // { }

			$numRows = $this->db->query("SELECT * FROM tb_students WHERE email='" . $email . "' OR mobile='" . $mobile . "'")->num_rows();
			$numRowsG = $this->db->query("SELECT * FROM tb_guardian WHERE guardian_email='" . $email . "' OR guardian_mobile='" . $mobile . "'")->num_rows();

			$numRowsM = $this->db->query("SELECT * FROM tb_mentors WHERE mentor_email='" . $email . "' OR mentor_mobile='" . $mobile . "'")->num_rows();

			if ($numRows > 0 || $numRowsG > 0 || $numRowsM > 0) {
				echo json_encode(array('success' => 0));
			} else {
				$otp = rand(1000, 9999);

				$base_url = "http://msg.infoskysolutions.com/API/WebSMS/Http/v2.3.6/api.php?";
				$post_fields = "username=PRAEDUOTP&api_key=20c35cf0419566416a8391352286f10d&sender=GURUSK&to=".$mobile."&message=Your OTP for login to Gurusiksha App ".$otp." . Do not share with anyone.";

				// $base_url = "https://sms.infoskysolutions.com/API/WebSMS/Http/v2.3.6/api.php?";
				// $post_fields = "username=BEBONGT&api_key=c6a5991b36e64e09a1845f818cac2eb2&sender=BeBong&to=" . $mobile . "&message=Hello, Your Order " . $otp . " has been placed successfully. Be Bong Store.";
				$this->send_sms($base_url, $post_fields);

				header('Access-Control-Allow-Origin: *');
				echo json_encode(array('success' => 1, 'mobile' => $mobile, 'otp' => $otp));

			}

		}
	}


	public function saveGuardian()
	{

			//{ gName: gName, gPhone: gPhone, gEmail: gEmail, gAddress: gAddress, gRelation: gRelation, gGender: gGender}

		if ($this->input->post('gName') != '') {
			$name = $this->input->post('gName');
			$gender = $this->input->post('gGender');
			$email = $this->input->post('gEmail');
			$mobile = $this->input->post('gPhone');
			$address = $this->input->post('gAddress');
			$pin = $this->input->post('gPin');
			$rel_with_stud = $this->input->post('gRelation');


			$guardian_array = array(
				"guardian_name" => $name,
				"guardian_gender" => $gender,
				"guardian_email" => $email,
				"guardian_mobile" => $mobile,
				"guardian_address" => $address,
				"guardian_pin" => $pin,
				"rel_with_stud" => $rel_with_stud,
				"status" => 1,
				"created_date" => date('Y-m-d'),
				"created_time" => date('H:i:s')
			);

			$guardian_id = $this->common_model->addRecord('tb_guardian', $guardian_array);

			if ($guardian_id != '') {
				header('Access-Control-Allow-Origin: *');
				echo json_encode(array('success' => 1, 'last_id' => $guardian_id));
			}
		}
	}




	//Mobile verification Mentor
	public function mobileVerificationM()
	{
		//{ gPhone: gPhone, gEmail: gEmail}
		if ($this->input->post('mentorPhone') != '') {
			$email = $this->input->post('mentoremail');
			$mobile = $this->input->post('mentorPhone');


	           // $numRows = $this->db->query("SELECT * FROM tb_mentors WHERE mentor_email='".$email."' OR mentor_mobile='".$mobile."'")->num_rows();
	           // if($numRows>0)
	           // {}
			$numRows = $this->db->query("SELECT * FROM tb_students WHERE email='" . $email . "' OR mobile='" . $mobile . "'")->num_rows();
			$numRowsG = $this->db->query("SELECT * FROM tb_guardian WHERE guardian_email='" . $email . "' OR guardian_mobile='" . $mobile . "'")->num_rows();

			$numRowsM = $this->db->query("SELECT * FROM tb_mentors WHERE mentor_email='" . $email . "' OR mentor_mobile='" . $mobile . "'")->num_rows();

			if ($numRows > 0 || $numRowsG > 0 || $numRowsM > 0) {
				echo json_encode(array('success' => 0));
			} else {
				$otp = rand(1000, 9999);

				$base_url = "http://msg.infoskysolutions.com/API/WebSMS/Http/v2.3.6/api.php?";
				$post_fields = "username=PRAEDUOTP&api_key=20c35cf0419566416a8391352286f10d&sender=GURUSK&to=".$mobile."&message=Your OTP for login to Gurusiksha App ".$otp." . Do not share with anyone.";

				// $base_url = "https://sms.infoskysolutions.com/API/WebSMS/Http/v2.3.6/api.php?";
				// $post_fields = "username=BEBONGT&api_key=c6a5991b36e64e09a1845f818cac2eb2&sender=BeBong&to=" . $mobile . "&message=Hello, Your Order " . $otp . " has been placed successfully. Be Bong Store.";
				$this->send_sms($base_url, $post_fields);



				$subject = $this->db->query("SELECT * FROM tb_subject ORDER BY subject ASC ")->result();
				$days = $this->db->query("SELECT * FROM tb_teaching_days ORDER BY day_id ASC ")->result();
				$time = $this->db->query("SELECT * FROM tb_teaching_time ORDER BY time_id ASC ")->result();
				$language = $this->db->query("SELECT * FROM tb_language ORDER BY language_name ASC ")->result();

				$time1 = array();
				foreach ($time as $v) {
					$time1[] = date('h:i A', strtotime($v->time));
				}

				header('Access-Control-Allow-Origin: *');
				echo json_encode(array('success' => 1, 'mobile' => $mobile, 'otp' => $otp, "email" => $email, "subject" => $subject, "days" => $days, "time" => $time1, "language" => $language));


			}

		}
	}


	//Save Mentor Data
	public function saveMentor()
	{

		//{ mentorPhone: mentorPhone, mentorEmail: mentorEmail, mentorName: mentorName, mentorDOB: mentorDOB, mentorGender: mentorGender, mentorAddress: mentorAddress, mentorPin: mentorPin, mentorAbout: mentorAbout, mentorSchool: mentorSchool, mentorAchievment: mentorAchievment, mentorSubject1: mentorSubject1, mentorSubject2: mentorSubject2, mentorSubject3: mentorSubject3, mentorSubject4: mentorSubject4, mentorDay: mentorDay, mentorTime: mentorTime, mentorLanguage: mentorLanguage}

		if ($this->input->post('mentorName') != '') {
			$name = $this->input->post('mentorName');
			$dob = $this->input->post('mentorDOB');
			$gender = $this->input->post('mentorGender');
			$email = $this->input->post('mentorEmail');
			$mobile = $this->input->post('mentorPhone');
			$address = $this->input->post('mentorAddress');
			$pin = $this->input->post('mentorPin');
			$school = $this->input->post('mentorSchool');
			$about = $this->input->post('mentorAbout');
			$achievement = $this->input->post('mentorAchievment');

		    /*$preferred_day      = $this->input->post('mentorDay');
		    $preferred_time       = $this->input->post('mentorTime');*/

			$language = $this->input->post('mentorLanguage');

			$mentor_qualification = $this->input->post('mentorQualification');
			$mentor_experience = $this->input->post('mentorExperience');
		    //$mentor_fee           = $this->input->post('mMentorFee');


			$students_array = array(
				"mentor_name" => $name,
				"mentor_dob" => $dob,
				"mentor_gender" => $gender,
				"mentor_email" => $email,
				"mentor_mobile" => $mobile,
				"mentor_address" => $address,
				"mentor_pin" => $pin,
				"associated_school" => $school,
				"about" => $about,
				"achievements" => $achievement,
				"mentor_language" => $language,
				"mentor_qualification" => $mentor_qualification,
				"mentor_experience" => $mentor_experience,
				"status" => 1,
				"created_date" => date('Y-m-d'),
				"created_time" => date('H:i:s')
			);

			$mentor_id = $this->common_model->addRecord('tb_mentors', $students_array);


			if ($mentor_id != '') {

				$subject1 = $this->input->post('mentorSubject1');
				$subject2 = $this->input->post('mentorSubject2');
				$subject3 = $this->input->post('mentorSubject3');

				if (!empty($subject1)) {
					$subject_array1 = array(
						"mentor_id" => $mentor_id,
						"subject_id" => $subject1,
						"created_date" => date('Y-m-d'),
						"created_time" => date('H:i:s')
					);

					$this->common_model->addRecord('tb_mentors_subject', $subject_array1);
				}

				if (!empty($subject2)) {
					$subject_array2 = array(
						"mentor_id" => $mentor_id,
						"subject_id" => $subject2,
						"created_date" => date('Y-m-d'),
						"created_time" => date('H:i:s')
					);

					$this->common_model->addRecord('tb_mentors_subject', $subject_array2);
				}


				if (!empty($subject3)) {
					$subject_array3 = array(
						"mentor_id" => $mentor_id,
						"subject_id" => $subject3,
						"created_date" => date('Y-m-d'),
						"created_time" => date('H:i:s')
					);

					$this->common_model->addRecord('tb_mentors_subject', $subject_array3);
				}



				header('Access-Control-Allow-Origin: *');
				echo json_encode(array('success' => 1,'last_id' => $mentor_id));
			}






		}



	}
	
	
	
	
	//Edit Mentor Data
	public function updateMentorProfile()
	{
		
		

		if ($this->input->post('name') != '') {

			$name = $this->input->post('name');
			$dob = $this->input->post('dob');
			$address = $this->input->post('address');
			$qualification = $this->input->post('qualification');
			$pin = $this->input->post('pin');
			$experience = $this->input->post('experience');

			$userId = $this->input->post('userId');

			$array = array(
				"mentor_name" => $name,
				"mentor_dob" => $dob,
				"mentor_address" => $address,
				"mentor_qualification" => $qualification,
				"mentor_pin" => $pin,
				"mentor_experience" => $experience,
				"updated_date" => date('Y-m-d'),
				"updated_time" => date('H:i:s')
			);

			//$mentor_id = $this->common_model->addRecord('tb_mentors',$array);
			$this->common_model->Update_Record($array, "tb_mentors", $userId, "mentor_id");


			header('Access-Control-Allow-Origin: *');
			echo json_encode(array('success' => 1));


		}



	}


	public function apply_image()
	{

		$userId = $this->input->post('userId');
		$userType = $this->input->post('userType');
		$image = $this->input->post('image');
		$this->load->helper("url");


		list($type, $image) = explode(';', $image);
		list(, $image) = explode(',', $image);
		$image = base64_decode($image);

		$tm = time();

		if ($userType == 'S') {
			$res = $this->db->query("SELECT * FROM tb_students WHERE student_id=" . $userId)->row();
			unlink("uploads/student/" . $res->photo);

			file_put_contents($_SERVER['DOCUMENT_ROOT'] . '/uploads/student/' . $user . $tm . '.png', $image);
			$image = $user . $tm . '.png';

			$array = array("photo" => $image);
			$this->common_model->Update_Record($array, "tb_students", $userId, "student_id");
		}
		if ($userType == 'G') {
			$res = $this->db->query("SELECT * FROM tb_guardian WHERE guardian_id=" . $userId)->row();
			unlink("uploads/guardian/" . $res->photo);

			file_put_contents($_SERVER['DOCUMENT_ROOT'] . '/uploads/guardian/' . $user . $tm . '.png', $image);
			$image = $user . $tm . '.png';

			$array = array("photo" => $image);
			$this->common_model->Update_Record($array, "tb_guardian", $userId, "guardian_id");

		}
		if ($userType == 'M') {
			$res = $this->db->query("SELECT * FROM tb_mentors WHERE mentor_id=" . $userId)->row();
			unlink("uploads/mentor/" . $res->photo);

			file_put_contents($_SERVER['DOCUMENT_ROOT'] . '/uploads/mentor/' . $user . $tm . '.png', $image);
			$image = $user . $tm . '.png';

			$array = array("photo" => $image);
			$this->common_model->Update_Record($array, "tb_mentors", $userId, "mentor_id");

		}

		$return_json = array('status' => 1, 'img' => $image);
		header('Access-Control-Allow-Origin: *');
		echo json_encode($return_json);
	}

public function postAssignment()
	{

		$userId = $this->input->post('studentId');
		$mentor = $this->input->post('userId');
		$subject = $this->input->post('subjectId');
		$image = $this->input->post('image');
		$this->load->helper("url");


		list($type, $image) = explode(';', $image);
		list(, $image) = explode(',', $image);
		$image = base64_decode($image);

		$tm = time();

		

			
			$acount = count($userId);
			for($i=0;$i<$acount;$i++){
			file_put_contents($_SERVER['DOCUMENT_ROOT'].'/uploads/'.'M'.$tm.'.jpeg', $image);
			$image = 'M'.$tm.'.jpeg';
			$object = array(
			'student_id' => $userId[$i],
			'mentor_id' => $mentor,
			'sub_id' => $subject,
			'post_image' => $image,
			'created_date' => date('l'),
			'created_time' => date('H:i'),
			'post_status' => 1
		);
			
		$res = $this->db->insert('tb_assignments', $object);
	}
		
		if($res){
		$return_json = array('status' => 1);
		} else{
		$return_json = array('status' => 0);	
		}
		header('Access-Control-Allow-Origin: *');
		echo json_encode($return_json);

			
		
}		

	public function getMentorAssignment(){
		$mentor = $this->input->post('userId');
		$userDetails = $this->db->query("SELECT * FROM tb_assignments WHERE mentor_id='" . $mentor . "'")->result();
		if($userDetails){
		$return_json = array('status' => 1, 'details' =>$userDetails);
		} else{
		$return_json = array('status' => 0);	
		}
		header('Access-Control-Allow-Origin: *');
		echo json_encode($return_json);
	}
	public function getStudentAssignment(){
		$mentor = $this->input->post('userId');
		$userDetails = $this->db->query("SELECT a.*,b.mentor_name FROM tb_assignments AS a JOIN tb_mentors AS b ON a.mentor_id=b.mentor_id WHERE a.student_id='" . $mentor . "'")->result();
		if($userDetails){
		$return_json = array('status' => 1, 'details' =>$userDetails);
		} else{
		$return_json = array('status' => 0);	
		}
		header('Access-Control-Allow-Origin: *');
		echo json_encode($return_json);
	}
	//all type user login
	public function login()
	{

   	/*
   		Timeline data will be sent
		 */
		if ($this->input->post('mobile') != '') {
			$mobile = $this->input->post('mobile');

			$numRows = $this->db->query("SELECT * FROM tb_students WHERE mobile='" . $mobile . "'")->num_rows();
			$numRowsG = $this->db->query("SELECT * FROM tb_guardian WHERE guardian_mobile='" . $mobile . "'")->num_rows();
			$numRowsM = $this->db->query("SELECT * FROM tb_mentors WHERE mentor_mobile='" . $mobile . "'")->num_rows();

			if ($numRows > 0 || $numRowsG > 0 || $numRowsM > 0) {
				if ($numRows > 0) {
					$temp = 'S';
					$userDetails = $this->db->query("SELECT * FROM tb_students WHERE mobile='" . $mobile . "'")->result();
					$subDetails = $this->db->query("SELECT a.*,b.subject FROM tb_students_subject a
													INNER JOIN tb_subject b ON a.subject_id=b.subject_id
													WHERE a.student_id=" . $userDetails[0]->student_id)->result();
				}

				if ($numRowsG > 0) {
					$temp = 'G';
					$userDetails = $this->db->query("SELECT * FROM tb_guardian WHERE guardian_mobile='" . $mobile . "'")->result();
					$subDetails = array();
				}

				if ($numRowsM > 0) {
					$temp = 'M';
					$userDetails = $this->db->query("SELECT * FROM tb_mentors WHERE mentor_mobile='" . $mobile . "'")->result();
					$subDetails = $this->db->query("SELECT a.*,b.subject FROM tb_mentors_subject a
													INNER JOIN tb_subject b ON a.subject_id=b.subject_id
													WHERE a.mentor_id=" . $userDetails[0]->mentor_id)->result();
					//$subDetails = array();

				}

				$otp = rand(1000, 9999);

				$base_url = "http://msg.infoskysolutions.com/API/WebSMS/Http/v2.3.6/api.php?";
				$post_fields = "username=PRAEDUOTP&api_key=20c35cf0419566416a8391352286f10d&sender=GURUSK&to=".$mobile."&message=Your OTP for login to Gurusiksha App ".$otp." . Do not share with anyone.";
				//echo $base_url.$post_fields;die;
				$this->send_sms($base_url,$post_fields);
				// $base_url = "https://sms.infoskysolutions.com/API/WebSMS/Http/v2.3.6/api.php?";
				// $post_fields = "username=BEBONGT&api_key=c6a5991b36e64e09a1845f818cac2eb2&sender=BeBong&to=" . $mobile . "&message=Hello, Your Order " . $otp . " has been placed successfully. Be Bong Store.";
				 // $this->send_sms($base_url,$post_fields);

				header('Access-Control-Allow-Origin: *');
				echo json_encode(array('success' => 1, 'mobile' => $mobile, 'otp' => $otp, "utype" => $temp, "userDetails" => $userDetails, "subDetails" => $subDetails));




			} else {
				echo json_encode(array('success' => 0));
			}
		}

	}


	public function mentorsSubjectDayTime()
	{

		$userId = $this->input->post('userId');
		$subjects = $this->db->query("SELECT a.*,b.subject FROM tb_mentors_subject a INNER JOIN tb_subject b ON a.subject_id=b.subject_id  WHERE a.mentor_id=" . $userId)->result();
		$days = $this->db->query("SELECT * FROM tb_teaching_days ORDER BY day_id ASC")->result();
		$times = $this->db->query("SELECT TIME_FORMAT(time,'%H:%i:%p') as timee, time_id FROM tb_teaching_time ORDER BY time_id ASC")->result();

		$classSchedule = $this->db->query("SELECT a.*,b.day,d.subject, TIME_FORMAT(c.time,'%H:%i:%p') as time FROM tb_mentor_tech_time a 
										  INNER JOIN tb_teaching_days b ON a.pf_day_id=b.day_id
										  INNER JOIN tb_teaching_time c ON a.pf_time_id=c.time_id
										  INNER JOIN tb_subject d ON a.subject_id=d.subject_id
										  WHERE a.user_id=" . $userId . " ORDER BY b.day_id ASC")->result();


		header('Access-Control-Allow-Origin: *');
		echo json_encode(array('success' => 1, 'subjects' => $subjects, "days" => $days, "times" => $times, "classSchedule" => $classSchedule));
	}
	public function getMentorStudentBySubjectId(){
		$subId = $this->input->post('subject');
		$userId = $this->input->post('userId');
		$students = $this->db->query("SELECT a.*,b.* FROM tb_current_course a INNER JOIN tb_students b ON a.user_id=b.student_id  WHERE a.mentor=".$userId." AND a.subject=".$subId)->result();
		header('Access-Control-Allow-Origin: *');
		if($students){
		echo json_encode(array('success' => 1, 'students' => $students));
		}else{
			echo json_encode(array('success' => 1));
		}
	}


	public function mentorsSubjectDayTimeUpdate()
	{

		$array = array(
			"user_id" => $this->input->post('userId'),
			"subject_id" => $this->input->post('subject'),
			"pf_day_id" => $this->input->post('day'),
			"pf_time_id" => $this->input->post('time'),
			"created_date" => date('Y-m-d'),
			"created_time" => date('H:i:s')
		);

		$last_id = $this->common_model->addRecord('tb_mentor_tech_time', $array);

		if ($last_id != '') {

			header('Access-Control-Allow-Origin: *');
			echo json_encode(array('success' => 1));
		}




	}

	public function SavedPost()
	{
		
		$user_id = $this->input->post('userId');
		$user_type = $this->input->post('userType');
		
		$matchpost = $this->db->query('SELECT * FROM tb_post_save WHERE user_id='.$user_id.' AND user_type="'.$user_type.'"')->num_rows();
		if($matchpost > 0){
			$savedtl = $this->db->query('SELECT * FROM tb_post_save WHERE user_id='.$user_id.' AND user_type="'.$user_type.'"')->result();
		
		$postViewSave = array();
		foreach ($savedtl as $sdtl ) {
			$postUser = $this->db->query('SELECT * FROM tb_posts WHERE post_id='.$sdtl->post_id)->result();
			$postView = $this->db->query('SELECT * FROM tb_post_view WHERE post_id='.$sdtl->post_id)->num_rows();
			$postComnt = $this->db->query('SELECT * FROM tb_post_comments WHERE post_id='.$sdtl->post_id)->num_rows();
			$utype = $postUser[0]->user_type;
				if($utype == 'S'){
					$table = 'tb_students';
					$uid = 'student_id';
				} else {
					$table = 'tb_mentors';
					$uid = 'mentor_id';
				}
			//echo 'SELECT * FROM '.$table.' WHERE '.$uid.'='.$postUser[0]->user_id;die;
			$postUserDtl = $this->db->query('SELECT * FROM '.$table.' WHERE '.$uid.'='.$postUser[0]->user_id)->result();
			$postViewSave[] = array("pdtl"=>$postUser, "post_user"=>$postUserDtl, "post_view" =>$postView, "post_cmnt" => $postComnt);
		}
		// print_r($postViewSave);die;
		
			header('Access-Control-Allow-Origin: *');
			echo json_encode(array('success' => 1, 'saveDtl' => $postViewSave));
}
	}

	public function PostLike()
	{
		$post_id = $this->input->post('postId');
		$user_id = $this->input->post('userId');
		$user_type = $this->input->post('userType');
		$matchpost = $this->db->query('SELECT * FROM tb_posts WHERE post_id='.$post_id.' AND user_id='.$user_id.' AND user_type="'.$user_type.'"')->num_rows();
		if($matchpost > 0){
			$upown = $this->db->query('UPDATE tb_posts SET is_own_liked=1 WHERE post_id='.$post_id);
		} 

		$array = array(
			"user_id" => $user_id,
			"post_id" => $post_id,
			"user_type" => $user_type,
			"created_date" => date('Y-m-d'),
			"created_time" => date('H:i:s')
		);

		$last_id = $this->common_model->addRecord('tb_post_save', $array);
		

		if ($last_id != '') {

			header('Access-Control-Allow-Origin: *');
			echo json_encode(array('success' => 1));
		}




	}

	public function PostdisLike()
	{
		$post_id = $this->input->post('postId');
		$user_id = $this->input->post('userId');
		$user_type = $this->input->post('userType');
		$matchpost = $this->db->query('SELECT * FROM tb_posts WHERE post_id='.$post_id.' AND user_id='.$user_id.' AND user_type="'.$user_type.'"')->num_rows();
		if($matchpost > 0){
			$upown = $this->db->query('UPDATE tb_posts SET is_own_liked=0 WHERE post_id='.$post_id);
		} 

		$delpost = $this->db->query('DELETE FROM tb_post_save WHERE post_id='.$post_id);
		

		if ($delpost) {

			header('Access-Control-Allow-Origin: *');
			echo json_encode(array('success' => 1));
		}




	}

	public function deletePost()
	{
		$post_id = $this->input->post('postId');
			$upown = $this->db->query('UPDATE tb_posts SET post_status=0 WHERE post_id='.$post_id);
		if ($upown) {
			header('Access-Control-Allow-Origin: *');
			echo json_encode(array('success' => 1));
		}
	}

	// public function reportPost()
	// {
	// 	$post_id = $this->input->post('postId');
	// 	$user_id = $this->input->post('userId');
	// 	$user_type = $this->input->post('userType');
	// 	$matchpost = $this->db->query('SELECT * FROM tb_posts WHERE post_id='.$post_id.' AND user_id='.$user_id.' AND user_type="'.$user_type.'"')->num_rows();
	// 	if($matchpost > 0){
	// 		$upown = $this->db->query('UPDATE tb_posts SET is_own_liked=0 WHERE post_id='.$post_id.' AND user_id='.$user_id.' AND user_type="'.$user_type.'"');
	// 	} 

	// 	$delpost = $this->db->query('DELETE FROM tb_post_save WHERE post_id='.$post_id.' AND user_id='.$user_id.' AND user_type="'.$user_type.'"');
		

	// 	if ($delpost) {

	// 		header('Access-Control-Allow-Origin: *');
	// 		echo json_encode(array('success' => 1));
	// 	}
	// }

public function reportPost()
	{
		$post_id = $this->input->post('postId');
		$user_id = $this->input->post('userId');
		$user_type = $this->input->post('userType');
	$array = array(
			"user_id" => $user_id,
			"post_id" => $post_id,
			"user_type" => $user_type,
			"created_date" => date('Y-m-d'),
			"created_time" => date('H:i:s')
		);

		$last_id = $this->common_model->addRecord('tb_post_report', $array);
		if($last_id){
		header('Access-Control-Allow-Origin: *');
		echo json_encode(array('success' => 1));
	}
}
public function studentDetails()
	{
		$user_id = $this->input->post('userId');
		$user_type = $this->input->post('userType');
		$student_dtl = $this->db->query('SELECT * FROM tb_students WHERE student_id='.$user_id)->result();
		$student_subjects = $this->db->query('SELECT * FROM tb_students_subject WHERE student_id='.$user_id)->result();
		$all_subject = $this->db->query('SELECT * FROM tb_subject')->result();
		$all_days = $this->db->query('SELECT * FROM tb_teaching_days')->result();
		$all_time = $this->db->query('SELECT * FROM tb_teaching_time')->result();

			header('Access-Control-Allow-Origin: *');
			echo json_encode(array('success' => 1,'studentDtl' => $student_dtl, 'studentSubjects' => $student_subjects, 'AllSubjects' => $all_subject , 'AllDays' => $all_days, 'AllTime' => $all_time));
		
	}

	public function studentUpdateDetails()
	{
		$name = $this->input->post('name');
		$dob = $this->input->post('dob');
		$address = $this->input->post('address');
		$pin = $this->input->post('pin');
		$school = $this->input->post('school');
		$board = $this->input->post('board');

		$userId = $this->input->post('userId');

		$student_dtl = $this->db->query('UPDATE tb_students SET name="'.$name.'",dob="'.$dob.'",address="'.$address.'",pin="'.$pin.'",school="'.$school.'",board_name="'.$board.'" WHERE student_id='.$userId);
		

			header('Access-Control-Allow-Origin: *');
			echo json_encode(array('success' => 1));
		
	}

	public function studentSubjects()
	{
		$user_id = $this->input->post('userId');
		$user_type = $this->input->post('userType');
		
		$student_subjects = $this->db->query('SELECT a.*,b.* FROM tb_students_subject AS a JOIN tb_subject AS b ON a.subject_id=b.subject_id WHERE a.student_id='.$user_id)->result();
		$all_subject = $this->db->query('SELECT * FROM tb_subject')->result();
		$all_days = $this->db->query('SELECT * FROM tb_teaching_days')->result();
		$all_time = $this->db->query('SELECT * FROM tb_teaching_time')->result();

			header('Access-Control-Allow-Origin: *');
			echo json_encode(array('success' => 1, 'studentSubjects' => $student_subjects, 'AllSubjects' => $all_subject , 'AllDays' => $all_days, 'AllTime' => $all_time));
		
	}

	public function searchMentor()
	{
		$subject = $this->input->post('subject');
		$day = $this->input->post('day');
		$fromtime = $this->input->post('fromtime');
		$totime = $this->input->post('totime');
		
		$mentorsProf = $this->db->query('SELECT a.*,b.* FROM tb_mentor_tech_time AS a JOIN tb_mentors AS b ON a.user_id=b.mentor_id WHERE a.subject_id='.$subject.' AND a.pf_day_id='.$day.' AND a.pf_time_id IN('.$fromtime.','.$totime.')')->num_rows();
		if($mentorsProf > 0){
		$mentors = $this->db->query('SELECT a.*,b.* FROM tb_mentor_tech_time AS a JOIN tb_mentors AS b ON a.user_id=b.mentor_id WHERE a.subject_id='.$subject.' AND a.pf_day_id='.$day.' AND a.pf_time_id IN('.$fromtime.','.$totime.')')->result();
		$mentsDtl = array();
		foreach ($mentors as $ments) {
			//echo 'SELECT * FROM tb_fees WHERE subject_id='.$subject.' AND mentor='.$ments->mentor_id;die;
			$fees = $this->db->query('SELECT * FROM tb_fees WHERE subject_id='.$subject.' AND mentor='.$ments->mentor_id)->row();
			$mentsDtl[] = array('mentorsDtl' =>$ments, 'mentorFee' => $fees->fee);
		}

		header('Access-Control-Allow-Origin: *');
			echo json_encode(array('success' => 1, 'mentorDetails' => $mentsDtl));
		}
		else{
			header('Access-Control-Allow-Origin: *');
			echo json_encode(array('success' => 0));
		}
			
		
	}

	public function selectMentor()
	{
		$subject = $this->input->post('subject');
		$day = $this->input->post('day');
		$time = $this->input->post('pfTimeId');
		$mentor = $this->input->post('mentorId');
		$userId = $this->input->post('userId');
		$mentorFee = $this->input->post('fee');
		$tuitionType = $this->input->post('tutionType');
		
		$array = array(
			"user_id" => $userId,
			"subject" => $subject,
			"time" => $time,
			"mentor" => $mentor,
			"day" => $day,
			"tuitype" => $tuitionType,
			"class_status" => 0,
			"created_date" => date('Y-m-d'),
			"created_time" => date('h:i:s')
		);

		$last_id = $this->common_model->addRecord('tb_current_course', $array);

		$oid = 'GSCM/'.date('Y/m/d').'/'.$last_id;
		$tran_no = substr(base_convert(sha1(uniqid(mt_rand())), 16, 36), 0, 10);
		$array = array(
			"ordid" => $oid,
			"transac_id" => $tran_no,
			"user_id" => $userId,
			"class_id" => $last_id,
			"subject" => $subject,
			"time" => $time,
			"mentor" => $mentor,
			"mentorFee" => $mentorFee,
			"pay_status" => 0,
			"tran_amt" => $mentorFee,
			"tran_no" => $tran_no,
			"created_date" => date('Y-m-d'),
			"created_time" => date('h:i:s')
		);

		$last_idsw = $this->common_model->addRecord('tb_transaction', $array);
		if($last_idsw){
			header('Access-Control-Allow-Origin: *');
			$eoid = base64_encode($oid);
			echo json_encode(array('success' => 1,'oid'=>$oid,'url'=>'http://www.guru-siksha.com/Manage_api/OnlinePay/'.$eoid));
		}
		
	}
	public function random_code($limit)
		{
		    return substr(base_convert(sha1(uniqid(mt_rand())), 16, 36), 0, $limit);
		}

	function OnlinePay($oid)
	{
		$coid = base64_decode($oid);
		//echo 'SELECT * FROM  td_master_order WHERE master_order_no="'.$oid.'"';
		$dtl = $this->db->query('SELECT * FROM  tb_transaction WHERE ordid="'.$coid.'"')->row();
		 $c_dtl = $this->db->query('SELECT * FROM  tb_students WHERE student_id="'.$dtl->user_id.'"')->row();
		//echo 'SELECT * FROM  td_master_order WHERE master_order_no="'.$dtl[0]->customer_id.'"';
		//$txn_id = 'op'.rand(1,999999);
			
		$data['order_id'] = $coid;
		$data['cust_id'] = $c_dtl->student_id;
		$data['cust_email'] = $c_dtl->email;
		$data['cust_phn'] = $c_dtl->mobile;
		$data['cust_name'] = $c_dtl->name;
		$data['amt'] = 1;
		//$data['amt'] = $dtl[0]->order_total;
		$data['txn_id'] = $dtl->transac_id;

		$this->load->view('paydir',$data);
		//print_r($data);die;exit;

	}

	function OnlineSuccessPay()
	{
		//echo 'SELECT * FROM  td_master_order WHERE master_order_no="'.$oid.'"';
		$oid = $this->input->post('ordrId');
		$cid = $this->input->post('userId');
		$dtl = $this->db->query('UPDATE tb_transaction SET pay_status=1 WHERE ordid="'.$oid.'"');
		$dtl_dtl = $this->db->query('UPDATE tb_transaction SET pay_status=1 WHERE ordid="'.$oid.'"')->row();
		$dtl = $this->db->query('UPDATE tb_current_course SET class_status=1 WHERE course_id="'.$dtl_dtl->class_id);
		$c_dtl = $this->db->query('SELECT * FROM  td_students WHERE student_id="'.$cid.'"')->result();
		

	}

	function classDetails(){
		$uid = $this->input->post('userId');
		$classes = $this->db->query('SELECT a.*,b.* FROM tb_current_course AS a JOIN tb_transaction AS b ON a.course_id=b.class_id WHERE a.class_status=1')->result();
		$cdtl = array();
		foreach($classes AS $cdtls){
			$day = $this->db->query('SELECT * FROM tb_teaching_days WHERE day_id='.$cdtls->day)->row();
			$time = $this->db->query('SELECT * FROM tb_teaching_time WHERE time_id='.$cdtls->time)->row();
			$mentor = $this->db->query('SELECT * FROM tb_mentors WHERE mentor_id='.$cdtls->mentor)->row();
			$subject = $this->db->query('SELECT * FROM tb_subject WHERE subject_id='.$cdtls->subject)->row();
			
			$cdtl[] = array('class'=>$cdtls,'cday' => $day, 'ctime' => $time, 'mentor' => $mentor, 'subject'=>$subject);
		}
		if($classes){
			header('Access-Control-Allow-Origin: *');
			echo json_encode(array('success' => 1, 'classDetails' =>$cdtl));
		}else{
			header('Access-Control-Allow-Origin: *');
			echo json_encode(array('success' => 0));
		}
	}
	function completeClass(){
		$uid = $this->input->post('courseId');
		$dtl = $this->db->query('UPDATE tb_current_course SET is_complete=1 WHERE course_id='.$uid);
		if($dtl){
			header('Access-Control-Allow-Origin: *');
			echo json_encode(array('success' => 1));
		}else{
			header('Access-Control-Allow-Origin: *');
			echo json_encode(array('success' => 0));
		}
	}


	public function PostComment(){
		$post_id = $this->input->post('postId');
		$user_id = $this->input->post('userId');
		$user_type = $this->input->post('userType');
		$comment = $this->input->post('comment');

		$array = array(
			"user_id" => $user_id,
			"post_id" => $post_id,
			"user_type" => $user_type,
			"comment_content" => $comment,
			"comment_status" => 1,
			"created_date" => date('Y-m-d'),
			"created_time" => date('H:i:s')
		);

		$last_id = $this->common_model->addRecord('tb_post_comments', $array);
		header('Access-Control-Allow-Origin: *');
		echo json_encode(array('success' => 1));
	}

	public function PostDetails()
	{
		$post_id = $this->input->post('postId');
		// $user_id = $this->input->post('userId');
		// $user_type = $this->input->post('userType');
		$postViewSave = array();
		$ptype = $this->db->query('SELECT * FROM tb_posts WHERE post_id='.$post_id)->row();
		$postsCommenttype = $this->db->query('SELECT * FROM tb_post_comments WHERE post_id='.$post_id)->row();
		$utype = $ptype->user_type;
		$putype = $ptype->user_type;
		$user_id = $ptype->user_id;
		if($utype == 'S' || $putype == 'S'){
			$table = 'tb_students';
			$uid = 'student_id';
		} else {
			$table = 'tb_mentors';
			$uid = 'mentor_id';
		}
		
			$array = array(
			"user_id" => $user_id,
			"post_id" => $post_id,
			"created_date" => date('Y-m-d'),
			"created_time" => date('H:i:s')
		);

		$last_id = $this->common_model->addRecord('tb_post_save', $array);

		$posts = $this->db->query('SELECT a.*,b.* FROM tb_posts AS a JOIN '.$table.' AS b ON a.user_id=b.'.$uid.' WHERE a.post_id='.$post_id)->result();

		$postsComment = $this->db->query('SELECT a.*,b.* FROM tb_post_comments AS a JOIN '.$table.' AS b ON a.user_id=b.'.$uid.' WHERE a.post_id='.$post_id)->result();
		

		$postViewSave[] = array("postdtl"=>$posts,"postCmnt"=>$postsComment);

			header('Access-Control-Allow-Origin: *');
			echo json_encode(array('success' => 1,"pDetails"=>$postViewSave));

	}

	public function offeredSubjects()
	{
		
		$ptype = $this->db->query('SELECT a.*,b.*,c.* FROM tb_fees As a JOIN tb_subject As b ON a.subject_id=b.subject_id JOIN tb_chapter AS c ON a.chapter_id=c.chapter_id ORDER BY a.fee_id DESC')->result();
			header('Access-Control-Allow-Origin: *');
			if($ptype){
			echo json_encode(array('success' => 1,"feeDetails"=>$ptype));
			} else {
				echo json_encode(array('success' => 0));
			}

	}

   //user details sent
	public function getUserData()
	{
		if ($this->input->post('mobile') != '') {
			$mobile = $this->input->post('mobile');
			$did = $this->input->post('deviceId');
			$token = $this->input->post('token');

			$numRows = $this->db->query("SELECT * FROM tb_students WHERE mobile='" . $mobile . "'")->num_rows();
			$numRowsG = $this->db->query("SELECT * FROM tb_guardian WHERE guardian_mobile='" . $mobile . "'")->num_rows();
			$numRowsM = $this->db->query("SELECT * FROM tb_mentors WHERE mentor_mobile='" . $mobile . "'")->num_rows();
			$postViewSave = array();

			if ($numRows > 0 || $numRowsG > 0 || $numRowsM > 0) {
				if ($numRows > 0) {
					$temp = 'S';
					$userDetails = $this->db->query("SELECT * FROM tb_students WHERE mobile='" . $mobile . "'")->result();
					$updevice = $this->db->query('UPDATE tb_students SET dvid="'.$did.'", token="'.$token.'" WHERE mobile="'.$mobile.'"');
					$ptype = $this->db->query('SELECT * FROM td_chat WHERE (from_id='.$userDetails[0]->student_id.' OR to_id='.$userDetails[0]->student_id.') AND (user_type="S" OR user_type="A") AND is_read=0')->num_rows();

					$posts = $this->db->query("SELECT * FROM tb_posts WHERE user_id=" . $userDetails[0]->student_id . " AND user_type='S' AND post_status=1")->num_rows();
					$followings = $this->db->query("SELECT * FROM tbl_followers WHERE user_id=" . $userDetails[0]->student_id . " AND user_type='S'")->num_rows();
					$followers = 0;
					
					$postsArray = $this->db->query("SELECT * FROM tb_posts WHERE user_id=" . $userDetails[0]->student_id . " AND user_type='S' AND post_status=1 ORDER BY post_id DESC LIMIT 5")->result();
					foreach($postsArray as $post)
					{
						$postlk = $this->db->query("SELECT * FROM tb_post_view WHERE post_id=".$post->post_id." AND user_id=".$userDetails[0]->student_id)->num_rows();
						$postvw = $this->db->query("SELECT * FROM tb_post_view WHERE post_id=".$post->post_id)->num_rows();
						$postlk = $this->db->query("SELECT * FROM tb_post_save WHERE post_id=".$post->post_id)->num_rows();
						$postcmnt = $this->db->query("SELECT * FROM tb_post_comments WHERE post_id=".$post->post_id)->num_rows();
						$postViewSave[] = array("postdtl"=>$post, "postview"=>$postvw, "postLike"=>$postlk, "postCmnt"=>$postcmnt, "plike"=>$postlk);
						
					}

				}

				if ($numRowsG > 0) {
					$temp = 'G';
					$userDetails = $this->db->query("SELECT * FROM tb_guardian WHERE guardian_mobile='" . $mobile . "'")->result();
					$updevice = $this->db->query('UPDATE tb_guardian SET dvid="'.$did.'", token="'.$token.'" WHERE guardian_mobile="'.$mobile.'"');
			    	//$subDetails = array();
			    	$ptype = $this->db->query('SELECT * FROM td_chat WHERE (from_id='.$userDetails[0]->guardian_id.' OR to_id='.$userDetails[0]->guardian_id.') AND (user_type="G" OR user_type="A") AND is_read=0')->num_rows();

					$followers = 0;
					$followings = 0;
					$posts = 0;
					$postViewSave = array();
						$postViewSave[] = array("postdtl"=>0, "postview"=>0, "postLike"=>0, "postCmnt"=>0,"plike"=>0);
				}
				

				if($numRowsM > 0) 
				{
					$temp = 'M';
					$userDetails = $this->db->query("SELECT * FROM tb_mentors WHERE mentor_mobile='" . $mobile . "'")->result();
					$updevice = $this->db->query('UPDATE tb_mentors SET dvid="'.$did.'", token="'.$token.'" WHERE mentor_mobile="'.$mobile.'"');
					
			    	/*$subDetails = $this->db->query("SELECT a.*,b.subject FROM tb_mentors_subject a
												    INNER JOIN tb_subject b ON a.subject_id=b.subject_id
												    WHERE a.mentor_id=".$userDetails[0]->mentor_id)->result();*/
					
					$followers = $this->db->query("SELECT * FROM tbl_followers WHERE mentor_id=" . $userDetails[0]->mentor_id)->num_rows();
					$followings = $this->db->query("SELECT * FROM tbl_followers WHERE user_id=" . $userDetails[0]->mentor_id . " AND user_type='M'")->num_rows();
					$ptype = $this->db->query('SELECT * FROM td_chat WHERE (from_id='.$userDetails[0]->mentor_id.' OR to_id='.$userDetails[0]->mentor_id.') AND (user_type="M" OR user_type="A") AND is_read=0')->num_rows();
					$posts = $this->db->query("SELECT * FROM tb_posts WHERE user_id=" . $userDetails[0]->mentor_id . " AND user_type='M' AND post_status=1")->num_rows();
					$posts_dtl = $this->db->query("SELECT * FROM tb_posts WHERE user_id=" . $userDetails[0]->mentor_id . " AND user_type='M' AND post_status=1")->result();
					
					$postsArray = $this->db->query("SELECT TIME_FORMAT(created_time,'%H:%i:%p') as timee, a.*  FROM tb_posts a WHERE a.user_id=" . $userDetails[0]->mentor_id . " AND user_type='M' AND post_status=1 ORDER BY post_id DESC LIMIT 5")->result();
					
					
					$postViewSave = array();
					foreach($postsArray as $post)
					{
						$postlk = $this->db->query("SELECT * FROM tb_post_view WHERE post_id=".$post->post_id." AND user_id=".$userDetails[0]->mentor_id)->num_rows();
						$postvw = $this->db->query("SELECT * FROM tb_post_view WHERE post_id=".$post->post_id)->num_rows();
						$postlk = $this->db->query("SELECT * FROM tb_post_save WHERE post_id=".$post->post_id)->num_rows();
						$postcmnt = $this->db->query("SELECT * FROM tb_post_comments WHERE post_id=".$post->post_id)->num_rows();
						$postViewSave[] = array("postdtl"=>$post, "postview"=>$postvw, "postLike"=>$postlk, "postCmnt"=>$postcmnt,"plike"=>$postlk);
						
					}
					

				}
				
				header('Access-Control-Allow-Origin: *');
				echo json_encode(array('success' => 1, 'mobile' => $mobile, "utype" => $temp, "userDetails" => $userDetails, "posts" => $posts, "followers" => $followers, "followings" => $followings, "postsDtl" =>$postViewSave, 'chatCount' => $ptype));




			} else {
				echo json_encode(array('success' => 0));
			}
		}

	}


	public function getUserPostData()
	{
		if ($this->input->post('mobile') != '') {
			$mobile = $this->input->post('mobile');
			$ofst = $this->input->post('postcount');

			$numRows = $this->db->query("SELECT * FROM tb_students WHERE mobile='" . $mobile . "'")->num_rows();
			$numRowsG = $this->db->query("SELECT * FROM tb_guardian WHERE guardian_mobile='" . $mobile . "'")->num_rows();
			$numRowsM = $this->db->query("SELECT * FROM tb_mentors WHERE mentor_mobile='" . $mobile . "'")->num_rows();
			$postViewSave = array();

			if ($numRows > 0 || $numRowsG > 0 || $numRowsM > 0) {
				if ($numRows > 0) {
					$temp = 'S';
					$userDetails = $this->db->query("SELECT * FROM tb_students WHERE mobile='" . $mobile . "'")->result();
					/*$subDetails = $this->db->query("SELECT a.*,b.subject FROM tb_students_subject a
												    INNER JOIN tb_subject b ON a.subject_id=b.subject_id
												    WHERE a.student_id=".$userDetails[0]->student_id)->result();*/
													
					//$mentors = $this->db->query("SELECT * FROM tb_mentors WHERE mentor_mobile='".$mobile."'")->row();

					$posts = $this->db->query("SELECT * FROM tb_posts WHERE user_id=" . $userDetails[0]->student_id . " AND user_type='S' AND post_status=1")->num_rows();
					$followings = $this->db->query("SELECT * FROM tbl_followers WHERE user_id=" . $userDetails[0]->student_id . " AND user_type='S'")->num_rows();
					$followers = 0;
					
					$postsArray = $this->db->query("SELECT * FROM tb_posts WHERE user_id=" . $userDetails[0]->student_id . " AND user_type='S' AND post_status=1 ORDER BY post_id DESC LIMIT 5 OFFSET ".$ofst)->result();

					foreach($postsArray as $post)
					{
						$postlk = $this->db->query("SELECT * FROM tb_post_view WHERE post_id=".$post->post_id." AND user_id=".$userDetails[0]->student_id)->num_rows();
						$postvw = $this->db->query("SELECT * FROM tb_post_view WHERE post_id=".$post->post_id)->num_rows();
						$postlk = $this->db->query("SELECT * FROM tb_post_save WHERE post_id=".$post->post_id)->num_rows();
						$postcmnt = $this->db->query("SELECT * FROM tb_post_comments WHERE post_id=".$post->post_id)->num_rows();
						$postViewSave[] = array("postdtl"=>$post, "postview"=>$postvw, "postLike"=>$postlk, "postCmnt"=>$postcmnt,"plike"=>$postlk);
						
					}
				}

				if ($numRowsG > 0) {
					$temp = 'G';
					$userDetails = $this->db->query("SELECT * FROM tb_guardian WHERE guardian_mobile='" . $mobile . "'")->result();
			    	//$subDetails = array();
			    	$ptype = $this->db->query('SELECT * FROM td_chat WHERE (from_id='.$userDetails[0]->guardian_id.' OR to_id='.$userDetails[0]->guardian_id.') AND (user_type="G" OR user_type="A") AND is_read=0')->num_rows();

					$followers = 0;
					$followings = 0;
					$posts = 0;
					$postViewSave = array();
					$postViewSave[] = array("postdtl"=>0, "postview"=>0, "postLike"=>0, "postCmnt"=>0,"plike"=>0);

				}

				if($numRowsM > 0) 
				{
					$temp = 'M';
					$userDetails = $this->db->query("SELECT * FROM tb_mentors WHERE mentor_mobile='" . $mobile . "'")->result();
					
			    	/*$subDetails = $this->db->query("SELECT a.*,b.subject FROM tb_mentors_subject a
												    INNER JOIN tb_subject b ON a.subject_id=b.subject_id
												    WHERE a.mentor_id=".$userDetails[0]->mentor_id)->result();*/
					
					$followers = $this->db->query("SELECT * FROM tbl_followers WHERE mentor_id=" . $userDetails[0]->mentor_id)->num_rows();
					$followings = $this->db->query("SELECT * FROM tbl_followers WHERE user_id=" . $userDetails[0]->mentor_id . " AND user_type='M'")->num_rows();
					$posts = $this->db->query("SELECT * FROM tb_posts WHERE user_id=" . $userDetails[0]->mentor_id . " AND user_type='M' AND post_status=1")->num_rows();
					$posts_dtl = $this->db->query("SELECT * FROM tb_posts WHERE user_id=" . $userDetails[0]->mentor_id . " AND user_type='M' AND post_status=1")->result();
					
					$postsArray = $this->db->query("SELECT TIME_FORMAT(created_time,'%H:%i:%p') as timee, a.*  FROM tb_posts a WHERE a.user_id=" . $userDetails[0]->mentor_id . " AND user_type='M' AND post_status=1 ORDER BY post_id DESC LIMIT 5 OFFSET ".$ofst)->result();
					
					
					$postViewSave = array();
					foreach($postsArray as $post)
					{
						$postlk = $this->db->query("SELECT * FROM tb_post_view WHERE post_id=".$post->post_id." AND user_id=".$userDetails[0]->mentor_id)->num_rows();
						$postvw = $this->db->query("SELECT * FROM tb_post_view WHERE post_id=".$post->post_id)->num_rows();
						$postlk = $this->db->query("SELECT * FROM tb_post_save WHERE post_id=".$post->post_id)->num_rows();
						$postcmnt = $this->db->query("SELECT * FROM tb_post_comments WHERE post_id=".$post->post_id)->num_rows();
						$postViewSave[] = array("postdtl"=>$post, "postview"=>$postvw, "postLike"=>$postlk, "postCmnt"=>$postcmnt,"plike"=>$postlk);
						
					}
					

				}
				
				header('Access-Control-Allow-Origin: *');
				echo json_encode(array('success' => 1, 'mobile' => $mobile, "utype" => $temp, "postsDtl" =>$postViewSave,"userDetails" => $userDetails));




			} else {
				echo json_encode(array('success' => 0));
			}
		}

	}




	//sent post by user id
	public function getPosts()
	{
		if ($this->input->post('userId') != '') {
			$userId = $this->input->post('userId');
			$userType = $this->input->post('userType');

			$result = $this->db->query("SELECT * FROM tb_posts a
					LEFT JOIN tb_post_comments b ON a.post_id=b.post_id
					LEFT JOIN tb_post_save c ON a.post_id=c.post_id
					LEFT JOIN tb_post_view d ON a.post_id=b.post_id
				    WHERE a.user_id=" . $userId . " AND a.user_type=" . $userType)->result();

			if (count($result) > 0) {
				echo json_encode(array('success' => 1, "allpost" => $result));
			} else {
				echo json_encode(array('success' => 0));
			}
		}
	}
	public function mentorFollowList()
	{
		if ($this->input->post('userId') != '') {
			$userId = $this->input->post('userId');
			$userType = $this->input->post('userType');

			$result = $this->db->query("SELECT * FROM tbl_followers a
					LEFT JOIN tb_students b ON a.user_id=b.student_id
				    WHERE a.mentor_id=".$userId)->result();
			// echo "SELECT * FROM tbl_followers a
			// 		LEFT JOIN tb_students b ON a.user_id=b.student_id
			// 	    WHERE a.mentor_id=".$userId;die;
			if (count($result) > 0) {
				echo json_encode(array('success' => 1, "allfollows" => $result));
			} else {
				echo json_encode(array('success' => 0));
			}
		}
	}

	public function studentTimeline()
	{
		if ($this->input->post('userId') != '') {
			$userId = $this->input->post('userId');
			$userType = $this->input->post('userType');
			$studentSubject = $this->db->query('SELECT * FROM tb_students_subject WHERE student_id='.$userId)->result();

// My Mentor Details
			$mentorscount = $this->db->query('SELECT mentor FROM tb_current_course WHERE user_id='.$userId)->num_rows();
			if($mentorscount > 0){
				$mentors = $this->db->query('SELECT mentor FROM tb_current_course WHERE user_id='.$userId)->result();
				$mentorsId = array();
					foreach($mentors as $mentorsdtl){
						$mentorsId[] =  $mentorsdtl->mentor;
					}
				$impMentor = rtrim(implode($mentorsId, ','),',');
// For My Mentor posts

				$myMentorPost = $this->db->query('SELECT post_id FROM tb_posts WHERE user_id IN('.$impMentor.') AND user_type="M"')->result();	
				$mentorPostId = array();
					foreach($myMentorPost as $mymentorPDtl){
						$mentorPostId[] =  $mymentorPDtl->post_id;
					}
					$impmyMentorPId = rtrim(implode($mentorPostId, ','),',');
			}
// For My posts
			$studPost = $this->db->query('SELECT post_id FROM tb_posts WHERE user_id='.$userId.' AND user_type="S"')->result();
			$studPostId = array();
				foreach($studPost as $studPDtl){
					$studPostId[] =  $studPDtl->post_id;
				}
				$impstudPId = rtrim(implode($studPostId, ','),',');
				// echo 'SELECT post_id FROM tb_post_report WHERE user_id='.$userId.' AND user_type="M"';die;
				$repPostcount = $this->db->query('SELECT post_id FROM tb_post_report WHERE user_id='.$userId.' AND (user_type="M" OR user_type="S")')->num_rows();
				if($repPostcount > 0){
			$repPost = $this->db->query('SELECT post_id FROM tb_post_report WHERE user_id='.$userId.' AND (user_type="M" OR user_type="S")')->result();
			$repPostId = array();
				foreach($repPost as $repPDtl){
					$repPostId[] =  $repPDtl->post_id;
				}
				$imprepPId = rtrim(implode($repPostId, ','),',');	
				}
// For Other Mentor posts
				// For Other Mentor
				foreach ($studentSubject as $value) {
					$otherMentorscount = $this->db->query('SELECT * FROM tb_mentors_subject WHERE subject_id='.$value->subject_id)->num_rows();
					if($otherMentorscount > 0){
					$otherMentors = $this->db->query('SELECT * FROM tb_mentors_subject WHERE subject_id='.$value->subject_id)->result();
					$otherMentor[] = $otherMentors[0]->mentor_id;
					}
				}
				$impotherMentorId = rtrim(implode($otherMentor, ','),',');



			$otherMentorPost = $this->db->query('SELECT post_id FROM tb_posts WHERE user_id IN('.$impotherMentorId.') AND user_type="M"')->result();
			$otherMentorPostId = array();
				foreach($otherMentorPost as $otherMentorpDtl){
					$otherMentorPostId[] =  $otherMentorpDtl->post_id;
				}
				$impotherPId = rtrim(implode($otherMentorPostId, ','),',');			

// For commented post
				$commentedPost = $this->db->query('SELECT post_id FROM tb_post_comments WHERE user_id IN('.$impotherMentorId.') AND user_type="M"')->result();
				$commentedPostId = array();
				foreach($commentedPost as $commentedpDtl){
					$commentedPostId[] =  $commentedpDtl->post_id;
				}
				$commentedPId = rtrim(implode($commentedPostId, ','),',');	
			if($mentorscount > 0){
			$AllimplodedPostId = rtrim(($impmyMentorPId.','.$impstudPId.','.$impotherPId.','.$commentedPId),',');
		} else{
			$AllimplodedPostId = ltrim(rtrim(($impstudPId.','.$impotherPId.','.$commentedPId),','),',');
		}
			//echo $AllimplodedPostId;die;
			$expIds = explode(',',$AllimplodedPostId);
			// For unique values
			$allUniqueIds = array_unique($expIds);
			//print_r($allUniqueIds);
			$impAllUniqueId = implode($allUniqueIds, ',');
			if($repPostcount > 0){
			$AllUniquePosts = $this->db->query('SELECT * FROM tb_posts WHERE post_id IN('.$impAllUniqueId.') AND post_id NOT IN('.$imprepPId.') AND post_status=1 ORDER BY post_id DESC LIMIT 4')->result();
		} else {
			$AllUniquePosts = $this->db->query('SELECT * FROM tb_posts WHERE post_id IN('.$impAllUniqueId.') AND post_status=1 ORDER BY post_id DESC LIMIT 4')->result();
		}
		//echo 'SELECT * FROM tb_posts WHERE post_id IN('.$impAllUniqueId.') AND post_status=1 ORDER BY post_id DESC LIMIT 4';die;
			$postDetailsMAtch = array();
			foreach($AllUniquePosts as $users){
				$newUserType = $users->user_type;
				if($newUserType == 'S'){
					$table = 'tb_students';
					$uid = 'student_id';
				} else{
					$table = 'tb_mentors';
					$uid = 'mentor_id';
				}
				$postlkcnt = $this->db->query("SELECT * FROM tb_post_save WHERE post_id=".$users->post_id." AND user_id=".$users->user_id." AND user_type='".$users->user_type."'")->num_rows();
				 if($postlkcnt > 0){
				 	$postlk = 1;
				 } else{
				 	$postlk = 0;
				 }
				 //$postlk = $this->db->query("SELECT * FROM tb_post_save WHERE post_id=".$post->post_id)->num_rows();
				$postvw = $this->db->query("SELECT * FROM tb_post_view WHERE post_id=".$users->post_id)->num_rows();
				//$postlk = $this->db->query("SELECT * FROM tb_post_save WHERE post_id=".$post->post_id)->num_rows();
				$postcmnt = $this->db->query("SELECT * FROM tb_post_comments WHERE post_id=".$users->post_id)->num_rows();
				$userdetails = $this->db->query('SELECT * FROM '.$table.' WHERE '.$uid.'='.$users->user_id)->row();
					$postDetailsMAtch[] = array('postDetailsNEw' => $users, 'PostUsers'=>$userdetails, 'myLike' =>$postlk, 'totView' =>$postvw, 'totComnt' => $postcmnt);
				}
			
			header('Access-Control-Allow-Origin: *');
			echo json_encode(array('success' => 1, "allpost" => $postDetailsMAtch));
			
		}
	}

	public function studentTimelineLazy()
	{
		if ($this->input->post('userId') != '') {
			$userId = $this->input->post('userId');
			$userType = $this->input->post('userType');
			$ofst = $this->input->post('postcount');
			
			$studentSubject = $this->db->query('SELECT * FROM tb_students_subject WHERE student_id='.$userId)->result();

// My Mentor Details
			$mentorscount = $this->db->query('SELECT mentor FROM tb_current_course WHERE user_id='.$userId)->num_rows();
			if($mentorscount > 0){
				$mentors = $this->db->query('SELECT mentor FROM tb_current_course WHERE user_id='.$userId)->result();
				$mentorsId = array();
					foreach($mentors as $mentorsdtl){
						$mentorsId[] =  $mentorsdtl->mentor;
					}
				$impMentor = rtrim(implode($mentorsId, ','),',');
// For My Mentor posts

				$myMentorPost = $this->db->query('SELECT post_id FROM tb_posts WHERE user_id IN('.$impMentor.') AND user_type="M"')->result();	
				$mentorPostId = array();
					foreach($myMentorPost as $mymentorPDtl){
						$mentorPostId[] =  $mymentorPDtl->post_id;
					}
					$impmyMentorPId = rtrim(implode($mentorPostId, ','),',');
			}
// For My posts
			$studPost = $this->db->query('SELECT post_id FROM tb_posts WHERE user_id='.$userId.' AND user_type="S"')->result();
			$studPostId = array();
				foreach($studPost as $studPDtl){
					$studPostId[] =  $studPDtl->post_id;
				}
				$impstudPId = rtrim(implode($studPostId, ','),',');
				// echo 'SELECT post_id FROM tb_post_report WHERE user_id='.$userId.' AND user_type="M"';die;
				$repPostcount = $this->db->query('SELECT post_id FROM tb_post_report WHERE user_id='.$userId.' AND (user_type="M" OR user_type="S")')->num_rows();
				if($repPostcount > 0){
			$repPost = $this->db->query('SELECT post_id FROM tb_post_report WHERE user_id='.$userId.' AND (user_type="M" OR user_type="S")')->result();
			$repPostId = array();
				foreach($repPost as $repPDtl){
					$repPostId[] =  $repPDtl->post_id;
				}
				$imprepPId = rtrim(implode($repPostId, ','),',');	
				}
// For Other Mentor posts
				// For Other Mentor
				foreach ($studentSubject as $value) {
					$otherMentorscount = $this->db->query('SELECT * FROM tb_mentors_subject WHERE subject_id='.$value->subject_id)->num_rows();
					if($otherMentorscount > 0){
					$otherMentors = $this->db->query('SELECT * FROM tb_mentors_subject WHERE subject_id='.$value->subject_id)->result();
					$otherMentor[] = $otherMentors[0]->mentor_id;
					}
				}
				$impotherMentorId = rtrim(implode($otherMentor, ','),',');



			$otherMentorPost = $this->db->query('SELECT post_id FROM tb_posts WHERE user_id IN('.$impotherMentorId.') AND user_type="M"')->result();
			$otherMentorPostId = array();
				foreach($otherMentorPost as $otherMentorpDtl){
					$otherMentorPostId[] =  $otherMentorpDtl->post_id;
				}
				$impotherPId = rtrim(implode($otherMentorPostId, ','),',');			

// For commented post
				$commentedPost = $this->db->query('SELECT post_id FROM tb_post_comments WHERE user_id IN('.$impotherMentorId.') AND user_type="M"')->result();
				$commentedPostId = array();
				foreach($commentedPost as $commentedpDtl){
					$commentedPostId[] =  $commentedpDtl->post_id;
				}
				$commentedPId = rtrim(implode($commentedPostId, ','),',');	
			
			if($mentorscount > 0){
			$AllimplodedPostId = rtrim(($impmyMentorPId.','.$impstudPId.','.$impotherPId.','.$commentedPId),',');
		} else{
			$AllimplodedPostId = ltrim(rtrim(($impstudPId.','.$impotherPId.','.$commentedPId),','),',');
		}
			//echo $AllimplodedPostId;die;
			$expIds = explode(',',$AllimplodedPostId);
			// For unique values
			$allUniqueIds = array_unique($expIds);
			//print_r($allUniqueIds);
			$impAllUniqueId = implode($allUniqueIds, ',');
			if($repPostcount > 0){
			$AllUniquePosts = $this->db->query('SELECT * FROM tb_posts WHERE post_id IN('.$impAllUniqueId.') AND post_id NOT IN('.$imprepPId.') AND post_status=1 ORDER BY post_id DESC LIMIT 4 OFFSET '.$ofst)->result();
		} else {
			$AllUniquePosts = $this->db->query('SELECT * FROM tb_posts WHERE post_id IN('.$impAllUniqueId.') AND post_status=1 ORDER BY post_id DESC LIMIT 4 OFFSET '.$ofst)->result();
		}
		//print_r($AllUniquePosts);die;
			$postDetailsMAtch = array();
			foreach($AllUniquePosts as $users){
				$newUserType = $users->user_type;
				if($newUserType == 'S'){
					$table = 'tb_students';
					$uid = 'student_id';
				} else{
					$table = 'tb_mentors';
					$uid = 'mentor_id';
				}
				$postlkcnt = $this->db->query("SELECT * FROM tb_post_save WHERE post_id=".$users->post_id." AND user_id=".$users->user_id)->num_rows();
				 if($postlkcnt > 0){
				 	$postlk = 1;
				 } else{
				 	$postlk = 0;
				 }
				$postvw = $this->db->query("SELECT * FROM tb_post_view WHERE post_id=".$users->post_id)->num_rows();
				//$postlk = $this->db->query("SELECT * FROM tb_post_save WHERE post_id=".$post->post_id)->num_rows();
				$postcmnt = $this->db->query("SELECT * FROM tb_post_comments WHERE post_id=".$users->post_id)->num_rows();
				$userdetails = $this->db->query('SELECT * FROM '.$table.' WHERE '.$uid.'='.$users->user_id)->row();
					$postDetailsMAtch[] = array('postDetailsNEw' => $users, 'PostUsers'=>$userdetails, 'myLike' =>$postlk, 'totView' =>$postvw, 'totComnt' => $postcmnt);
				}
			
			header('Access-Control-Allow-Origin: *');
			echo json_encode(array('success' => 1, "allpost" => $postDetailsMAtch));
			
		}
	}


	public function getUserProfile()
	{
		if ($this->input->post('userId') != '') {
			$userId = $this->input->post('userId');

			$numRows = $this->db->query("SELECT * FROM tb_students WHERE student_id='" . $userId . "'")->num_rows();
			$numRowsG = $this->db->query("SELECT * FROM tb_guardian WHERE guardian_id='" . $userId . "'")->num_rows();
			$numRowsM = $this->db->query("SELECT * FROM tb_mentors WHERE mentor_id='" . $userId . "'")->num_rows();
			$postViewSave = array();

			if ($numRows > 0 || $numRowsG > 0 || $numRowsM > 0) {
				if ($numRows > 0) {
					$temp = 'S';
					$userDetails = $this->db->query("SELECT * FROM tb_students WHERE student_id='" . $userId . "'")->result();
					

					$posts = $this->db->query("SELECT * FROM tb_posts WHERE user_id=" . $userDetails[0]->student_id . " AND user_type='S' AND post_status=1")->num_rows();
					$followings = $this->db->query("SELECT * FROM tbl_followers WHERE user_id=" . $userDetails[0]->student_id . " AND user_type='S'")->num_rows();
					$followers = 0;
					
					$postsArray = $this->db->query("SELECT * FROM tb_posts WHERE user_id=" . $userDetails[0]->student_id . " AND user_type='S' AND post_status=1 ORDER BY post_id DESC LIMIT 5")->result();
					foreach($postsArray as $post)
					{
						$postlk = $this->db->query("SELECT * FROM tb_post_view WHERE post_id=".$post->post_id." AND user_id=".$userDetails[0]->student_id)->num_rows();
						$postvw = $this->db->query("SELECT * FROM tb_post_view WHERE post_id=".$post->post_id)->num_rows();
						$postlk = $this->db->query("SELECT * FROM tb_post_save WHERE post_id=".$post->post_id)->num_rows();
						$postcmnt = $this->db->query("SELECT * FROM tb_post_comments WHERE post_id=".$post->post_id)->num_rows();
						$postViewSave[] = array("postdtl"=>$post, "postview"=>$postvw, "postLike"=>$postlk, "postCmnt"=>$postcmnt, "plike"=>$postlk);
						
					}

				}

				if ($numRowsG > 0) {
					$temp = 'G';
					$userDetails = $this->db->query("SELECT * FROM tb_guardian WHERE guardian_id='" . $userId . "'")->result();
			    	//$subDetails = array();
					$posts = $this->db->query("SELECT * FROM tb_posts WHERE user_id=" . $userDetails[0]->guardian_id . " AND user_type='G' AND post_status=1")->num_rows();
					$followings = $this->db->query("SELECT * FROM tbl_followers WHERE user_id=" . $userDetails[0]->guardian_id . " AND user_type='G'")->num_rows();
					$followers = 0;
					$postsArray = $this->db->query("SELECT * FROM tb_posts WHERE user_id=" . $userDetails[0]->guardian_id . " AND user_type='G' AND post_status=1 ORDER BY post_id DESC LIMIT 5")->result();

					foreach($postsArray as $post)
					{
						$postvw = $this->db->query("SELECT * FROM tb_post_view WHERE post_id=".$post->post_id)->num_rows();
						$postlk = $this->db->query("SELECT * FROM tb_post_save WHERE post_id=".$post->post_id)->num_rows();
						$postcmnt = $this->db->query("SELECT * FROM tb_post_comments WHERE post_id=".$post->post_id)->num_rows();
						$postViewSave[] = array("postdtl"=>$post, "postview"=>$postvw, "postLike"=>$postlk, "postCmnt"=>$postcmnt);
						
					}

				}
				

				if($numRowsM > 0) 
				{
					$temp = 'M';
					$userDetails = $this->db->query("SELECT * FROM tb_mentors WHERE mentor_id='" . $userId . "'")->result();
					
			    	/*$subDetails = $this->db->query("SELECT a.*,b.subject FROM tb_mentors_subject a
												    INNER JOIN tb_subject b ON a.subject_id=b.subject_id
												    WHERE a.mentor_id=".$userDetails[0]->mentor_id)->result();*/
					
					$followers = $this->db->query("SELECT * FROM tbl_followers WHERE mentor_id=" . $userDetails[0]->mentor_id)->num_rows();
					$followings = $this->db->query("SELECT * FROM tbl_followers WHERE user_id=" . $userDetails[0]->mentor_id . " AND user_type='M'")->num_rows();
					$posts = $this->db->query("SELECT * FROM tb_posts WHERE user_id=" . $userDetails[0]->mentor_id . " AND user_type='M' AND post_status=1")->num_rows();
					$posts_dtl = $this->db->query("SELECT * FROM tb_posts WHERE user_id=" . $userDetails[0]->mentor_id . " AND user_type='M' AND post_status=1")->result();
					
					$postsArray = $this->db->query("SELECT TIME_FORMAT(created_time,'%H:%i:%p') as timee, a.*  FROM tb_posts a WHERE a.user_id=" . $userDetails[0]->mentor_id . " AND user_type='M' AND post_status=1 ORDER BY post_id DESC LIMIT 5")->result();
					
					
					$postViewSave = array();
					foreach($postsArray as $post)
					{
						$postlk = $this->db->query("SELECT * FROM tb_post_view WHERE post_id=".$post->post_id." AND user_id=".$userDetails[0]->mentor_id)->num_rows();
						$postvw = $this->db->query("SELECT * FROM tb_post_view WHERE post_id=".$post->post_id)->num_rows();
						$postlk = $this->db->query("SELECT * FROM tb_post_save WHERE post_id=".$post->post_id)->num_rows();
						$postcmnt = $this->db->query("SELECT * FROM tb_post_comments WHERE post_id=".$post->post_id)->num_rows();
						$postViewSave[] = array("postdtl"=>$post, "postview"=>$postvw, "postLike"=>$postlk, "postCmnt"=>$postcmnt,"plike"=>$postlk);
						
					}
					

				}
				
				header('Access-Control-Allow-Origin: *');
				echo json_encode(array('success' => 1, 'userId' => $userId, "utype" => $temp, "userDetails" => $userDetails, "posts" => $posts, "followers" => $followers, "followings" => $followings, "postsDtl" =>$postViewSave));




			} else {
				echo json_encode(array('success' => 0));
			}
		}

	}

	public function mentorTimeline()
	{
		if ($this->input->post('userId') != '') {
			$userId = $this->input->post('userId');
			$userType = 'M';
			$studentSubject = $this->db->query('SELECT * FROM tb_mentors_subject WHERE mentor_id='.$userId)->result();

// For Mentor posts

				$myMentorPost = $this->db->query('SELECT post_id FROM tb_posts WHERE user_id='.$userId.' AND user_type="M"')->result();	
				$mentorPostId = array();
					foreach($myMentorPost as $mymentorPDtl){
						$mentorPostId[] =  $mymentorPDtl->post_id;
					}
					$impmyMentorPId = rtrim(implode($mentorPostId, ','),',');

// For Other Student posts
				// For Other Mentor
				foreach ($studentSubject as $value) {
					$otherMentorscount = $this->db->query('SELECT * FROM tb_students_subject WHERE subject_id='.$value->subject_id)->num_rows();
					if($otherMentorscount > 0){
					$otherMentors = $this->db->query('SELECT * FROM tb_students_subject WHERE subject_id='.$value->subject_id)->result();
					$otherMentor[] = $otherMentors[0]->student_id;
					}
				}
				$impotherMentorId = rtrim(implode($otherMentor, ','),',');



			$otherMentorPost = $this->db->query('SELECT post_id FROM tb_posts WHERE user_id IN('.$impotherMentorId.') AND user_type="S"')->result();
			$otherMentorPostId = array();
				foreach($otherMentorPost as $otherMentorpDtl){
					$otherMentorPostId[] =  $otherMentorpDtl->post_id;
				}
				$impotherPId = rtrim(implode($otherMentorPostId, ','),',');			

				$allPID = array_merge($mentorPostId,$otherMentorPostId);
				//print_r($allPID);
				$impAllUniqueId = rtrim(implode($allPID, ','),',');
			
			$AllUniquePosts = $this->db->query('SELECT * FROM tb_posts WHERE post_id IN('.$impAllUniqueId.') AND post_status=1 ORDER BY post_id DESC LIMIT 2')->result();
		
			$postDetailsMAtch = array();
			foreach($AllUniquePosts as $users){
				$newUserType = $users->user_type;
				if($newUserType == 'S'){
					$table = 'tb_students';
					$uid = 'student_id';
				} else{
					$table = 'tb_mentors';
					$uid = 'mentor_id';
				}
				$postlkcnt = $this->db->query("SELECT * FROM tb_post_save WHERE post_id=".$users->post_id." AND user_id=".$users->user_id." AND user_type='".$users->user_type."'")->num_rows();
				 if($postlkcnt > 0){
				 	$postlk = 1;
				 } else{
				 	$postlk = 0;
				 }
				 
				$postvw = $this->db->query("SELECT * FROM tb_post_view WHERE post_id=".$users->post_id)->num_rows();
				//$postlk = $this->db->query("SELECT * FROM tb_post_save WHERE post_id=".$post->post_id)->num_rows();
				$postcmnt = $this->db->query("SELECT * FROM tb_post_comments WHERE post_id=".$users->post_id)->num_rows();
				$userdetails = $this->db->query('SELECT * FROM '.$table.' WHERE '.$uid.'='.$users->user_id)->row();
					$postDetailsMAtch[] = array('postDetailsNEw' => $users, 'PostUsers'=>$userdetails, 'myLike' =>$postlk, 'totView' =>$postvw, 'totComnt' => $postcmnt);
				}
			
			header('Access-Control-Allow-Origin: *');
			echo json_encode(array('success' => 1, "allpost" => $postDetailsMAtch));
			
		}
	}

	public function mentorTimelineLazy()
	{
		if ($this->input->post('userId') != '') {
			$userId = $this->input->post('userId');
			$userType = 'M';
			$ofst = $this->input->post('postcount');
			$studentSubject = $this->db->query('SELECT * FROM tb_mentors_subject WHERE mentor_id='.$userId)->result();

// For Mentor posts

				$myMentorPost = $this->db->query('SELECT post_id FROM tb_posts WHERE user_id='.$userId.' AND user_type="M"')->result();	
				$mentorPostId = array();
					foreach($myMentorPost as $mymentorPDtl){
						$mentorPostId[] =  $mymentorPDtl->post_id;
					}
					$impmyMentorPId = rtrim(implode($mentorPostId, ','),',');

// For Other Student posts
				// For Other Mentor
				foreach ($studentSubject as $value) {
					$otherMentorscount = $this->db->query('SELECT * FROM tb_students_subject WHERE subject_id='.$value->subject_id)->num_rows();
					if($otherMentorscount > 0){
					$otherMentors = $this->db->query('SELECT * FROM tb_students_subject WHERE subject_id='.$value->subject_id)->result();
					$otherMentor[] = $otherMentors[0]->student_id;
					}
				}
				$impotherMentorId = rtrim(implode($otherMentor, ','),',');



			$otherMentorPost = $this->db->query('SELECT post_id FROM tb_posts WHERE user_id IN('.$impotherMentorId.') AND user_type="S"')->result();
			$otherMentorPostId = array();
				foreach($otherMentorPost as $otherMentorpDtl){
					$otherMentorPostId[] =  $otherMentorpDtl->post_id;
				}
				$impotherPId = rtrim(implode($otherMentorPostId, ','),',');			

				$allPID = array_merge($mentorPostId,$otherMentorPostId);
				//print_r($allPID);
				$impAllUniqueId = rtrim(implode($allPID, ','),',');
			
			$AllUniquePosts = $this->db->query('SELECT * FROM tb_posts WHERE post_id IN('.$impAllUniqueId.') AND post_status=1 ORDER BY post_id DESC LIMIT 4 OFFSET '.$ofst)->result();
		
			$postDetailsMAtch = array();
			foreach($AllUniquePosts as $users){
				$newUserType = $users->user_type;
				if($newUserType == 'S'){
					$table = 'tb_students';
					$uid = 'student_id';
				} else{
					$table = 'tb_mentors';
					$uid = 'mentor_id';
				}
				$postlkcnt = $this->db->query("SELECT * FROM tb_post_save WHERE post_id=".$users->post_id." AND user_id=".$users->user_id." AND user_type='".$users->user_type."'")->num_rows();
				 if($postlkcnt > 0){
				 	$postlk = 1;
				 } else{
				 	$postlk = 0;
				 }
				 
				$postvw = $this->db->query("SELECT * FROM tb_post_view WHERE post_id=".$users->post_id)->num_rows();
				//$postlk = $this->db->query("SELECT * FROM tb_post_save WHERE post_id=".$post->post_id)->num_rows();
				$postcmnt = $this->db->query("SELECT * FROM tb_post_comments WHERE post_id=".$users->post_id)->num_rows();
				$userdetails = $this->db->query('SELECT * FROM '.$table.' WHERE '.$uid.'='.$users->user_id)->row();
					$postDetailsMAtch[] = array('postDetailsNEw' => $users, 'PostUsers'=>$userdetails, 'myLike' =>$postlk, 'totView' =>$postvw, 'totComnt' => $postcmnt);
				}
			
			header('Access-Control-Allow-Origin: *');
			echo json_encode(array('success' => 1, "allpost" => $postDetailsMAtch));
			
		}
	}

	public function guardianTimeline()
	{
		if ($this->input->post('userId') != '') {
			$userId = $this->input->post('userId');
			$userType = 'G';
			$student = $this->db->query('SELECT * FROM tb_guardian a JOIN tb_students b ON a.guardian_mobile=b.guardian_phone WHERE a.guardian_id='.$userId)->result();
			$stud = array();
			foreach($student As $stds){
				$stud[] = $stds->student_id;
			}
			$impStd = implode($stud,',');

// For Mentor posts

				$mybetasPost = $this->db->query('SELECT * FROM tb_posts WHERE user_id IN('.$impStd.') AND user_type="S"')->result();	
				
		
			$postDetailsMAtch = array();
			foreach($mybetasPost as $users){
				$newUserType = $users->user_type;
				if($newUserType == 'S'){
					$table = 'tb_students';
					$uid = 'student_id';
				} else{
					$table = 'tb_mentors';
					$uid = 'mentor_id';
				}
				$postlkcnt = $this->db->query("SELECT * FROM tb_post_save WHERE post_id=".$users->post_id." AND user_id=".$users->user_id." AND user_type='".$users->user_type."'")->num_rows();
				 if($postlkcnt > 0){
				 	$postlk = 1;
				 } else{
				 	$postlk = 0;
				 }
				 
				$postvw = $this->db->query("SELECT * FROM tb_post_view WHERE post_id=".$users->post_id)->num_rows();
				//$postlk = $this->db->query("SELECT * FROM tb_post_save WHERE post_id=".$post->post_id)->num_rows();
				$postcmnt = $this->db->query("SELECT * FROM tb_post_comments WHERE post_id=".$users->post_id)->num_rows();
				$userdetails = $this->db->query('SELECT * FROM '.$table.' WHERE '.$uid.'='.$users->user_id)->row();
					$postDetailsMAtch[] = array('postDetailsNEw' => $users, 'PostUsers'=>$userdetails, 'myLike' =>$postlk, 'totView' =>$postvw, 'totComnt' => $postcmnt);
				}
			
			header('Access-Control-Allow-Origin: *');
			echo json_encode(array('success' => 1, "allpost" => $postDetailsMAtch));
			
		}
	}



	public function send_sms($base_url, $post_fields)
	{
		$ch = curl_init();
        //echo $sms_massage;
		curl_setopt($ch, CURLOPT_URL, $base_url);
		curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $post_fields);
        // receive server response ...
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		$server_output = curl_exec($ch);
		$server_output;
		curl_close($ch);
	}

	public function contactSubmit()
	{
		$name = $this->input->post('name');
		$email = $this->input->post('email');
		$desp = $this->input->post('message');
		$phone = $this->input->post('phone');

		$students_array = array(
			"name" => $name,
			"email" => $email,
			"msg" => $desp,
			"phone" => $phone,
			"created_date" => date('Y-m-d'),
			"created_time" => date('H:i:s')
		);

		$student_id = $this->common_model->addRecord('td_contact', $students_array);

		$to="sourav.projukti@gmail.com";
		$subject=$name." Contacted From Guru Siksha";
		$note = 'Contact From Guru Siksha';
		$message = '<table align="center" width="700" style="border:outset #B1F05E;">
  
  <tr>
    <td style="font-family:Arial, Helvetica, sans-serif; font-size:14px; text-align:left; padding:10px;"><span style="font-family:Arial, Helvetica, sans-serif; font-size:14px; color:#666666; font-weight:normal;  width:150px;">Name : '.$name.'</span></td>
  </tr>
  <tr>
    <td style="font-family:Arial, Helvetica, sans-serif; font-size:14px; text-align:left; padding:10px;"><span style="font-family:Arial, Helvetica, sans-serif; font-size:14px; color:#666666; font-weight:normal;  width:150px;">Email : '.$email.'</span></td>
  </tr>
  <tr>
    <td style="font-family:Arial, Helvetica, sans-serif; font-size:14px; text-align:left; padding:10px;"><span style="font-family:Arial, Helvetica, sans-serif; font-size:14px; color:#666666; font-weight:normal;  width:150px;">Description : '.$desp.'</span></td>
  </tr>
  <tr>
    <td style="font-family:Arial, Helvetica, sans-serif; font-size:14px; text-align:left; padding:10px;"><span style="font-family:Arial, Helvetica, sans-serif; font-size:14px; color:#666666; font-weight:normal;  width:150px;">Phone : '.$phone.'</span></td>
  </tr>
 
 
  
</table>';


       $result = $this->sendemail($to,$subject,$message,$note);
        if($result){
        	$return_json = array('status' => 1);
		header('Access-Control-Allow-Origin: *');
		echo json_encode($return_json);
        }

	}

	public function enquirySubmit()
	{
		$userId = $this->input->post('userId');
		$userType = $this->input->post('userType');
		if($userType == 'S'){
			$table = 'tb_students';
			$uid = 'student_id';
		} elseif($userType == 'M'){
			$table = 'tb_mentors';
			$uid = 'mentor_id';
		} else{
			$table = 'tb_guardian';
			$uid = 'guardian_id';
		}
		$udata = $this->db->query('SELECT * FROM '.$table.' WHERE '.$uid.'='.$userId)->row();
		if($userType == 'S'){
			$name = $udata->name;
			$email = $udata->email;
			$phone = $udata->mobile;
		} elseif($userType == 'M'){
			$name = $udata->mentor_name;
			$email = $udata->mentor_email;
			$phone = $udata->mentor_mobile;
		} else{
			$name = $udata->guardian_name;
			$email = $udata->guardian_email;
			$phone = $udata->guardian_mobile;
		}
		
		$desp = $this->input->post('message');
		

		$students_array = array(
			"name" => $name,
			"email" => $email,
			"msg" => $desp,
			"phone" => $phone,
			"created_date" => date('Y-m-d'),
			"created_time" => date('H:i:s')
		);

		$student_id = $this->common_model->addRecord('td_enquery', $students_array);

		$to="sourav.projukti@gmail.com";
		$subject=$name." hane an enquery From Guru Siksha";
		$note = 'Enquery From Guru Siksha';
		$message = '<table align="center" width="700" style="border:outset #B1F05E;">
  
  <tr>
    <td style="font-family:Arial, Helvetica, sans-serif; font-size:14px; text-align:left; padding:10px;"><span style="font-family:Arial, Helvetica, sans-serif; font-size:14px; color:#666666; font-weight:normal;  width:150px;">Name : '.$name.'</span></td>
  </tr>
  <tr>
    <td style="font-family:Arial, Helvetica, sans-serif; font-size:14px; text-align:left; padding:10px;"><span style="font-family:Arial, Helvetica, sans-serif; font-size:14px; color:#666666; font-weight:normal;  width:150px;">Email : '.$email.'</span></td>
  </tr>
  <tr>
    <td style="font-family:Arial, Helvetica, sans-serif; font-size:14px; text-align:left; padding:10px;"><span style="font-family:Arial, Helvetica, sans-serif; font-size:14px; color:#666666; font-weight:normal;  width:150px;">Description : '.$desp.'</span></td>
  </tr>
  <tr>
    <td style="font-family:Arial, Helvetica, sans-serif; font-size:14px; text-align:left; padding:10px;"><span style="font-family:Arial, Helvetica, sans-serif; font-size:14px; color:#666666; font-weight:normal;  width:150px;">Phone : '.$phone.'</span></td>
  </tr>
 
 
  
</table>';


       $result = $this->sendemail($to,$subject,$message,$note);
        if($result){
        	$return_json = array('status' => 1);
		header('Access-Control-Allow-Origin: *');
		echo json_encode($return_json);
        }

	}

	private function sendemail($to,$subject,$mailBody,$note)
   {
        $config = Array(
           'protocol' => 'smtp',
           'smtp_host' => 'mail.guru-siksha.com',
           'smtp_port' => 587,
           'smtp_user' => 'no-reply@guru-siksha.com',
           'smtp_pass' => '=Dq}W!jNl{,{',
           'mailtype'  => 'html', 
           'charset'   => 'iso-8859-1'
       );
       $this->load->library('email', $config);

       $this->email->from('no-reply@guru-siksha.com', $note);
       $this->email->to($to); 
       $this->email->subject($subject);
       $this->email->message($mailBody);  
       $this->email->set_mailtype("html");
    //    $attched_file= $_SERVER["DOCUMENT_ROOT"]."/uploads/".$file;
	   // $this->email->attach($attched_file);
   	   return $this->email->send(); 
   }



	// This Function For Post
	public function submitPost()
	{
		$userId = $this->input->post('userId');
		$userType = $this->input->post('userType');
		$image = $this->input->post('img');
		$post = $this->input->post('post');
		$this->load->helper("url");

		if($image){
			list($type, $image) = explode(';', $image);
			list(, $image) = explode(',', $image);
			$image = base64_decode($image);

			$tm = time();
			file_put_contents($_SERVER['DOCUMENT_ROOT'] . '/uploads/posts/' . $userId . $tm . '.jpeg', $image);
			$image = $userId . $tm . '.jpeg';
		}

		$object = array(
			'user_id' => $userId,
			'user_type' => $userType,
			'post_content' => $post,
			'post_image' => $image,
			'created_date' => date('l'),
			'created_time' => date('H:i'),
			'create_date_full' => date('d-m-Y h:i:s'),
			'post_status' => 1
		);

		$this->db->insert('tb_posts', $object);
		

		$return_json = array('status' => 1);
		header('Access-Control-Allow-Origin: *');
		echo json_encode($return_json);
	}

	public function sendChat()
	{
		$userId = $this->input->post('userId');
		$userType = $this->input->post('userType');
		$post = $this->input->post('message');

		$object = array(
			'from_id' => $userId,
			'user_type' => $userType,
			'to_id' => 0,
			'msg' => $post,
			'chat_date' => date('Y-m-d'),
			'chat_time' => date('h:i:s a'),
			'is_read' => 0
		);
		$this->db->insert('td_chat', $object);
		
		$return_json = array('status' => 1);
		header('Access-Control-Allow-Origin: *');
		echo json_encode($return_json);
	}

public function getChat()
	{
		$userId = $this->input->post('userId');
		$userType = $this->input->post('userType');
		$upchat = $this->db->query('UPDATE td_chat SET is_read=1 WHERE from_id='.$userId.' OR to_id='.$userId);
		$ptype = $this->db->query('SELECT * FROM td_chat WHERE (from_id='.$userId.' OR to_id='.$userId.') AND (user_type="'.$userType.'" OR user_type="A") ORDER BY chat_date DESC,chat_time')->result();
			header('Access-Control-Allow-Origin: *');
			if($ptype){
			echo json_encode(array('success' => 1,"chatDetails"=>$ptype));
			} else {
				echo json_encode(array('success' => 0));
			}

	}

	public function getLastChat()
	{
		$userId = $this->input->post('userId');
		$userType = $this->input->post('userType');
		$ptype = $this->db->query('SELECT * FROM td_chat WHERE from_id='.$userId.' OR to_id="'.$userId.'" ORDER BY chat_id DESC LIMIT 1')->result();
			header('Access-Control-Allow-Origin: *');
			if($ptype){
			echo json_encode(array('success' => 1,"chatDetails"=>$ptype));
			} else {
				echo json_encode(array('success' => 0));
			}

	}
	public function currentAssigment()
	{
		$userId = $this->input->post('userId');
		
		$ptype = $this->db->query('SELECT * FROM tb_students_subject WHERE student_id='.$userId)->result();
		foreach ($ptype as $subjects) {
			$subIds[] = $subjects->subject_id;
		}
		$impSubIds = implode($subIds,',');
		$currentAssessment = $this->db->query('SELECT a.*, b.*,c.* FROM tb_self_assesment AS a JOIN tb_subject AS b ON a.subject_id=b.subject_id RIGHT JOIN tb_chapter AS c ON a.chapter_id=c.chapter_id WHERE a.subject_id IN('.$impSubIds.')')->result();

			header('Access-Control-Allow-Origin: *');
			if($currentAssessment){
			echo json_encode(array('success' => 1,"cassment"=>$currentAssessment));
			} else {
				echo json_encode(array('success' => 0));
			}

	}

	public function takeExam()
	{
		$userId = $this->input->post('examId');
		
		$ptype = $this->db->query('SELECT * FROM tb_self_assesment_q WHERE assmnt_id='.$userId)->result();
		
		$question = array();
		foreach($ptype AS $qtion){
			$currentAssessment = $this->db->query('SELECT * FROM tb_assesments_opt WHERE assmnt_q_id='.$qtion->assmnt_q_id)->result();
			$question[] = array('quest' => $qtion, 'opts' => $currentAssessment);
		}
		

			header('Access-Control-Allow-Origin: *');
			if($currentAssessment){
			echo json_encode(array('success' => 1,"cassment"=>$question));
			} else {
				echo json_encode(array('success' => 0));
			}

	}
	public function submitExam(){
		$userId = $this->input->post('userId');
		$eid = $this->input->post('examId');
		$ans = $this->input->post('answer');
		$ansCount = count($ans);
		for($i=0;$i<$ansCount; $i++){
			$expAns = explode('-',$ans[$i]);
			$currVal = $this->db->query('SELECT * FROM tb_self_assesment_q WHERE assmnt_id='.$expAns[0].' AND assmnt_q_id='.$expAns[1])->row();
			if($expAns[2] == $currVal->answer){
				$yes = 'y';
			}else{
				$yes = 'N';
			}
			$object = array(
			'user_id' => $userId,
			'assesment_id' => $expAns[0],
			'question_id' => $expAns[1],
			'opt_val' => $expAns[2],
			'curr_val' => $currVal->answer,
			'rest' => $yes,
			'exam_date' => date('Y-m-d'),
			'exam_time' => date('h:i:s a')
		);
		$this->db->insert('td_exam', $object);
		
		}
		$ansCount = $this->db->query('SELECT * FROM td_exam WHERE user_id='.$userId.' AND assesment_id='.$eid.' AND rest="y" AND is_complete=0')->num_rows();
		$upComplete = $this->db->query('UPDATE td_exam SET is_complete=1 WHERE user_id='.$userId.' AND assesment_id='.$eid.' AND is_complete=0');

		header('Access-Control-Allow-Origin: *');
			
			echo json_encode(array('success' => 1, 'result' => $ansCount));
			
	}

	public function progressReport()
	{
		$userId = $this->input->post('userId');
		
		$ansCount = $this->db->query('SELECT * FROM td_exam WHERE user_id='.$userId.' AND rest="y" AND is_complete=1 GROUP BY exam_date')->num_rows();
		if($ansCount <2){
			$ansCountatr = $this->db->query('SELECT * FROM td_exam WHERE user_id='.$userId.' AND rest="y" AND is_complete=1')->num_rows();
			$ansCountatrarray = $this->db->query('SELECT exam_date FROM td_exam WHERE user_id='.$userId.' AND rest="y" AND is_complete=1 GROUP BY exam_date')->row();
			$atr = '{"'.$ansCountatr.'"}';
			$datearr[] = $ansCountatrarray->exam_date;
		}else{
			$ansCountatr = $this->db->query('SELECT exam_date FROM td_exam WHERE user_id='.$userId.' AND rest="y" AND is_complete=1 GROUP BY exam_date')->result();
			foreach ($ansCountatr AS $valatr) {
				$ansarray = $this->db->query('SELECT * FROM td_exam WHERE user_id='.$userId.' AND rest="y" AND is_complete=1 AND exam_date="'.$valatr->exam_date.'"')->num_rows();
				$strarr[] = $ansarray;
				$datearr[] = $valatr->exam_date;
			}
			$impatrarray = implode($strarr, '","');
			$atr = $strarr;
			// $atr = '{"'.$impatrarray.'"}';
		}
		
			header('Access-Control-Allow-Origin: *');
			
			echo json_encode(array('success' => 1,"result"=>$atr, "dts" => $datearr));
			

	}

	public function myMentors()
	{
		$userId = $this->input->post('userId');
		
		$mentCount = $this->db->query('SELECT * FROM tb_current_course WHERE user_id='.$userId)->num_rows();
		if($mentCount > 0){
			$mentors = $this->db->query('SELECT a.*, b.*,c.* FROM tb_current_course AS a JOIN tb_mentors AS b ON a.mentor=b.mentor_id RIGHT JOIN tb_subject AS c ON a.subject=c.subject_id WHERE a.user_id='.$userId.' AND a.class_status=1')->result();
			$mentquery = $this->db->query('SELECT a.*,b.* FROM td_special_query AS a JOIN tb_mentors AS b ON a.mentor_id=b.mentor_id WHERE a.user_id='.$userId)->result();
			$cnt = 1;
		} else{
			$cnt = 0;
			$mentors = 0;
			$mentquery = 0;
		}
			header('Access-Control-Allow-Origin: *');
			echo json_encode(array('success' => $cnt,"mentors"=>$mentors, 'query' => $mentquery));
			

	}

	public function mentorRate(){
		$userId = $this->input->post('userId');
		$mid = $this->input->post('mentorId');
		$rate = $this->input->post('rate');
		$utype = $this->input->post('userType');

			$object = array(
			'user_id' => $userId,
			'mentor_id' => $mid,
			'rate' => $rate,
			'utype' => $utype,
			'r_date' => date('Y-m-d'),
			'r_time' => date('h:i:s a'),
			'status' => 1
		);
		$rest = $this->db->insert('td_mentor_rate', $object);
		if($rest){
			$cnt = 1;
		} else{
			$cnt = 2;
		}
		header('Access-Control-Allow-Origin: *');
		echo json_encode(array('success' => $cnt));

	}

	public function myStudents()
	{
		$userId = $this->input->post('userId');
		
		$mentCount = $this->db->query('SELECT * FROM tb_current_course WHERE mentor='.$userId)->num_rows();
		if($mentCount > 0){
			$students = $this->db->query('SELECT a.*, b.*,c.* FROM tb_current_course AS a JOIN tb_students AS b ON a.user_id=b.student_id RIGHT JOIN tb_subject AS c ON a.subject=c.subject_id WHERE a.mentor='.$userId)->result();
			$mentquery = $this->db->query('SELECT a.*,b.* FROM td_special_query AS a JOIN tb_students AS b ON a.user_id=b.student_id WHERE a.user_id='.$userId)->result();
			$cnt = 1;
		} else{
			$cnt = 0;
			$students = 0;
			$mentquery = 0;

		}
			header('Access-Control-Allow-Origin: *');
			echo json_encode(array('success' => $cnt,"mentors"=>$students, 'query' => $mentquery));
			

	}

	public function submitQuery(){
		$userId = $this->input->post('userId');
		$mentor = $this->input->post('mentorId');
		$msg = $this->input->post('message');
		
		
			$object = array(
			'user_id' => $userId,
			'mentor_id' => $mentor,
			'message' => $msg,
			'q_date' => date('Y-m-d'),
			'q_time' => date('h:i:s a'),
			'status' => 1
		);
		$rest = $this->db->insert('td_special_query', $object);
	
		if($rest){
			$cnt = 1;
		}
		else{
			$cnt = 0;
		}

		header('Access-Control-Allow-Origin: *');
		echo json_encode(array('success' => $cnt));
			
	}

	public function question()
	{
		$userId = $this->input->post('qid');
			$mentquery = $this->db->query('SELECT a.*,b.* FROM td_special_query AS a JOIN tb_students AS b ON a.user_id=b.student_id WHERE a.qid='.$userId)->result();
			$cnt = 1;
			header('Access-Control-Allow-Origin: *');
			echo json_encode(array('success' => $cnt,'query' => $mentquery));
	}
	public function questionReply()
	{
		$userId = $this->input->post('qid');
		$rply = $this->input->post('message');
			$mentquery = $this->db->query('UPDATE td_special_query SET reply="'.$rply.'" WHERE qid='.$userId);
			$cnt = 1;
			header('Access-Control-Allow-Origin: *');
			echo json_encode(array('success' => $cnt));
	}

	public function mentorList()
	{
		$userId = $this->input->post('userId');
		$myMentors = $this->db->query('SELECT * FROM tb_current_course WHERE user_id='.$userId)->result();
		
		foreach ($myMentors as $mymentrs) {
			$myments[] = $mymentrs->mentor;
		}
		$mySubjects = $this->db->query('SELECT * FROM tb_students_subject WHERE student_id='.$userId)->result();
		foreach ($mySubjects as $subjects) {
			$mysub[] = $subjects->subject_id;
		}
		$impSub = implode($mysub,',');
		$otherMentors = $this->db->query('SELECT * FROM tb_mentors_subject WHERE subject_id IN('.$impSub.')')->result();
		foreach ($otherMentors as $oment) {
			$othMent[] = $oment->mentor_id;
		}
		$fmentorsCount = $this->db->query('SELECT * FROM tbl_followers WHERE user_id='.$userId)->num_rows();
		if($fmentorsCount > 0){
			$fmentors = $this->db->query('SELECT * FROM tbl_followers WHERE user_id='.$userId)->result();
		foreach ($fmentors as $flwmentors) {
			$flwment[] = $flwmentors->mentor_id;
		}
		}
			
			if($fmentorsCount > 0){
				$uniqueMentors = array_unique(array_diff($othMent,$myments));
				$secunique = array_unique(array_diff($uniqueMentors,$flwment));
				$mlist = $secunique;
			}else{
				$uniqueMentors = array_unique(array_diff($othMent,$myments));
				$mlist = $uniqueMentors;
			}
			
		if(count($mlist) > 0){
			$impUnique = implode($mlist,',');
		// print_r($uniqueMentors);
			$mentquerylist = $this->db->query('SELECT * FROM tb_mentors WHERE mentor_id IN('.$impUnique.')')->result();
			$mentArr = array();
			foreach($mentquerylist AS $mid){
			$rattings = $this->db->query("SELECT DISTINCT(rate) FROM td_mentor_rate WHERE mentor_id=".$mid->mentor_id)->result();

				//print_r($rattings); die;
				$totRate = '';
				$dividedBy = '';
				$finalRate = '';

				if(!empty($rattings))
				{

				foreach($rattings as $rates){

				$star = $rates->rate;
				$count = $this->db->query("SELECT * FROM td_mentor_rate WHERE mentor_id=".$mid->mentor_id." AND rate=".$rates->rate)->num_rows();

				$totRate+=$star*$count;
				$dividedBy+=$count; 


				}

				$finalRate = ($totRate/$dividedBy);

				$finalRate = number_format((float)$finalRate, 1, '.', '');


				}
				if($finalRate == ""){
					$murate = 0;
				} else{
					$murate = $finalRate;
				}
				$mentArr[] = array('mentors' => $mid, 'mrate' => $murate);

			}
			
			header('Access-Control-Allow-Origin: *');
			echo json_encode(array('success' => 1,'mentlist'=>$mentArr));
		}
		else{
			header('Access-Control-Allow-Origin: *');
			echo json_encode(array('success' => 0));
		}
		 
		 
	}


	public function submitFollow(){
		$userId = $this->input->post('userId');
		$mentor = $this->input->post('mentorId');
		
		
			$object = array(
			'user_id' => $userId,
			'mentor_id' => $mentor,
			'user_type' => 'S',
			'created_date' => date('Y-m-d'),
			'created_time' => date('h:i:s a'),
			'status' => 1
		);
		$rest = $this->db->insert('tbl_followers', $object);
	
		if($rest){
			$cnt = 1;
		}
		else{
			$cnt = 0;
		}
		$stud = $this->db->query('SELECT * FROM tb_students WHERE student_id='.$userId)->row();
		$title = 'You have a new follower';
		$msg = $stud->name.' followed you just now';
		$this->push_send_tool($title,$msg,$mentor);
		header('Access-Control-Allow-Origin: *');
		echo json_encode(array('success' => $cnt));
			
	}

	public function push_send_tool($til,$msg,$mid){
		$smstype = 'all';
		$sms = $msg;
		$title = $til;
		//$rcv_no = $this->input->post('candidate');
		
		$url = 'https://fcm.googleapis.com/fcm/send';
		//echo "SELECT * FROM tb_mentors WHERE mentor_id=".$mid;
    		$query= $this->db->query("SELECT * FROM tb_mentors WHERE mentor_id=".$mid)->result();
		    		
	
		if($query)
		{		
			foreach($query as $list){
				//echo $list->mentor_id;die;
				$fields1 = array(
							'push_msg' => $sms,
							'push_title' => $title,
							'push_device' => 'NA',
							'candidate_id' => $mid,
							'phone' => 'NA',
							'sent_date' => date("F").' '.date('d'),
							'sent_time' => date('g:i:s A'),
							'read_stat' => 0,
							);	
				$sender = $this->db->insert('tbl_push', $fields1);
					
					$lid = $this->db->insert_id();

				$fields = array (
				'registration_ids' => array($list->token),
				'data' => array (
						'noti_id' => $lid
				),
				'notification' => array(
					'title' => $title,
					'body' => $sms,
					'sound' => 'default',
					'color' => '#993682',
					'click_action' => 'FCM_PLUGIN_ACTIVITY',
					'icon' => 'fcm_push_icon'
				)
				);
			$fields = json_encode ($fields);
			
			$headers = array (
					'Authorization: key=' . "AIzaSyD-6zt4YIwdZriY9m3u2CH51IysBfYT1Bs",
					'Content-Type: application/json'
			);
		
			$ch = curl_init ();
			curl_setopt ( $ch, CURLOPT_URL, $url );
			curl_setopt ( $ch, CURLOPT_POST, true );
			curl_setopt ( $ch, CURLOPT_HTTPHEADER, $headers );
			curl_setopt ( $ch, CURLOPT_RETURNTRANSFER, true );
			curl_setopt ( $ch, CURLOPT_POSTFIELDS, $fields );
		
			$result = curl_exec ( $ch );
			//echo $result;
			curl_close ( $ch );
			}
		}	

	}


}
