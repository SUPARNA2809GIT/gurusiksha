<?php

defined('BASEPATH') OR exit('No direct script access allowed');



class View extends CI_Controller {



   public function __construct() {



		parent::__construct();

		$this->load->helper(array('url','form','html','text'));

		$this->load->library(array('session','form_validation','pagination','email'));

		$this->load->model(array('common_model'));

		if($this->session->userdata('ADMIN_ID') =='') {



         redirect('login');



		}

		

	}

	



	public function student()
	{

		$user_id = $this->uri->segment(3);

		$data['v']=$this->db->query("SELECT * FROM tb_students WHERE student_id=".$user_id)->row();

		//print_r($data['v']); die;

		//Chart


		$result = $this->db->query("SELECT * FROM td_exam WHERE user_id=".$user_id." AND is_complete=1 GROUP BY exam_date")->result();
		
// 		echo $this->db->last_query(); die;

		if(!empty($result))
		{ 
			foreach($result as $key => $value)
			{

				$questionsNo = $this->db->query("SELECT * FROM td_exam WHERE user_id=".$user_id." AND exam_date='".$value->exam_date."'")->num_rows();

				$currectQuestionsNo = $this->db->query("SELECT * FROM td_exam WHERE user_id=".$user_id." AND exam_date='".$value->exam_date."' AND rest='y'")->num_rows();

				$numbers[] = number_format(($currectQuestionsNo/$questionsNo)*100);
				$dates[] = date('d F y',strtotime($value->exam_date));

				
			}

		$data['numbers'] = json_encode($numbers);
			$data['date'] = json_encode($dates);
			$data['result'] = $result;

		
		}


		$data['transactions'] = $this->db->query("SELECT * FROM tb_transaction a 
										 INNER JOIN tb_students b ON a.user_id=b.student_id
										 INNER JOIN tb_mentors c ON a.mentor=c.mentor_id
										 INNER JOIN tb_class d ON a.class_id=d.class_id
										 INNER JOIN tb_subject e ON a.subject=e.subject_id
										 INNER JOIN tb_teaching_time f ON a.time=f.time_id
		 								 WHERE a.user_id=".$user_id." AND d.class='".$data['v']->class."'")->result();


		$studetDet = $this->db->query("SELECT * FROM td_chat WHERE (from_id=".$user_id." OR to_id=".$user_id.") AND ( user_type='S' OR to_user_type='S') ORDER BY chat_id DESC LIMIT 1")->row();
		if(!empty($studetDet))
		{
			$data['AllStudents'] = $studetDet;
		}




		//print_r($data['transactions']); die;

		$this->load->view('cdms/stud_reg_view',$data);

	}


	public function getAssesmentDetails()
	{

		$user_id      = $this->input->post('userId');
		$assesment_id = $this->input->post('assesmentId');
		$examDate     = $this->input->post('examDate');


	    $result = $this->db->query("SELECT * FROM td_exam WHERE user_id=".$user_id." AND assesment_id=".$assesment_id." AND $examDate='".$examDate."'")->result();	



			$html='<table id="example" class="table table-striped table-bordered" style="width:100%">
					<thead>
					  <tr>
					    <th>#</th>
					    <th>Question</th>
					    <th>Answer</th>
					    <th>Currect Answer</th>
					  </tr>
					</thead>
					<tbody>';


					foreach ($result as $key => $value) {

						$questions = $this->db->query("SELECT * FROM tb_self_assesment_q WHERE assmnt_q_id=".$value->question_id)->row();
						
						$html.='<tr>
							    <td>'.($key+1).'</td>
							    <td>'.$question->question.'</td>
							    <td>'.$value->opt_val.'</td>
							    <td>'.$value->curr_val.'</td>
							  </tr>';
					}
					  
				$html.='</tbody>
				</table>';


		echo $html;




	}





	public function mentor()
	{

		$id = $this->uri->segment(3);
		$data['v']=$this->db->query("SELECT * FROM tb_mentors WHERE mentor_id=".$id)->row();


		$data['transactions'] = $this->db->query("SELECT * FROM tb_transaction a 
										 INNER JOIN tb_students b ON a.user_id=b.student_id
										 INNER JOIN tb_mentors c ON a.mentor=c.mentor_id
										 INNER JOIN tb_class d ON a.class_id=d.class_id
										 INNER JOIN tb_subject e ON a.subject=e.subject_id
										 INNER JOIN tb_teaching_time f ON a.time=f.time_id
		 								 WHERE a.mentor=".$id)->result();

		$this->load->view('cdms/mentor-view',$data);



	}



	public function guardian()

	{

		$id = $this->uri->segment(3);

		$data['v']=$this->db->query("SELECT * FROM tb_guardian WHERE guardian_id=".$id)->row();

		$this->load->view('cdms/guardian-view',$data);



	}

	public function Enquiry()

	{

		
		$data['contact'] = $this->db->query('SELECT * FROM td_enquery ORDER BY cid DESC')->result();
		$this->load->view('cdms/enquiry-view',$data);



	}

	public function Contact()

	{

		$data['contact'] = $this->db->query('SELECT * FROM td_contact ORDER BY cid DESC')->result();

		$this->load->view('cdms/contact-view',$data);



	}

	public function chat()
	{

		$data = array();
		$allStu = array();
		$allMent = array();
		$allGur = array();

		
		$students = $this->db->query("SELECT * FROM tb_students")->result();

		foreach ($students as $stu) {

			$studetDet = $this->db->query("SELECT * FROM td_chat WHERE (from_id=".$stu->student_id." OR to_id=".$stu->student_id.") AND ( user_type='S' OR to_user_type='S') ORDER BY chat_id DESC LIMIT 1")->row();
			if(!empty($studetDet))
			{
				$allStu[] = $studetDet;
			}

		}


		$mentors = $this->db->query("SELECT * FROM tb_mentors")->result();
		foreach ($mentors as $ment) {
			$mentDet = $this->db->query("SELECT * FROM td_chat WHERE (from_id=".$ment->mentor_id." OR to_id=".$ment->mentor_id.") AND ( user_type='M' OR user_type='M') ORDER BY chat_id DESC")->row();

			if(!empty($mentDet))
			{
				$allMent[] = $mentDet;
			}
		}



		$guardians = $this->db->query("SELECT * FROM tb_guardian")->result();

		foreach ($guardians as $gur) {
			$gueDet = $this->db->query("SELECT * FROM td_chat WHERE (from_id=".$gur->guardian_id." OR to_id=".$gur->guardian_id.") AND ( user_type='G' OR user_type='G') ORDER BY chat_id DESC")->row();
			if(!empty($gueDet))
			{
				$allGur[] = $gueDet;
			}
		}

		$data['AllStudents']  = $allStu;
		$data['AllMentors']   = $allMent;
		$data['AllGuardians'] = $allGur;


		//print_r($data['AllMentors']); die;

		
		$this->load->view('cdms/chat-view',$data);
	}


	public function chatDeatils()
	{
		$data['id'] = $this->input->post('user_id');
		$data['user_type'] = $this->input->post('type');
		$this->load->view('cdms/chat-details',$data);

	}

	public function student_payment()
	{
		$data = array();
		$data['students'] = $this->db->query("SELECT * FROM tb_students")->result();
		$data['class'] = $this->db->query("SELECT * FROM tb_class ORDER BY class ASC")->result();
		$this->load->view('cdms/stud-pay-view',$data);

	}


	public function getStudentPayment()
	{
		$class_id = $this->input->post('class_id');
		$student_id = $this->input->post('student_id');

		$trans='<table id="example" class="table table-striped table-bordered" style="width:100%">
	            <thead>
	              <tr>
	                <th>#</th>
	                <th>Mentor</th>
	                <th>Class</th>
	                <th>Subject</th>
	                <th>Time</th>
	                <th>Fee(INR)</th>
	              </tr>
	            </thead>
	            <tbody>';
		if($class_id!='' && $student_id!='')
		{
			$transactions = $this->db->query("SELECT * FROM tb_transaction a 
											 INNER JOIN tb_students b ON a.user_id=b.student_id
											 INNER JOIN tb_mentors c ON a.mentor=c.mentor_id
											 INNER JOIN tb_class d ON a.class_id=d.class_id
											 INNER JOIN tb_subject e ON a.subject=e.subject_id
											 INNER JOIN tb_teaching_time f ON a.time=f.time_id
			 								 WHERE a.user_id=".$student_id." AND a.class_id=".$class_id)->result();

			foreach ($transactions as $k=>$v) {
				$trans.='<tr>
							<td>'.($k+1).'</td>
			                <td>'.$v->mentor_name.'</td>
			                <td>'.$v->class.'</td>
			                <td>'.$v->subject.'</td>
			                <td>'.date('h:i A', strtotime($v->time)).'</td>
			                <td>'.$v->mentorFee.'</td>
			              </tr>';
			}

			$trans.='</tbody>
	          </table>';

	        echo $trans;

		}

		
	}



	public function mentor_details()
	{
		$data = array();
		$data['mentor'] = $this->db->query("SELECT * FROM tb_mentors")->result();
		$this->load->view('cdms/mentor-pay-view',$data);
	}

	public function getMentorsPayment()
	{
		$mentor_id = $this->input->post('mentor_id');
		

		$trans='<table id="example" class="table table-striped table-bordered" style="width:100%">
	            <thead>
	              <tr>
	                <th>#</th>
	                <th>Student</th>
	                <th>Class</th>
	                <th>Subject</th>
	                <th>Time</th>
	                <th>Fee(INR)</th>
	              </tr>
	            </thead>
	            <tbody>';
		if($mentor_id!='')
		{
			$transactions = $this->db->query("SELECT * FROM tb_transaction a 
											 INNER JOIN tb_students b ON a.user_id=b.student_id
											 INNER JOIN tb_mentors c ON a.mentor=c.mentor_id
											 INNER JOIN tb_class d ON a.class_id=d.class_id
											 INNER JOIN tb_subject e ON a.subject=e.subject_id
											 INNER JOIN tb_teaching_time f ON a.time=f.time_id
			 								 WHERE a.mentor=".$mentor_id)->result();

			foreach ($transactions as $k=>$v) {
				$trans.='<tr>
							<td>'.($k+1).'</td>
			                <td>'.$v->name.'</td>
			                <td>'.$v->class.'</td>
			                <td>'.$v->subject.'</td>
			                <td>'.date('h:i A', strtotime($v->time)).'</td>
			                <td>'.$v->mentorFee.'</td>
			              </tr>';
			}

			$trans.='</tbody>
	          </table>';

	        echo $trans;

		}

		
	}

	public function assesment_details()
	{
		$data = array();
		$data['subjects'] = $this->db->query("SELECT * FROM tb_subject")->result();
		$data['dates']    = $this->db->query("SELECT DISTINCT(exam_date) FROM td_exam ORDER BY exam_date DESC")->result();
		$this->load->view('cdms/asses-rep-view',$data);
	}


	public function getAssesments()
	{
		$subject_id = $this->input->post('subject_id');
		$exam_date  =  $this->input->post('exam_date');

		$html='<table id="example" class="table table-striped table-bordered" style="width:100%">
	            <thead>
	              <tr>
					<th>#</th>
					<th>Student</th>
					<th>Class</th>
					<th>Subject</th>
					<th>Chapter</th>
					<th>Question Details</th>
					<th>Correct Answer</th>
					<th>Result</th>
	              </tr>
	            </thead>
	            <tbody>';

		if($subject_id!='' || $exam_date!='')
		{
			$assesments = $this->db->query("SELECT * FROM td_exam a INNER JOIN tb_self_assesment b ON a.assesment_id=b.assmnt_id WHERE b.subject_id=".$subject_id." AND exam_date='".$exam_date."' GROUP BY assesment_id ORDER BY exam_id ASC")->result();

			//print_r($assesments); die();

			foreach($assesments as $k=>$val)
			{

				$student  = $this->db->query("SELECT * FROM tb_students WHERE student_id=".$val->user_id)->row();
				$classR   = $this->db->query("SELECT * FROM tb_class WHERE class_id=".$val->class_id)->row();
				$subjectR = $this->db->query("SELECT * FROM tb_subject WHERE subject_id=".$val->subject_id)->row();
				$chapterR = $this->db->query("SELECT * FROM tb_chapter WHERE chapter_id=".$val->chapter_id)->row();


				$result = $this->db->query("SELECT * FROM td_exam WHERE user_id=".$val->user_id." AND assesment_id=".$val->assesment_id." AND exam_date='".$exam_date."'")->result();

				$ques='';
				$answer = '';
				$given = '';

				foreach ($result as $v) {

					$questions = $this->db->query("SELECT * FROM tb_self_assesment_q WHERE assmnt_q_id=".$v->question_id)->row();

					$ques.=$questions->question.'<hr>';
					$answer.=$v->curr_val.'<hr><br>';
					$given.=$v->opt_val.'<hr><br>';
					
				}

				$html.='<tr>
						<td>'.($k+1).'</td>
		                <td>'.$student->name.'</td>
		                <td>'.$classR->class.'</td>
		                <td>'.$subjectR->subject.'</td>
		                <td>'.$chapterR->chapter.'</td>
		                <td>'.$ques.'</td>
		                <td>'.$answer.'</td>
		                <td>'.$given.'</td>
		              </tr>';
			}

			$html.='</tbody>
	          </table>';
	        echo $html;

		}

	}


	public function progress_reports()
	{
		$data = array();
		$data['students'] = $this->db->query("SELECT * FROM tb_students")->result();
		$this->load->view('cdms/stud-progress-view',$data);
	}


	public function getProgressRep()
	{
		$user_id = $this->input->post('student_id');

		$result = $this->db->query("SELECT * FROM td_exam WHERE user_id=".$user_id." AND is_complete=1 GROUP BY exam_date")->result();

		if(!empty($result))
		{ 
			foreach($result as $key => $value)
			{

				$questionsNo = $this->db->query("SELECT * FROM td_exam WHERE user_id=".$user_id." AND exam_date='".$value->exam_date."'")->num_rows();

				$currectQuestionsNo = $this->db->query("SELECT * FROM td_exam WHERE user_id=".$user_id." AND exam_date='".$value->exam_date."' AND rest='y'")->num_rows();

				$numbers[] = number_format(($currectQuestionsNo/$questionsNo)*100);
				$dates[] = date('d F y',strtotime($value->exam_date));

				
			}

			echo json_encode(array("numbers"=>$numbers,"date"=>$dates));
		}
		else
		{
			echo 0;
		}

		
	}


	public function chatAdd()
	{
		$user_id = $this->input->post('user_id');
		$type = $this->input->post('type');
		$message = $this->input->post('message');

		//SELECT `chat_id`, `from_id`, `user_type`, `to_id`, `to_user_type`, `msg`, `is_read`, `chat_date`, `chat_time` FROM `td_chat` WHERE 1

		$array = array("from_id"=>0,
	                    "user_type"=>'A',
	                    "to_id"=>$user_id,
	                    "to_user_type"=>$type,
	                    "msg"=>$message,
	                    "is_read"=>0,
	                    "chat_date"=>date('Y-m-d'),
	                    "chat_time"=>date('H:i:s')
	                    );
        $chatId = $this->common_model->addRecord('td_chat',$array);

        if($chatId!='')
        {
        	echo $html='<li class="replies"> <img src="http://guru-siksha.com/assets\admin_assets\images-nibedita\gurusiksha-icon-1024x1024.png" alt="" />
                      <p>'.$message.'</p>
                    </li>';
        }




	}

}

