<?php

defined('BASEPATH') OR exit('No direct script access allowed');



class Edit extends CI_Controller {



   public function __construct() {



		parent::__construct();

		$this->load->helper(array('url','form','html','text'));

		$this->load->library(array('session','form_validation','pagination','email'));

		$this->load->model(array('common_model'));

		if($this->session->userdata('ADMIN_ID') =='') {



         redirect('login');



		}

		

	}

	

	protected $validation_rules_lang = array

    (

		'Edit' => array(

			array(

                'field' => 'language-name',

                'label' => 'Language Name',

                'rules' => 'trim|required'

            )

        ),

    );



    protected $validation_rules_subject = array

    (

		'Edit' => array(

			array(

                'field' => 'subject-name',

                'label' => 'Subject',

                'rules' => 'trim|required'

            )

        ),

    );



    protected $validation_rules_class = array

    (

		'Edit' => array(

			array(

                'field' => 'class-name',

                'label' => 'Class',

                'rules' => 'trim|required'

            )

        ),

    );



    protected $validation_rules_time = array

    (

		'Edit' => array(

			array(

                'field' => 'teach-time',

                'label' => 'Time',

                'rules' => 'trim|required'

            )

        ),

    );



    protected $validation_rules_day = array

    (

		'Edit' => array(

			array(

                'field' => 'day-name',

                'label' => 'Day',

                'rules' => 'trim|required'

            )

        ),

    );



    protected $validation_rules_student = array

    (

		'Edit' => array(

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

    );





    protected $validation_rules_mentor = array

    (

		'Add' => array(

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

    );



    protected $validation_rules_guardian = array

    (

		'Add' => array(

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

    );





    protected $validation_rules_chapter = array

    (

		'Add' => array(

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

    );





     protected $validation_rules_fee = array

    (

		'Add' => array(

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

    );





    protected $validation_rules_question = array

    (

		'Add' => array(

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

    );





    protected $validation_rules_material = array

    (

		'Add' => array(

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

    );





    protected $validation_rules_opinion = array

    (

		'Add' => array(

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

    ); 





    protected $validation_rules_document = array

    (

        'Add' => array(

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



    protected $validation_rules_sms = array
    (
        'Add' => array(
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

    );









	public function language()

	{

		$id = $this->uri->segment(3);

		$data['v']=$this->db->query("SELECT * FROM tb_language WHERE language_id=".$id)->row();



		$this->form_validation->set_rules($this->validation_rules_lang['Edit']);

		if($this->form_validation->run() == true )

		{

		

		    $language_name = $this->input->post('language-name');



			$language_array = array("language_name"=>$language_name);



		

			$this->db->where('language_id', $id);

			$this->db->update('tb_language', $language_array);



			$message = '<div class="alert alert-success">Language has been successfully modified.</p></div>';

			$this->session->set_flashdata('success', $message);

			redirect('add/language');

	

		}



		$this->load->view('cdms/language-edit',$data);

		

	}





	public function subject()

	{

		

		$id = $this->uri->segment(3);

		$data['v']=$this->db->query("SELECT * FROM tb_subject WHERE subject_id=".$id)->row();



		$this->form_validation->set_rules($this->validation_rules_subject['Edit']);

		if($this->form_validation->run() == true )

		{

		

		    $subject = $this->input->post('subject-name');

			$subject_array = array("subject"=>$subject);



			$this->db->where('subject_id', $id);

			$this->db->update('tb_subject', $subject_array);



			$message = '<div class="alert alert-success">Subject has been successfully modified.</p></div>';

			$this->session->set_flashdata('success', $message);

			redirect('add/subject');

	

		}



		$this->load->view('cdms/subject-edit',$data);

		

	}





	public function chapter()

	{

		

		$id = $this->uri->segment(3);

		$data['v']=$this->db->query("SELECT a.*,b.subject FROM  tb_chapter a 

						                    INNER JOIN tb_subject b ON a.subject_id=b.subject_id 

						                    WHERE a.chapter_id=".$id)->row();



		$this->form_validation->set_rules($this->validation_rules_chapter['Add']);

		if($this->form_validation->run() == true )

		{

		

		    $subject_id = $this->input->post('subject_id');

		    $chapter    = $this->input->post('chapter');



			$chapter_array = array("subject_id"=>$subject_id,

									"chapter"=>$chapter);



			$this->db->where('chapter_id', $id);

			$this->db->update('tb_chapter', $chapter_array);



			$message = '<div class="alert alert-success">Cahpter has been successfully modified.</p></div>';

			$this->session->set_flashdata('success', $message);

			redirect('add/chapter');

	

		}

		$data['subject'] = $this->db->query("SELECT * FROM tb_subject ORDER BY subject_id DESC")->result();

		$this->load->view('cdms/chapter-edit',$data);

		

	}





	public function Fees()

	{	

		$id = $this->uri->segment(3);

		$data['v']=$this->db->query("SELECT a.*,b.subject,c.chapter FROM  tb_fees a 

					                    INNER JOIN tb_subject b ON a.subject_id=b.subject_id 

					                    INNER JOIN tb_chapter c ON a.chapter_id=c.chapter_id 

					                    WHERE fee_id=".$id)->row();

		//print_r($data['result']); die;

		$this->form_validation->set_rules($this->validation_rules_fee['Add']);

		if($this->form_validation->run() == true )

		{

		

		    $subject_id = $this->input->post('subject_id');

		    $chapter_id = $this->input->post('chapter_id');

		    $fee        = $this->input->post('fees');



			$fees_array = array("subject_id"=>$subject_id,

									"chapter_id"=>$chapter_id,

									"fee"=>$fee,

									"created_date"=>date('Y-m-d'),

									"created_time"=>date('H:i:s')

									);



			$this->db->where('fee_id', $id);

			$this->db->update('tb_fees', $fees_array);



			//$this->common_model->addRecord('tb_fees',$fees_array);

			$message = '<div class="alert alert-success">Subject Fee has been successfully added.</p></div>';

			$this->session->set_flashdata('success', $message);

			redirect('add/fees');

	

		}



		$data['subject'] = $this->db->query("SELECT * FROM tb_subject ORDER BY subject_id DESC")->result();

		$data['chapter'] = $this->db->query("SELECT * FROM tb_chapter ORDER BY chapter_id DESC")->result();

		$this->load->view('cdms/fees-edit',$data);

		

	}





	public function class_entry()

	{

		$id = $this->uri->segment(3);

		$data['v']=$this->db->query("SELECT * FROM tb_class WHERE class_id=".$id)->row();

	



		$this->form_validation->set_rules($this->validation_rules_class['Edit']);

		if($this->form_validation->run() == true )

		{

		

		    $class = $this->input->post('class-name');

			$class_array = array("class"=>$class);



			$this->db->where('class_id', $id);

			$this->db->update('tb_class', $class_array);



			$message = '<div class="alert alert-success">Class has been successfully modified.</p></div>';

			$this->session->set_flashdata('success', $message);

			redirect('add/class_entry');

	

		}



		$this->load->view('cdms/class-edit',$data);

		

	}



	public function time()

	{

		$id = $this->uri->segment(3);

		$data['v']=$this->db->query("SELECT * FROM tb_teaching_time WHERE time_id=".$id)->row();

	



		$this->form_validation->set_rules($this->validation_rules_time['Edit']);



		if($this->form_validation->run() == true )

		{

		

		    $time = $this->input->post('teach-time');

			$time_array = array("time"=>$time);



			$this->db->where('time_id', $id);

			$this->db->update('tb_teaching_time', $time_array);



			$message = '<div class="alert alert-success">Time has been successfully modified.</p></div>';

			$this->session->set_flashdata('success', $message);

			redirect('add/time');

	

		}



		$this->load->view('cdms/teach-time-edit',$data);

		

	}





	public function days()

	{



		$id = $this->uri->segment(3);

		$data['v']=$this->db->query("SELECT * FROM tb_teaching_days WHERE day_id=".$id)->row();



		$this->form_validation->set_rules($this->validation_rules_day['Edit']);



		if($this->form_validation->run() == true )

		{

		

		    $day = $this->input->post('day-name');

			$day_array = array("day"=>$day);



			$this->db->where('day_id', $id);

			$this->db->update('tb_teaching_days', $day_array);



			$message = '<div class="alert alert-success">Day has been successfully modified.</p></div>';

			$this->session->set_flashdata('success', $message);

			redirect('add/days');

	

		}



		$this->load->view('cdms/teach-days-edit',$data);

		

	}





	public function student()

	{

		$id = $this->uri->segment(3);

		$data['v']=$this->db->query("SELECT * FROM tb_students WHERE student_id=".$id)->row();

		

		$this->form_validation->set_rules($this->validation_rules_student['Edit']);

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

								   "guardian_phone"=>$guardian_phone

								   );



			//$student_id = $this->common_model->addRecord('tb_students',$students_array);



			$this->db->where('student_id', $id);

			$this->db->update('tb_students', $students_array);



			$this->db->delete('tb_students_subject', array('student_id' => $id));



			for($i=0;$i<count($subjects);$i++)

			{ 

				

				$subject_array = array("student_id"=>$id,

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



		$this->load->view('cdms/stud_reg_edit',$data);



	}





	public function mentor()

	{



		$id = $this->uri->segment(3);

		$data['v']=$this->db->query("SELECT * FROM tb_mentors WHERE mentor_id=".$id)->row();

	



		$this->form_validation->set_rules($this->validation_rules_mentor['Add']);



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





		    

			$mentors_array = array("mentor_name"=>$name,

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

								   );



			//$mentor_id = $this->common_model->addRecord('tb_mentors',$students_array);



			$this->db->where('mentor_id', $id);

			$this->db->update('tb_mentors', $mentors_array);



			$this->db->delete('tb_mentors_subject', array('mentor_id' => $id));





			for ($i=0;$i<count($subjects);$i++) { 

				

				$subject_array = array("mentor_id"=>$id,

			                           "subject_id"=>$subjects[$i],

			                           "created_date"=>date('Y-m-d'),

								       "created_time"=>date('H:i:s')

								      );



				$this->common_model->addRecord('tb_mentors_subject',$subject_array);

			}



			$message = '<div class="alert alert-success">Mentor has been successfully modified.</p></div>';

			$this->session->set_flashdata('success', $message);

			redirect('add/mentor');

	

		}



		$data['language'] = $this->db->query("SELECT * FROM tb_language")->result();

		$data['subject']  = $this->db->query("SELECT * FROM tb_subject")->result();

		$data['class']    = $this->db->query("SELECT * FROM tb_class")->result();

		$data['time']     = $this->db->query("SELECT * FROM tb_teaching_time")->result();

		$data['days']     = $this->db->query("SELECT * FROM tb_teaching_days")->result();



		$this->load->view('cdms/mentor_reg_edit',$data);

	}



	public function guardian()

	{



		$data = array();





		$id = $this->uri->segment(3);

		$data['v']=$this->db->query("SELECT * FROM tb_guardian WHERE guardian_id=".$id)->row();



		$this->form_validation->set_rules($this->validation_rules_guardian['Add']);

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



			$this->db->where('guardian_id', $id);

			$this->db->update('tb_guardian', $guardian_array);



			$message = '<div class="alert alert-success">Guardian has been successfully modified.</p></div>';

			$this->session->set_flashdata('success', $message);

			redirect('add/guardian');

	

		}



		$data['language'] = $this->db->query("SELECT * FROM tb_language")->result();

		$data['subject']  = $this->db->query("SELECT * FROM tb_subject")->result();

		$data['class']    = $this->db->query("SELECT * FROM tb_class")->result();

		$data['time']     = $this->db->query("SELECT * FROM tb_teaching_time")->result();

		$data['days']     = $this->db->query("SELECT * FROM tb_teaching_days")->result();





		$this->load->view('cdms/guardian_reg_edit',$data);

	}


     public function sms($id)
     {
        $data = array();

        //echo $id; die;

        $data['v'] = $this->db->query("SELECT * FROM tb_sms WHERE sms_id=".$id)->row(); 

        
        $this->form_validation->set_rules($this->validation_rules_sms['Add']);
        if($this->form_validation->run() == true )
        {           
        
            $sms_title           = $this->input->post('sms_title');
            $sms_description     = $this->input->post('sms_description');
           
            $sms_array = array("sms_title"=>$sms_title,
                               "sms_description"=>$sms_description,
                               "created_date"=>date('Y-m-d'),
                               "created_time"=>date('H:i:s')
                           );

           
            $this->db->where('sms_id', $id);
            $this->db->update('tb_sms', $sms_array);
           
            $message = '<div class="alert alert-success">SMS has been successfully modified.</p></div>';
            $this->session->set_flashdata('success', $message);
            redirect('add/sms');
    
        }
        
        $data['subject']  = $this->db->query("SELECT * FROM tb_subject")->result();
        $data['class']    = $this->db->query("SELECT * FROM tb_class ORDER BY class_id DESC")->result();
        $this->load->view('cdms/sms-edit',$data);
    }






	public function self_assesments()

	{

		$data = array();

		$id = $this->uri->segment(3);

		$data['v'] = $this->db->query("SELECT a.*,b.class,c.subject,d.chapter 

									   FROM tb_self_assesment a

			                           INNER JOIN tb_class b ON a.class_id=b.class_id

			                           INNER JOIN tb_subject c ON a.subject_id=c.subject_id

			                           INNER JOIN tb_chapter d ON a.chapter_id=d.chapter_id WHERE a.assmnt_id=".$id)->row();



		$this->form_validation->set_rules($this->validation_rules_question['Add']);

		if($this->form_validation->run() == true )

		{	

			
            $assessment_type   = $this->input->post('asses_type');

		    $class_id          = $this->input->post('class_id');

		    $subject_id        = $this->input->post('subject_id');

		    $chapter_id        = $this->input->post('chapter_id');

		    $question          = $this->input->post('question');

		    $options           = $this->input->post('options');

		    $result            = $this->input->post('result');





		    $assmnt_array = array("assessment_type"=>$assessment_type,

                                "class_id"=>$class_id,

    							"subject_id"=>$subject_id,

    							"chapter_id"=>$chapter_id,

    							"created_date"=>date('Y-m-d'),

    							"created_time"=>date('H:i:s'),

    						   );

		    $this->db->where('assmnt_id', $id);

			$this->db->update('tb_self_assesment', $assmnt_array);



            

            $this->db->delete('tb_self_assesment_q', array('assmnt_id' => $id));

            $this->db->delete('tb_assesments_opt', array('assmnt_id' => $id));





		    for($i=0;$i<count($question);$i++){ 

		    	

		    	$question_array = array("assmnt_id"=>$id,

		    							"question"=>$question[$i],

		    							"answer"=>$result[$i],

		    							"created_date"=>date('Y-m-d'),

		    							"created_time"=>date('H:i:s'),

		    						   );



		    	$assmnt_q_id = $this->common_model->addRecord('tb_self_assesment_q',$question_array);





		    	for ($j=0;$j<count($options[$i]);$j++) { 



		    		$option_array = array("assmnt_id"=>$id,

		    							  "assmnt_q_id"=>$assmnt_q_id,

			    						  "options"=>$options[$i][$j],

			    						  );



		    	    $this->common_model->addRecord('tb_assesments_opt',$option_array);

		    	}

		    }



			$message = '<div class="alert alert-success">Data has been successfully modified.</p></div>';

			$this->session->set_flashdata('success', $message);

			redirect('add/self_assesments');

	

		}



		$data['subject']  = $this->db->query("SELECT * FROM tb_subject")->result();

		$data['class']    = $this->db->query("SELECT * FROM tb_class ORDER BY class_id DESC")->result();

		$data['chapter']    = $this->db->query("SELECT * FROM tb_chapter ORDER BY chapter_id DESC")->result();

		$this->load->view('cdms/self-assesments-edit',$data);

	}







	public function studymaterial()

	{   



		$id = $this->uri->segment(3);

		$data['v'] = $this->db->query("SELECT a.*,b.mentor_name,c.class,d.subject,e.chapter 

											FROM tb_studymaterial a

			                                INNER JOIN tb_mentors b ON a.mentor_id=b.mentor_id

			                                INNER JOIN tb_class c ON a.class_id=c.class_id

			                                INNER JOIN tb_subject d ON a.subject_id=d.subject_id

			                                INNER JOIN tb_chapter e ON a.chapter_id=e.chapter_id

			                                WHERE a.studymaterial_id=".$id)->row();



		$this->form_validation->set_rules($this->validation_rules_material['Add']);



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



			//$studymaterial_id = $this->common_model->addRecord('tb_studymaterial',$study_array);





			$this->db->where('studymaterial_id', $id);

			$this->db->update('tb_studymaterial', $study_array);





			$message = '<div class="alert alert-success">Data has been successfully modified.</p></div>';

			$this->session->set_flashdata('success', $message);

			redirect('add/studymaterial');

	

		}



		$data['mentor']   = $this->db->query("SELECT * FROM tb_mentors")->result();

		$data['subject']  = $this->db->query("SELECT * FROM tb_subject")->result();

		$data['class']    = $this->db->query("SELECT * FROM tb_class ORDER BY class_id DESC")->result();

		$data['chapter']  = $this->db->query("SELECT * FROM tb_chapter ORDER BY chapter_id DESC")->result();

		$this->load->view('cdms/study-material-edit',$data);

	}







	public function teachrs_opinion()

	{

		$id = $this->uri->segment(3);



		$data['v'] = $this->db->query("SELECT a.*,b.subject,c.mentor_name 

										FROM tbl_opinions a

		                                INNER JOIN tb_subject b ON a.subject_id=b.subject_id

		                                INNER JOIN tb_mentors c ON a.mentor_id=c.mentor_id

		                                WHERE a.opinion_id=".$id)->row();



		$this->form_validation->set_rules($this->validation_rules_opinion['Add']);



		if($this->form_validation->run() == true )

		{





		

		    $mentor_id     = $this->input->post('mentor_id');

		    $class_id      = $this->input->post('class_id');

		    $subject_id    = $this->input->post('subject_id');

		    $student       = $this->input->post('student');

		    $student_id    = $this->input->post('student_id');

		    $opinion       = $this->input->post('opinion');



		   

    		$opinionA = array("mentor_id"=>$mentor_id,

						     "class"=>$class_id,

						     "subject_id"=>$subject_id,

						     "student_id"=>$student_id,

						     "opinion"=>$opinion,

						     "student_name"=>$student,

							 "created_date"=>date('Y-m-d'),

							 "created_time"=>date('H:i:s')

						    );



	        //$opinion_id = $this->common_model->addRecord('tbl_opinions',$opinionA);

	        $this->db->where('opinion_id', $id);

			$this->db->update('tbl_opinions', $opinionA);



		   

			$message = '<div class="alert alert-success">Opinion has been successfully modified.</p></div>';

			$this->session->set_flashdata('success', $message);

			redirect('add/teachrs_opinion');

	

		}



		$data['mentor']    = $this->db->query("SELECT * FROM tb_mentors")->result();

		$data['subject']   = $this->db->query("SELECT * FROM tb_subject")->result();

		$data['class']     = $this->db->query("SELECT * FROM tb_class ORDER BY class_id DESC")->result();

		$data['students']  = $this->db->query("SELECT * FROM tb_students ORDER BY student_id DESC")->result();

		$this->load->view('cdms/teachers-opinion-edit',$data);

	}







	public function document_charge()

    {

        $id = $this->uri->segment(3);



        $data['v'] = $this->db->query("SELECT * FROM tb_doc_charge WHERE charge_id=".$id)->row();



        $this->form_validation->set_rules($this->validation_rules_document['Add']);



        if($this->form_validation->run() == true )

        {

        

            $doc_type     = $this->input->post('document_type');

            $fee          = $this->input->post('doc_fee');





            $docs_array = array("doc_type"=>$doc_type,

		                         "fee"=>$fee);



           $this->db->where('charge_id', $id);

		   $this->db->update('tb_doc_charge', $docs_array);





           $message = '<div class="alert alert-success">Document type charge has been successfully modified.</p></div>';

           $this->session->set_flashdata('success', $message);



           



            redirect('add/document_charge');

    

        }



        $data['mentor']    = $this->db->query("SELECT * FROM tb_mentors")->result();

        $data['subject']   = $this->db->query("SELECT * FROM tb_subject")->result();

        $data['class']     = $this->db->query("SELECT * FROM tb_class ORDER BY class_id DESC")->result();

        $data['students']  = $this->db->query("SELECT * FROM tb_students ORDER BY student_id DESC")->result();

        $this->load->view('cdms/document-charge-edit',$data);

    }











}

