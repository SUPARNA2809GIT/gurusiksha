<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<?php $this->load->view('cdms/include/header'); ?>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap.min.css">
</head>

<body>
<?php $this->load->view('cdms/include/nav_bar'); ?>
<!-- ------- topfixedmenuBar section ends here --------------------------------->
<section id="sliderBar">
  <div class="container">
   
    <div class="container bootstrap snippet">
      <div class="row">
        <div class="col-sm-10">
          <p class="heading3" style="color:#003399; font-size: 30px;">Guardian Details</p>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-3">
          <!--left col-->
          <div class="text-left"> <img src="http://ssl.gstatic.com/accounts/ui/avatar_2x.png" class="img-thumbnail" alt="avatar" style="width: 100%">
            <h4 class="text-center"><?php echo $v->guardian_name; ?></h4>
            <div class="well">
            <ul>
              
              
              <li><?php echo $v->guardian_email; ?></li>
              <li><?php echo $v->guardian_mobile; ?></li>
              <li><?php echo $v->guardian_address; ?> <br> <?php echo $v->guardian_pin; ?></li>
              <li><?php echo $v->rel_with_stud; ?></li>
              
              
            </ul>
            </div>
            
            
          </div>
          </hr>
          <br>
          
        </div>
        <!--/col-3-->
        <div class="col-sm-9">
          <ul class="nav nav-tabs">
            <li class="active"><a data-toggle="tab" href="#studentss">Students</a></li>
            <!--<li ><a data-toggle="tab" href="#curclass">Tab 2</a></li>-->
           
          </ul>
          <div class="tab-content">
            <div class="tab-pane active" id="studentss">
              <hr>
              <?php $student = $this->db->query("SELECT * FROM tb_students WHERE guardian_phone='".$v->guardian_mobile."'")->row(); 
              
              //print_r($student); die;
              
              if(!empty($student)){
                  
                  $course   = $this->db->query("SELECT * FROM tb_current_course WHERE user_id='".$student->student_id."' AND class_status=1 AND is_complete=0")->row();
                  
                  //echo $this->db->last_query(); die;
                  
                  if(!empty($course)){
                  
                  
				$classR   = $this->db->query("SELECT * FROM tb_class WHERE class_id='".$student->class."'")->row();
				
				$subjectR = $this->db->query("SELECT * FROM tb_subject WHERE subject_id=".$course->subject)->row();
				
				$mentorR = $this->db->query("SELECT * FROM tb_mentors WHERE mentor_id=".$course->mentor)->row();
				
				$timeR = $this->db->query("SELECT * FROM tb_teaching_time WHERE time_id=".$course->time)->row();
				
				
				$dayR = $this->db->query("SELECT * FROM tb_teaching_days WHERE day_id=".$course->day)->row();
				
				
				if($course->is_complete==1)
				{
				    $temp = 'Yes';
				}
				else
				{
				    $temp = 'No';
				}
             
              
              
              
              
              ?>
               <h2>Student's Details</h2>
                <div class="panel-group" id="accordion">
                  <div class="panel panel-default">

                    <div class="panel-heading">
                      <h4 class="panel-title">
                        <a href="#"><?php echo $student->name; ?></a>
                      </h4>
                    </div>


                    <div id="collapse1" class="panel-collapse collapse in">
                      <div class="panel-body">
                        <strong>Class: </strong><?php echo $student->class; ?>&nbsp;<strong>Subject: </strong><?php echo $subjectR->subject; ?>&nbsp;<strong>Day: </strong><?php echo $dayR->day; ?>&nbsp; <strong>Time: </strong><?php echo $timeR->time; ?> &nbsp;<strong>Complete: </strong><?php echo $temp; ?>
                      </div>
                    </div>
                  </div>
                  
                </div> 
                <?php } } ?>
            </div>
            <!--/tab-pane-->
            <div class="tab-pane " id="curclass">
              <h2></h2>
              <hr>
              <div class="alert alert-success">
                <strong>Subject:</strong> Math <strong>Chapter:</strong> Calculas <strong>Mentor:</strong> Sourav Samanta <strong>Day: </strong> Monday <strong>Time: </strong> 2:10pm <strong>Payemnt:</strong> 550/-
              </div>

              <div class="alert alert-success">
                <strong>Subject:</strong> Math <strong>Chapter:</strong> Calculas <strong>Mentor:</strong> Sourav Samanta <strong>Day: </strong> Monday <strong>Time: </strong> 2:10pm <strong>Payemnt:</strong> 550/-
              </div>

              <div class="alert alert-success">
                <strong>Subject:</strong> Math <strong>Chapter:</strong> Calculas <strong>Mentor:</strong> Sourav Samanta <strong>Day: </strong> Monday <strong>Time: </strong> 2:10pm <strong>Payemnt:</strong> 550/-
              </div>

              <div class="alert alert-success">
                <strong>Subject:</strong> Math <strong>Chapter:</strong> Calculas <strong>Mentor:</strong> Sourav Samanta <strong>Day: </strong> Monday <strong>Time: </strong> 2:10pm <strong>Payemnt:</strong> 550/-
              </div>

              <div class="alert alert-success">
                <strong>Subject:</strong> Math <strong>Chapter:</strong> Calculas <strong>Mentor:</strong> Sourav Samanta <strong>Day: </strong> Monday <strong>Time: </strong> 2:10pm <strong>Payemnt:</strong> 550/-
              </div>

              <div class="alert alert-success">
                <strong>Subject:</strong> Math <strong>Chapter:</strong> Calculas <strong>Mentor:</strong> Sourav Samanta <strong>Day: </strong> Monday <strong>Time: </strong> 2:10pm <strong>Payemnt:</strong> 550/-
              </div>
            </div>
            <!--/tab-pane-->
            

          </div>
          <!--/tab-pane-->
        </div>
        <!--/tab-content-->
      </div>
      <!--/col-9-->
    </div>
    <!--/row-->
  </div>
</section>
<?php $this->load->view('cdms/include/footer'); ?>

<!-- ------- footBar section ends here --------------------------------->
<script type="text/javascript">
  $(document).ready(function() {

    var readURL = function(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $('.avatar').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }

    $(".file-upload").on('change', function(){
        readURL(this);
    });

});

</script>

<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap.min.js"></script>
<script type="text/javascript">
  $(document).ready(function() {
        $('#example').DataTable();
    });
</script>




</body>
</html>
