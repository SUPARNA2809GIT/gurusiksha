<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Add extends CI_Controller {

   public function __construct() {

		parent::__construct();
		$this->load->helper(array('url','form','html','text'));
		$this->load->library(array('session','form_validation','pagination','email'));
		$this->load->model(array('common_model'));
		if($this->session->userdata('ADMIN_ID') =='') {

         redirect('login');

		}
		
	}
	
	protected $validation_rules = array
    (
		'AddLanguage' => array(
                			array(
                                'field' => 'language-name',
                                'label' => 'Language Name',
                                'rules' => 'trim|required'
                            )
         ),
        'AddSubject' => array(
                            array(
                                'field' => 'subject-name',
                                'label' => 'Subject',
                                'rules' => 'trim|required'
                            )
        ),
        'AddClass' => array(
                            array(
                                'field' => 'class-name',
                                'label' => 'Class',
                                'rules' => 'trim|required'
                            )
        ),
        'AddTime' => array(
                            array(
                                'field' => 'teach-time',
                                'label' => 'Time',
                                'rules' => 'trim|required'
                            )
        ),
        'AddDay' => array(
                            array(
                                'field' => 'day-name',
                                'label' => 'Day',
                                'rules' => 'trim|required'
                            )
        ),
        'AddStudent' => array(
                            array(
                                'field' => 'name',
                                'label' => 'Name',
                                'rules' => 'trim|required'
                            ),
                            array(
                                'field' => 'email',
                                'label' => 'Email',
                                'rules' => 'trim|required'
                            ),
                            array(
                                'field' => 'address',
                                'label' => 'Address',
                                'rules' => 'trim|required'
                            ),
                            array(
                                'field' => 'school',
                                'label' => 'School',
                                'rules' => 'trim|required'
                            ),
                            array(
                                'field' => 'class',
                                'label' => 'Class',
                                'rules' => 'trim|required'
                            ),
                            array(
                                'field' => 'board',
                                'label' => 'Borad Name',
                                'rules' => 'trim|required'
                            ),
                            array(
                                'field' => 'subjects[]',
                                'label' => 'Subject',
                                'rules' => 'trim|required'
                            ),
                            array(
                                'field' => 'day',
                                'label' => 'Day',
                                'rules' => 'trim|required'
                            ),
                            array(
                                'field' => 'time',
                                'label' => 'Time',
                                'rules' => 'trim|required'
                            ),
                            array(
                                'field' => 'language',
                                'label' => 'Language',
                                'rules' => 'trim|required'
                            ),
                            array(
                                'field' => 'gname',
                                'label' => 'Gurdian Name',
                                'rules' => 'trim|required'
                            ),
                            array(
                                'field' => 'g_phn',
                                'label' => 'Gurdian Phone',
                                'rules' => 'trim|required'
                            ),

        ),
        'AddMentor' => array(
                            array(
                                'field' => 'name',
                                'label' => 'Name',
                                'rules' => 'trim|required'
                            ),
                            array(
                                'field' => 'email',
                                'label' => 'Email',
                                'rules' => 'trim|required'
                            ),
                            array(
                                'field' => 'address',
                                'label' => 'Address',
                                'rules' => 'trim|required'
                            ),
                            array(
                                'field' => 'subjects[]',
                                'label' => 'Subject',
                                'rules' => 'trim|required'
                            ),
                            array(
                                'field' => 'day',
                                'label' => 'Day',
                                'rules' => 'trim|required'
                            ),
                            array(
                                'field' => 'time',
                                'label' => 'Time',
                                'rules' => 'trim|required'
                            ),
                            array(
                                'field' => 'language',
                                'label' => 'Language',
                                'rules' => 'trim|required'
                            )

        ),
        'AddGuardian' => array(
                            array(
                                'field' => 'name',
                                'label' => 'Name',
                                'rules' => 'trim|required'
                            ),
                            array(
                                'field' => 'rel_with_stud',
                                'label' => 'Relationship with student',
                                'rules' => 'trim|required'
                            ),
                            array(
                                'field' => 'address',
                                'label' => 'Address',
                                'rules' => 'trim|required'
                            )

        ),
        'AddChapter' => array(
                            array(
                                'field' => 'subject_id',
                                'label' => 'Subject',
                                'rules' => 'trim|required'
                            ),
                            array(
                                'field' => 'chapter',
                                'label' => 'Chapter',
                                'rules' => 'trim|required'
                            )
        ),
        'AddFee' => array(
                            array(
                                'field' => 'subject_id',
                                'label' => 'Subject',
                                'rules' => 'trim|required'
                            ),
                            array(
                                'field' => 'chapter_id',
                                'label' => 'Chapter',
                                'rules' => 'trim|required'
                            ),
                            array(
                                'field' => 'fees',
                                'label' => 'Fees',
                                'rules' => 'trim|required'
                            )
        ),
        'AddSms' => array(
                            array(
                                'field' => 'sms_title',
                                'label' => 'SMS Title',
                                'rules' => 'trim|required'
                            ),
                            array(
                                'field' => 'sms_description',
                                'label' => 'SMS Description',
                                'rules' => 'trim|required'
                            )
        ),
        'AddSmsSend' => array(
                            array(
                                'field' => 'subject_id',
                                'label' => 'Subject',
                                'rules' => 'trim|required'
                            ),
                            array(
                                'field' => 'sms_id',
                                'label' => 'SMS Title',
                                'rules' => 'trim|required'
                            ),
                            array(
                                'field' => 'sms_description',
                                'label' => 'SMS Description',
                                'rules' => 'trim|required'
                            )
        ),
        'AddQuestion' => array(
                            array(
                                'field' => 'asses_type',
                                'label' => 'Assesment Type',
                                'rules' => 'trim|required'
                            ),
                            array(
                                'field' => 'class_id',
                                'label' => 'Class',
                                'rules' => 'trim|required'
                            ),
                            array(
                                'field' => 'subject_id',
                                'label' => 'Subject',
                                'rules' => 'trim|required'
                            ),
                            array(
                                'field' => 'chapter_id',
                                'label' => 'Chapter',
                                'rules' => 'trim|required'
                            )
        ),
        'AddMaterial' => array(
                            array(
                                'field' => 'mentor_id',
                                'label' => 'Mentor',
                                'rules' => 'trim|required'
                            ),
                            array(
                                'field' => 'class_id',
                                'label' => 'Class',
                                'rules' => 'trim|required'
                            ),
                            array(
                                'field' => 'subject_id',
                                'label' => 'Subject',
                                'rules' => 'trim|required'
                            ),
                            array(
                                'field' => 'chapter_id',
                                'label' => 'Chapter',
                                'rules' => 'trim|required'
                            ),
        ),
        'AddOpinion' => array(
                            array(
                                'field' => 'mentor_id',
                                'label' => 'Mentor',
                                'rules' => 'trim|required'
                            ),
                            array(
                                'field' => 'class_id',
                                'label' => 'Class',
                                'rules' => 'trim|required'
                            ),
                            array(
                                'field' => 'subject_id',
                                'label' => 'Subject',
                                'rules' => 'trim|required'
                            )
        ),
        'AddDocument' => array(
                            array(
                                'field' => 'document_type',
                                'label' => 'Document Type',
                                'rules' => 'trim|required'
                            ),
                            array(
                                'field' => 'doc_fee',
                                'label' => 'Fee',
                                'rules' => 'trim|required'
                            )
        ),

    );



	public function language()
	{

		$data=array();

        $data['result'] = $this->db->query("SELECT * FROM tb_language ORDER BY language_id DESC")->result();
	
		$this->form_validation->set_rules($this->validation_rules['AddLanguage']);
		if($this->form_validation->run() == true )
		{
            $language_name = $this->input->post('language-name');

            $count = $this->db->query("SELECT * FROM tb_language WHERE lower(language_name)='".strtolower($language_name."'"))->num_rows();

            if($count>0)
            {
                $message = '<div class="alert alert-danger">Language already exists.</p></div>';
            }
            else
            {
                $language_array = array("language_name"=>$language_name,
                                        "status"=>1,
                                        "created_date"=>date('Y-m-d'),
                                        "created_time"=>date('H:i:s')
                                        );
                $this->common_model->addRecord('tb_language',$language_array);
            }
		
			$this->session->set_flashdata('success', $message);
			redirect('add/language');
		}

		$this->load->view('cdms/language',$data);
		
	}


	public function subject()
	{
		$data=array();
		$data['result'] = $this->db->query("SELECT * FROM tb_subject ORDER BY subject_id DESC")->result();
	

		$this->form_validation->set_rules($this->validation_rules['AddSubject']);

		if($this->form_validation->run() == true )
		{
		
		    $subject = $this->input->post('subject-name');

            $count = $this->db->query("SELECT * FROM tb_subject WHERE lower(subject)='".strtolower($subject)."'")->num_rows();

            if($count>0)
            {
                $message = '<div class="alert alert-danger">Subject already exists.</p></div>';
            }
            else
            {
                $subject_array = array("subject"=>$subject,
                                        "status"=>1,
                                        "created_date"=>date('Y-m-d'),
                                        "created_time"=>date('H:i:s')
                                        );

                $this->common_model->addRecord('tb_subject',$subject_array);
                $message = '<div class="alert alert-success">Subject has been successfully added.</p></div>';
            }
			$this->session->set_flashdata('success', $message);
			redirect('add/subject');
	
		}

		$this->load->view('cdms/subject',$data);
		
	}

	public function chapter()
	{
		

		$data['result']=$this->db->query("SELECT a.*,b.subject FROM  tb_chapter a 
						                    INNER JOIN tb_subject b ON a.subject_id=b.subject_id 
						                    ORDER BY subject_id DESC")->result();
		
		$this->form_validation->set_rules($this->validation_rules['AddChapter']);
		if($this->form_validation->run() == true )
		{
		
		    $subject_id = $this->input->post('subject_id');
		    $chapter    = $this->input->post('chapter');

            $count = $this->db->query('SELECT * FROM tb_chapter WHERE subject_id="'.$subject_id.'" AND lower(chapter) LIKE "%'.strtolower($chapter).'%"')->num_rows();

            if($count>0)
            {
                $message = '<div class="alert alert-danger">Cahpter already exists.</p></div>';
            }
            else
            {
                $chapter_array = array("subject_id"=>$subject_id,
                                        "chapter"=>$chapter,
                                        "status"=>1,
                                        "created_date"=>date('Y-m-d'),
                                        "created_time"=>date('H:i:s')
                                        );

                $this->common_model->addRecord('tb_chapter',$chapter_array);
                $message = '<div class="alert alert-success">Cahpter has been successfully added.</p></div>';
            }

			
			$this->session->set_flashdata('success', $message);
			redirect('add/chapter');
	
		}

		$data['subject'] = $this->db->query("SELECT * FROM tb_subject ORDER BY subject_id DESC")->result();
		$this->load->view('cdms/chapter',$data);
		
	}

	public function Fees()
	{	

		$data['result']=$this->db->query("SELECT a.*,b.subject,c.chapter FROM  tb_fees a 
					                    INNER JOIN tb_subject b ON a.subject_id=b.subject_id 
					                    INNER JOIN tb_chapter c ON a.chapter_id=c.chapter_id 
					                    ORDER BY subject_id DESC")->result();
		
		$this->form_validation->set_rules($this->validation_rules['AddFee']);
		if($this->form_validation->run() == true )
		{
		
		    $subject_id = $this->input->post('subject_id');
		    $chapter_id = $this->input->post('chapter_id');
		    $fees       = $this->input->post('fees');

            $count = $this->db->query("SELECT * FROM tb_fees WHERE subject_id='".$subject_id."' AND chapter_id='".$chapter_id."'")->num_rows();

            if($count>0)
            {
                $message = '<div class="alert alert-danger"><p>Fees of this subject and chapter already exists.</p></div>';
            }
            else
            {
    			$fees_array = array("subject_id"=>$subject_id,
									"chapter_id"=>$chapter_id,
									"fee"=>$fees,
									"created_date"=>date('Y-m-d'),
									"created_time"=>date('H:i:s')
									);
                $this->common_model->addRecord('tb_fees',$fees_array);
                $message = '<div class="alert alert-success">Subject Fee has been successfully added.</p></div>';
            }

			
			$this->session->set_flashdata('success', $message);
			redirect('add/fees');
	
		}

		$data['subject'] = $this->db->query("SELECT * FROM tb_subject ORDER BY subject_id DESC")->result();
		$data['chapter'] = $this->db->query("SELECT * FROM tb_chapter ORDER BY chapter_id DESC")->result();
		$this->load->view('cdms/fees',$data);
		
	}


	public function class_entry()
	{
		$data=array();
		$data['result'] = $this->db->query("SELECT * FROM tb_class ORDER BY class_id DESC")->result();
	

		$this->form_validation->set_rules($this->validation_rules['AddClass']);

		if($this->form_validation->run() == true )
		{
		    $class = $this->input->post('class-name');

            $count = $this->db->query("SELECT * FROM tb_class WHERE class='".$class."'")->num_rows();

            if($count>0)
            {
                $message = '<div class="alert alert-danger"><p>Class already exists.</p></div>';
            }
            else
            {
                $subject_array = array("class"=>$class,
                                        "status"=>1,
                                        "created_date"=>date('Y-m-d'),
                                        "created_time"=>date('H:i:s')
                                        );

                $this->common_model->addRecord('tb_class',$subject_array);
                $message = '<div class="alert alert-success">Class has been successfully added.</p></div>';
            }

			
			$this->session->set_flashdata('success', $message);
			redirect('add/class_entry');
	
		}

		$this->load->view('cdms/class',$data);
		
	}

	public function time()
	{
		$data=array();
		$data['result'] = $this->db->query("SELECT * FROM tb_teaching_time ORDER BY time_id DESC")->result();
	
		$this->form_validation->set_rules($this->validation_rules['AddTime']);

		if($this->form_validation->run() == true )
		{
		
		    $time = $this->input->post('teach-time');

			$time_array = array("time"=>$time,
								"status"=>1,
								"created_date"=>date('Y-m-d'),
								"created_time"=>date('H:i:s')
								);

			$this->common_model->addRecord('tb_teaching_time',$time_array);
			$message = '<div class="alert alert-success">Time has been successfully added.</p></div>';
			$this->session->set_flashdata('success', $message);
			redirect('add/time');
	
		}

		$this->load->view('cdms/teach-time',$data);
		
	}


	public function days()
	{
		$data=array();
		$data['result'] = $this->db->query("SELECT * FROM tb_teaching_days ORDER BY day_id DESC")->result();
	

		$this->form_validation->set_rules($this->validation_rules['AddDay']);

		if($this->form_validation->run() == true )
		{
		
		    $day = $this->input->post('day-name');

            $count = $this->db->query("SELECT * FROM tb_class WHERE class='".$class."'")->num_rows();

            if($count>0)
            {
                $message = '<div class="alert alert-danger"><p>Day already exists.</p></div>';
            }
            else
            {
                $day_array = array("day"=>$day,
                                    "status"=>1,
                                    "created_date"=>date('Y-m-d'),
                                    "created_time"=>date('H:i:s')
                                    );

                $this->common_model->addRecord('tb_teaching_days',$day_array);
                $message = '<div class="alert alert-success">Day has been successfully added.</p></div>';
            }
			
			$this->session->set_flashdata('success', $message);
			redirect('add/days');
	
		}

		$this->load->view('cdms/teach-days',$data);
		
	}


	public function student()
	{

		$data=array();
        
		$data['result'] = $this->db->query("SELECT * FROM tb_students ORDER BY student_id DESC")->result();
	

		$this->form_validation->set_rules($this->validation_rules['AddStudent']);

		if($this->form_validation->run() == true )
		{

			
		
		    $name = $this->input->post('name');
		    $dob = $this->input->post('dob');
		    $gender = $this->input->post('gender');
		    $email = $this->input->post('email');
		    $mobile = $this->input->post('mobile');
		    $address = $this->input->post('address');
		    $pin = $this->input->post('pin');
		    $school = $this->input->post('school');
		    $class = $this->input->post('class');
		    $board_name = $this->input->post('board');

		    $subjects = $this->input->post('subjects');

		    $preferred_day = $this->input->post('day');
		    $preferred_time = $this->input->post('time');
		    $language = $this->input->post('language');
		    $guardian_name = $this->input->post('gname');
		    $guardian_phone = $this->input->post('g_phn');


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


			for ($i=0;$i<count($subjects);$i++) { 
				
				$subject_array = array("student_id"=>$student_id,
			                           "subject_id"=>$subjects[$i],
			                           "created_date"=>date('Y-m-d'),
								       "created_time"=>date('H:i:s')
								      );

				$this->common_model->addRecord('tb_students_subject',$subject_array);
			}

			$message = '<div class="alert alert-success">Student has been successfully added.</p></div>';
			$this->session->set_flashdata('success', $message);
			redirect('add/student');
	
		}

		$data['language'] = $this->db->query("SELECT * FROM tb_language")->result();
		$data['subject']  = $this->db->query("SELECT * FROM tb_subject")->result();
		$data['class']    = $this->db->query("SELECT * FROM tb_class")->result();
		$data['time']     = $this->db->query("SELECT * FROM tb_teaching_time")->result();
		$data['days']     = $this->db->query("SELECT * FROM tb_teaching_days")->result();

		$this->load->view('cdms/stud_reg',$data);

	}


	public function mentor()
	{

		$data=array();
		$data['result'] = $this->db->query("SELECT * FROM tb_mentors ORDER BY mentor_id DESC")->result();
	

		$this->form_validation->set_rules($this->validation_rules['AddMentor']);

		if($this->form_validation->run() == true )
		{

			
		
		    $name                = $this->input->post('name');
		    $dob                 = $this->input->post('dob');
		    $gender              = $this->input->post('gender');
		    $email               = $this->input->post('email');
		    $mobile              = $this->input->post('mobile');
		    $address             = $this->input->post('address');
		    $pin                 = $this->input->post('pin');
		    $school              = $this->input->post('school');
		    $about               = $this->input->post('about');
		    $achievement        = $this->input->post('achievement');

		    $subjects             = $this->input->post('subjects');

		    $preferred_day        = $this->input->post('day');
		    $preferred_time       = $this->input->post('time');
		    $language             = $this->input->post('language');
		    $mentor_qualification = $this->input->post('qualification');
		    $mentor_experience    = $this->input->post('experience');
		    $mentor_fee           = $this->input->post('mentor_fee');

		    $about = $this->input->post('about');


		    
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
								   "mentor_fee"=>$mentor_fee,
								   "status"=>1,
								   "created_date"=>date('Y-m-d'),
								   "created_time"=>date('H:i:s')
								   );

			$mentor_id = $this->common_model->addRecord('tb_mentors',$students_array);


			for ($i=0;$i<count($subjects);$i++) { 
				
				$subject_array = array("mentor_id"=>$mentor_id,
			                           "subject_id"=>$subjects[$i],
			                           "created_date"=>date('Y-m-d'),
								       "created_time"=>date('H:i:s')
								      );

				$this->common_model->addRecord('tb_mentors_subject',$subject_array);
			}

			$message = '<div class="alert alert-success">Mentor has been successfully added.</p></div>';
			$this->session->set_flashdata('success', $message);
			redirect('add/mentor');
	
		}

		$data['language'] = $this->db->query("SELECT * FROM tb_language")->result();
		$data['subject']  = $this->db->query("SELECT * FROM tb_subject")->result();
		$data['class']    = $this->db->query("SELECT * FROM tb_class")->result();
		$data['time']     = $this->db->query("SELECT * FROM tb_teaching_time")->result();
		$data['days']     = $this->db->query("SELECT * FROM tb_teaching_days")->result();

		$this->load->view('cdms/mentor_reg',$data);
	}


	public function guardian()
	{

		$data = array();

		$data['result'] = $this->db->query("SELECT * FROM tb_guardian ORDER BY guardian_id DESC")->result();
	
		$this->form_validation->set_rules($this->validation_rules['AddGuardian']);
		if($this->form_validation->run() == true )
		{
		    $name                = $this->input->post('name');
		    $gender              = $this->input->post('gender');
		    $email               = $this->input->post('email');
		    $mobile              = $this->input->post('mobile');
		    $address             = $this->input->post('address');
		    $pin                 = $this->input->post('pin');
		    $rel_with_stud       = $this->input->post('rel_with_stud');
		   
		    
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


			

			$message = '<div class="alert alert-success">Guardian has been successfully added.</p></div>';
			$this->session->set_flashdata('success', $message);
			redirect('add/guardian');
	
		}

		$data['language'] = $this->db->query("SELECT * FROM tb_language")->result();
		$data['subject']  = $this->db->query("SELECT * FROM tb_subject")->result();
		$data['class']    = $this->db->query("SELECT * FROM tb_class")->result();
		$data['time']     = $this->db->query("SELECT * FROM tb_teaching_time")->result();
		$data['days']     = $this->db->query("SELECT * FROM tb_teaching_days")->result();


		$this->load->view('cdms/guardian_reg',$data);
	}


    public function sms()
    {
        $data = array();

        $data['result'] = $this->db->query("SELECT * FROM tb_sms ORDER BY sms_id DESC")->result(); 

        
        $this->form_validation->set_rules($this->validation_rules['AddSms']);
        if($this->form_validation->run() == true )
        {           
        
            $sms_title           = $this->input->post('sms_title');
            $sms_description     = $this->input->post('sms_description');
           
            $sms_array = array("sms_title"=>$sms_title,
                               "sms_description"=>$sms_description,
                               "created_date"=>date('Y-m-d'),
                               "created_time"=>date('H:i:s')
                           );

            $this->common_model->addRecord('tb_sms',$sms_array);
           
            $message = '<div class="alert alert-success">SMS has been successfully added.</p></div>';
            $this->session->set_flashdata('success', $message);
            redirect('add/sms');
    
        }
        
        $data['subject']  = $this->db->query("SELECT * FROM tb_subject")->result();
        $data['class']    = $this->db->query("SELECT * FROM tb_class ORDER BY class_id DESC")->result();
        $this->load->view('cdms/sms',$data);
    }

	public function sendSms()
	{
		$data = array();

		$data['result'] = $this->db->query("SELECT * FROM tb_sms_send a
											INNER JOIN tb_subject b ON a.subject_id=b.subject_id
                                            INNER JOIN tb_sms c ON a.sms_id=c.sms_id 
                                            ORDER BY sms_send_id DESC")->result(); 


        $data['allSms'] = $this->db->query("SELECT * FROM tb_sms ORDER BY sms_title ASC")->result();

		
		$this->form_validation->set_rules($this->validation_rules['AddSmsSend']);

		if($this->form_validation->run() == true )
		{			
		
		    $subject_id  = $this->input->post('subject_id');
		    $sms_id      = $this->input->post('sms_id');
            $sms_desc      = $this->input->post('sms_description');

            $students     = $this->input->post('student');
            $mentors      = $this->input->post('mentor');
		   

		    for($i=0; $i < count($students) ; $i++){

		    	$sms_array = array("subject_id"=>$subject_id,
								   "sms_id"=>$sms_id,
								   "user_type"=>'S',
								   "user_id"=>$students[$i],
								   "created_date"=>date('Y-m-d'),
								   "created_time"=>date('H:i:s')
							   );

                $stuRow = $this->db->query("SELECT * FROM tb_students WHERE student_id=".$students[$i])->row();

                $base_url = "http://msg.infoskysolutions.com/API/WebSMS/Http/v2.3.6/api.php?";
                $otp = 111;

                $post_fields = "username=PRAEDUOTP&api_key=20c35cf0419566416a8391352286f10d&sender=GURUSK&to=".$stuRow->mobile."&message=Your OTP for login to Gurusiksha App ".$otp." . Do not share with anyone.";

		    	
				$this->send_sms($base_url,$post_fields);

			    $this->common_model->addRecord('tb_sms_send',$sms_array);
		    }

            for($j=0; $j < count($mentors) ; $j++){
                
                $sms_array = array("subject_id"=>$subject_id,
                                   "sms_id"=>$sms_id,
                                   "user_type"=>'M',
                                   "user_id"=>$mentors[$j],
                                   "created_date"=>date('Y-m-d'),
                                   "created_time"=>date('H:i:s')
                               );

                $mentRow = $this->db->query("SELECT * FROM tb_mentors WHERE mentor_id=".$mentors[$j])->row();

                $base_url = "http://msg.infoskysolutions.com/API/WebSMS/Http/v2.3.6/api.php?";
                $otp = 111;

                $post_fields = "username=PRAEDUOTP&api_key=20c35cf0419566416a8391352286f10d&sender=GURUSK&to=".$mentRow->mentor_mobile."&message=Your OTP for login to Gurusiksha App ".$otp." . Do not share with anyone.";

                $this->send_sms($base_url,$post_fields);

                $this->common_model->addRecord('tb_sms_send',$sms_array);

                //$base_url = "http://msg.infoskysolutions.com/API/WebSMS/Http/v2.3.6/api.php?";

            }
		   
		    
			
			$message = '<div class="alert alert-success">SMS has been successfully send.</p></div>';
			$this->session->set_flashdata('success', $message);
			redirect('add/sendSms');
	
		}
		
		$data['subject']  = $this->db->query("SELECT * FROM tb_subject")->result();
		$data['class']    = $this->db->query("SELECT * FROM tb_class ORDER BY class_id DESC")->result();
		$this->load->view('cdms/sms-send',$data);
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



	public function self_assesments()
	{
		$data = array();

		$data['result'] = $this->db->query("SELECT a.*,b.class,c.subject,d.chapter 
											FROM tb_self_assesment a
			                                INNER JOIN tb_class b ON a.class_id=b.class_id
			                                INNER JOIN tb_subject c ON a.subject_id=c.subject_id
			                                INNER JOIN tb_chapter d ON a.chapter_id=d.chapter_id ORDER BY a.assmnt_id DESC")->result();

		//print_r($data['result']); die;

		$this->form_validation->set_rules($this->validation_rules['AddQuestion']);
		if($this->form_validation->run() == true )
		{	
			// echo "<pre>";
			// print_r($this->input->post()); die;
			$assessment_type   = $this->input->post('asses_type');
		    $class_id          = $this->input->post('class_id');
		    $subject_id        = $this->input->post('subject_id');
		    $chapter_id        = $this->input->post('chapter_id');
		    $question          = $this->input->post('question');
		    $options           = $this->input->post('options');
		    $result            = $this->input->post('result');


            $selfAssesments = $this->db->query("SELECT * FROM tb_self_assesment WHERE class_id=".$class_id." AND subject_id=".$subject_id." AND chapter_id=".$chapter_id)->result();

            if(count($selfAssesments)>0)
            {
                $assmnt_id = $selfAssesments[0]->assmnt_id;
            }
            else
            {
                $assmnt_array = array("assessment_type"=>$assessment_type,
                                      "class_id"=>$class_id,
                                      "subject_id"=>$subject_id,
                                      "chapter_id"=>$chapter_id,
                                      "created_date"=>date('Y-m-d'),
                                      "created_time"=>date('H:i:s'),
                                       );

                $assmnt_id = $this->common_model->addRecord('tb_self_assesment',$assmnt_array);
            }

		    



		    for($i=0;$i<count($question);$i++){ 
		    	
		    	$question_array = array("assmnt_id"=>$assmnt_id,
		    							"question"=>$question[$i],
		    							"answer"=>$result[$i],
		    							"created_date"=>date('Y-m-d'),
		    							"created_time"=>date('H:i:s'),
		    						   );

		    	$assmnt_q_id = $this->common_model->addRecord('tb_self_assesment_q',$question_array);


		    	for ($j=0;$j<count($options[$i]);$j++) { 

		    		$option_array = array("assmnt_id"=>$assmnt_id,
		    							  "assmnt_q_id"=>$assmnt_q_id,
			    						  "options"=>$options[$i][$j],
			    						  );

		    	    $this->common_model->addRecord('tb_assesments_opt',$option_array);
		    	}
		    }

			$message = '<div class="alert alert-success">Data has been successfully send.</p></div>';
			$this->session->set_flashdata('success', $message);
			redirect('add/self_assesments');
	
		}

		$data['subject']  = $this->db->query("SELECT * FROM tb_subject")->result();
		$data['class']    = $this->db->query("SELECT * FROM tb_class ORDER BY class_id DESC")->result();
		$data['chapter']    = $this->db->query("SELECT * FROM tb_chapter ORDER BY chapter_id DESC")->result();
		$this->load->view('cdms/self-assesments',$data);
	}

	public function getChapter()
	{
		$subject_id = $this->input->post('subject_id');
		$chapter   = $this->db->query("SELECT * FROM tb_chapter WHERE subject_id=".$subject_id)->result();


		$html='<select name="chapter_id" class="form-control">
              <option value="">--Select--</option>';
		if(!empty($chapter)){
			foreach ($chapter as $ch) {
				$html.='<option value="'.$ch->chapter_id.'">'.$ch->chapter.'</option>';
			}
		}
		$html.='</select>';
		echo $html;

	}


	public function studymaterial()
	{   

		$data = array();

		$data['result'] = $this->db->query("SELECT a.*,b.mentor_name,c.class,d.subject,e.chapter 
											FROM tb_studymaterial a
			                                INNER JOIN tb_mentors b ON a.mentor_id=b.mentor_id
			                                INNER JOIN tb_class c ON a.class_id=c.class_id
			                                INNER JOIN tb_subject d ON a.subject_id=d.subject_id
			                                INNER JOIN tb_chapter e ON a.chapter_id=e.chapter_id
			                                ORDER BY a.studymaterial_id DESC")->result();

		//print_r($data['result']); die;



		$this->form_validation->set_rules($this->validation_rules['AddMaterial']);

		if($this->form_validation->run() == true )
		{

		
		    $mentor_id        = $this->input->post('mentor_id');
		    $class_id         = $this->input->post('class_id');
		    $subject_id       = $this->input->post('subject_id');
		    $chapter_id       = $this->input->post('chapter_id');
		    $mtp              = $this->input->post('type');


				
			$newname= time();
			$filePath                = 'uploads';
			$config['upload_path']   = $filePath;
			$config['allowed_types'] = '*';
			$config['file_name']     = $newname;
			$config['max_size']      = "";
			$config['max_width']     = "";
			$config['max_height']    = "";
			
			$this->load->library('upload', $config);
			$this->upload->initialize($config);
			if (!$this->upload->do_upload('userfile'))
			{
				$error = array('error' => $this->upload->display_errors());		
			}
			else
			{		
				$imgdata = array('upload_data' => $this->upload->data());
			}

           
			
			$study_array = array("mentor_id"=>$mentor_id,
								 "class_id"=>$class_id,
								 "subject_id"=>$subject_id,
								 "chapter_id"=>$chapter_id,
								 "document_type"=>$mtp,
								 "file_name"=>$imgdata['upload_data']['client_name'],
								 "file_path"=>$imgdata['upload_data']['file_name'],
								 "created_date"=>date('Y-m-d'),
								 "created_time"=>date('H:i:s')
								);

			$studymaterial_id = $this->common_model->addRecord('tb_studymaterial',$study_array);


			$message = '<div class="alert alert-success">Data has been successfully added.</p></div>';
			$this->session->set_flashdata('success', $message);
			redirect('add/studymaterial');
	
		}

		$data['mentor']   = $this->db->query("SELECT * FROM tb_mentors")->result();
		$data['subject']  = $this->db->query("SELECT * FROM tb_subject")->result();
		$data['class']    = $this->db->query("SELECT * FROM tb_class ORDER BY class_id DESC")->result();
		$data['chapter']  = $this->db->query("SELECT * FROM tb_chapter ORDER BY chapter_id DESC")->result();
		$this->load->view('cdms/study-material',$data);
	}



	public function teachrs_opinion()
	{
		$data = array();

		//tb_mentors

		$data['result'] = $this->db->query("SELECT a.*,b.subject,c.mentor_name 
											FROM tbl_opinions a
			                                INNER JOIN tb_subject b ON a.subject_id=b.subject_id
			                                INNER JOIN tb_mentors c ON a.mentor_id=c.mentor_id
			                                ORDER BY a.subject_id DESC")->result();

		$this->form_validation->set_rules($this->validation_rules['AddOpinion']);

		if($this->form_validation->run() == true )
		{


		
		    $mentor_id     = $this->input->post('mentor_id');
		    $class_id      = $this->input->post('class_id');
		    $subject_id    = $this->input->post('subject_id');
		    $student       = $this->input->post('student');
		    $student_id    = $this->input->post('student_id');
		    $opinion       = $this->input->post('opinion');

		    for($i=0; $i<count($opinion); $i++)
		    {


		    	if(!empty($opinion[$i]))
		    	{
		    		$opinionA = array("mentor_id"=>$mentor_id,
								     "class"=>$class_id,
								     "subject_id"=>$subject_id,
								     "student_id"=>$student_id[$i],
								     "opinion"=>$opinion[$i],
								     "student_name"=>$student[$i],
									 "created_date"=>date('Y-m-d'),
									 "created_time"=>date('H:i:s')
								    );

			        $opinion_id = $this->common_model->addRecord('tbl_opinions',$opinionA);

			    }
		    }
		   
			$message = '<div class="alert alert-success">Opinion has been successfully added.</p></div>';
			$this->session->set_flashdata('success', $message);
			redirect('add/teachrs_opinion');
	
		}

		$data['mentor']    = $this->db->query("SELECT * FROM tb_mentors")->result();
		$data['subject']   = $this->db->query("SELECT * FROM tb_subject")->result();
		$data['class']     = $this->db->query("SELECT * FROM tb_class ORDER BY class_id DESC")->result();
		$data['students']  = $this->db->query("SELECT * FROM tb_students ORDER BY student_id DESC")->result();
		$this->load->view('cdms/teachers-opinion',$data);
	}

	public function getStudent()
	{
		$class = $this->input->post('class');
		$subject_id = $this->input->post('subject_id');


		$result = $this->db->query("SELECT * FROM tb_students a
				  INNER JOIN tb_students_subject b ON a.student_id=b.student_id
				  WHERE a.class='".$class."' AND b.subject_id=".$subject_id)->result();

		$html = '';
        if(!empty($result)){
        	foreach ($result as $res) { 

        		$html.='<div class="form-group col-md-6">
		            <label>Student</label>
		            
		              <input type="text" name="student[]" class="form-control" value="'.$res->name.'">
		              <input type="hidden" name="student_id[]" class="form-control" value="'.$res->student_id.'">
		            
	          	</div>
	            <div class="form-group col-md-6">
	               <label>Opinion</label>
		           
		              <input type="text" name="opinion[]" class="form-control">
		            
	           </div>';
        		
         }
        }

        echo $html;
	}

    public function document_charge()
    {
        //validation_rules_document


        $data = array();

        //tb_mentors

        $data['result'] = $this->db->query("SELECT * FROM tb_doc_charge ORDER BY charge_id DESC")->result();

        $this->form_validation->set_rules($this->validation_rules['AddDocument']);

        if($this->form_validation->run() == true )
        {
        
            $doc_type     = $this->input->post('document_type');
            $fee          = $this->input->post('doc_fee');



            $rows = $this->db->query("SELECT * FROM tb_doc_charge WHERE doc_type='".$doc_type."'")->num_rows();


            if($rows>0){
                $message = '<div class="alert alert-danger">Video type already added.</p></div>';
                $this->session->set_flashdata('success', $message);
            }
            else
            {

                $docs_array = array("doc_type"=>$doc_type,
                             "fee"=>$fee,
                             "created_date"=>date('Y-m-d'),
                             "created_time"=>date('H:i:s')
                            );

               $charge_id = $this->common_model->addRecord('tb_doc_charge',$docs_array);

               $message = '<div class="alert alert-success">Document type charge has been successfully added.</p></div>';
               $this->session->set_flashdata('success', $message);

            }

            redirect('add/document_charge');
    
        }

        $data['mentor']    = $this->db->query("SELECT * FROM tb_mentors")->result();
        $data['subject']   = $this->db->query("SELECT * FROM tb_subject")->result();
        $data['class']     = $this->db->query("SELECT * FROM tb_class ORDER BY class_id DESC")->result();
        $data['students']  = $this->db->query("SELECT * FROM tb_students ORDER BY student_id DESC")->result();
        $this->load->view('cdms/document-charge',$data);
    }


    public function notification()
    {
        $data = array();
        $data['notifications']  = $this->db->query("SELECT * FROM tb_notification ORDER BY notification_id DESC")->result();

        //print_r($data['notifications']); die;
        if($this->input->post('title')!='' && $this->input->post('description')!='')
        {
            $students  = $this->db->query("SELECT * FROM tb_students")->result();
            $mentor    = $this->db->query("SELECT * FROM tb_mentors")->result();
            $guardian  = $this->db->query("SELECT * FROM tb_guardian")->result();

            
            $title = $this->input->post('title');
            $description = $this->input->post('description');
            
            

            foreach ($students as $stu) 
            {
                

                $fields1 = array('user_id' => $stu->student_id,
                                'user_type' => 'Student',
                                'title' => $title,
                                'description' => $description,
                                'name'=>$stu->name,
                                'created_date' => date('Y-m-d'),
                                'created_time' => date('H:i:s'),
                                );  
                $notification_id = $this->common_model->addRecord('tb_notification',$fields1);


                $fields = array ('registration_ids' => array($stu->token),
                    'data' => array ('noti_id' => $notification_id ),
                                    'notification' => array(
                                        'title' => $title,
                                        'body' => $description,
                                        'sound' => 'default',
                                        'color' => '#993682',
                                        'click_action' => 'FCM_PLUGIN_ACTIVITY',
                                        'icon' => 'fcm_push_icon'
                                    )
                                    );
                $fields = json_encode ($fields);

                $this->pushNotification($fields);
                
            }


            foreach ($mentor as $ment) 
            {
                

                $fields1 = array('user_id' => $ment->mentor_id,
                                'user_type' => 'Mentor',
                                'title' => $title,
                                'description' => $description,
                                'name'=>$ment->mentor_name,
                                'created_date' => date('Y-m-d'),
                                'created_time' => date('H:i:s'),
                                );  
                $notification_id = $this->common_model->addRecord('tb_notification',$fields1);


                $fields = array ('registration_ids' => array($ment->token),
                    'data' => array ('noti_id' => $notification_id ),
                                    'notification' => array(
                                        'title' => $title,
                                        'body' => $description,
                                        'sound' => 'default',
                                        'color' => '#993682',
                                        'click_action' => 'FCM_PLUGIN_ACTIVITY',
                                        'icon' => 'fcm_push_icon'
                                    )
                                    );
                $fields = json_encode ($fields);

                $this->pushNotification($fields);
                
            }


            foreach ($guardian as $gur) 
            {
                

                $fields1 = array('user_id' => $gur->guardian_id,
                                'user_type' => 'Guardian',
                                'title' => $title,
                                'description' => $description,
                                'name'=>$gur->guardian_name,
                                'created_date' => date('Y-m-d'),
                                'created_time' => date('H:i:s'),
                                );  

                $notification_id = $this->common_model->addRecord('tb_notification',$fields1);


                $fields = array ('registration_ids' => array($gur->token),
                    'data' => array ('noti_id' => $notification_id ),
                                    'notification' => array(
                                        'title' => $title,
                                        'body' => $description,
                                        'sound' => 'default',
                                        'color' => '#993682',
                                        'click_action' => 'FCM_PLUGIN_ACTIVITY',
                                        'icon' => 'fcm_push_icon'
                                    )
                                    );
                $fields = json_encode ($fields);

                $this->pushNotification($fields);
                
            }
          
            $message = '<div class="callout callout-success">SMS has been successfully sent.</p></div>';
                    
            $this->session->set_flashdata('success', $message);
            redirect('add/notification'); 

        }

        $this->load->view('cdms/notification',$data);
    }


    public function pushNotification($fields)
    {
        $url = 'https://fcm.googleapis.com/fcm/send';

        $headers = array ('Authorization: key=' . "AIzaSyD-6zt4YIwdZriY9m3u2CH51IysBfYT1Bs",
                        'Content-Type: application/json'
                );
            
        $ch = curl_init ();
        curl_setopt ( $ch, CURLOPT_URL, $url );
        curl_setopt ( $ch, CURLOPT_POST, true );
        curl_setopt ( $ch, CURLOPT_HTTPHEADER, $headers );
        curl_setopt ( $ch, CURLOPT_RETURNTRANSFER, true );
        curl_setopt ( $ch, CURLOPT_POSTFIELDS, $fields );
    
        $result = curl_exec ( $ch );
        echo $result;
        curl_close ( $ch );
    }


    public function getSms()
    {
        if($this->input->post('smsId')!='')
        {
            $smsId = $this->input->post("smsId");

            $sms = $this->db->query("SELECT * FROM tb_sms WHERE sms_id=".$smsId)->row();

            if(!empty($sms))
            {
                echo $sms->sms_description;
            }
        }
    }



    public function getUsers()
    {
        $subject_id = $this->input->post('subject_id');
        $user_type  = $this->input->post('user_type');

        if($subject_id!='' && $user_type!='')
        {

            $student = '<div class="form-group col-md-4">
                          <label>Students</label>
                          <br>';

            $mentor = '<div class="form-group col-md-4">
                          <label>Mentor</label>
                          <br>';

            if($user_type=='STUDENT' || $user_type=='ALL')
            {
                
                $students = $this->db->query("SELECT * FROM tb_students_subject a INNER JOIN tb_students b ON a.student_id=b.student_id WHERE status=1 AND a.subject_id=".$subject_id." GROUP BY a.student_id")->result();
                

                foreach ($students as $stu) {
                    $student.='<input type="checkbox" name="student[]" value="'.$stu->student_id.'">&nbsp;'.$stu->name.'<br>';
                }

                $student.='</div>';
                $html = $student;

            }
            elseif($user_type=='MENTOR' || $user_type=='ALL')
            {
                
                $mentors = $this->db->query("SELECT * FROM tb_mentors_subject a INNER JOIN tb_mentors b ON a.mentor_id=b.mentor_id WHERE status=1 AND a.subject_id=".$subject_id." GROUP BY a.mentor_id")->result();
               
                foreach ($mentors as $ment) {
                    $mentor.='<input type="checkbox" name="mentor[]" value="'.$ment->mentor_id.'">&nbsp;'.$ment->mentor_name.'<br>';
                }
                $mentor.='</div>';
                $html = $mentor;
            }


            if($user_type=='ALL')
            {
                $html = $student.$mentor;
            }

            echo $html;
       }
    }

}
