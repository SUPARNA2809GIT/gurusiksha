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
          <p class="heading3" style="color:#003399; font-size: 30px;">Mentor Details</p>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-3">
          <!--left col-->
          <div class="text-left"> <img src="http://ssl.gstatic.com/accounts/ui/avatar_2x.png" class="img-thumbnail" alt="avatar" style="width: 100%">
            <h4 class="text-center"><?php echo $v->mentor_name; ?></h4>
            <div class="well">
              <ul>
                <li><?php echo $v->mentor_dob; ?></li>
                <li><?php echo $v->mentor_email; ?></li>
                <li><?php echo $v->mentor_mobile; ?></li>
                <li><?php echo $v->mentor_address; ?> <br>
                  <?php echo $v->mentor_pin; ?></li>
              </ul>
            </div>
          </div>
          </hr>
          <br>
        </div>
        <!--/col-3-->
        <div class="col-sm-9">
          <ul class="nav nav-tabs">
            <li><a data-toggle="tab" href="#studentss">Students</a></li>
            <li class="active"><a data-toggle="tab" href="#curclass">Current Class</a></li>
            <li><a data-toggle="tab" href="#payment">Payment Details</a></li>
          </ul>
          <div class="tab-content">
            <div class="tab-pane" id="studentss">
              <hr>
              <h2>Students' Details</h2>
              <div class="panel-group" id="accordion">

                <?php 

                $courses   = $this->db->query("SELECT * FROM tb_current_course WHERE mentor='".$v->mentor_id."' GROUP BY user_id ")->result();


                if(!empty($courses))
                {
                  foreach ($courses as $kk=>$vv) { 


                    $student=$this->db->query("SELECT * FROM tb_students WHERE student_id=".$vv->user_id)->row();


                    $subjectR = $this->db->query("SELECT * FROM tb_subject WHERE subject_id=".$vv->subject)->row();
                    
                    $mentorR = $this->db->query("SELECT * FROM tb_mentors WHERE mentor_id=".$vv->mentor)->row();
                    
                    $timeR = $this->db->query("SELECT * FROM tb_teaching_time WHERE time_id=".$vv->time)->row();
                    
                    
                    $dayR = $this->db->query("SELECT * FROM tb_teaching_days WHERE day_id=".$vv->day)->row();
                    
                    
                    $fees = $this->db->query("SELECT * FROM tb_transaction WHERE mentor=".$mentorR->mentor_id." AND user_id=".$student->student_id." ORDER BY tid DESC LIMIT 1")->row();



                  ?>


                  <div class="panel panel-default">
                  <div class="panel-heading">
                    <h4 class="panel-title"> <a data-toggle="collapse" data-parent="#accordion" href="#collapse_<?php echo $kk; ?>"><?php echo $student->name; ?>&nbsp; <i class="fa fa-angle-down"></i></a> </h4>
                  </div>
                  <div id="collapse_<?php echo $kk; ?>" class="panel-collapse collapse in">
                    <div class="panel-body"> <strong>Class: </strong><?php echo $student->class; ?> <strong>Subject: </strong><?php echo $subjectR->subject; ?> <strong>Day: </strong><?php echo $dayR->day; ?> <strong>Time: </strong><?php echo date('H:i A',strtotime($timeR->time)); ?> <strong>Complete: </strong><?php if($vv->is_complete==1) echo 'Complete'; else echo 'Incomplete'  ?>
                      <button class="btn btn-success btn-xs"><?php if($vv->is_complete==1) echo 'Complete'; else echo 'Incomplete'  ?></button>
                    </div>
                  </div>
                </div>

                   
                <?php  } } ?>

                

                <!-- <div class="panel panel-default">
                  <div class="panel-heading">
                    <h4 class="panel-title"> <a data-toggle="collapse" data-parent="#accordion" href="#collapse2">Sourav Samanta&nbsp; <i class="fa fa-angle-down"></i></a> </h4>
                  </div>
                  <div id="collapse2" class="panel-collapse collapse">
                    <div class="panel-body"> <strong>Class: </strong>ii <strong>Subject: </strong>Math <strong>Chapter: </strong>Calculas <strong>Day: </strong>Monday <strong>Time: </strong>6:30pm <strong>Complete: </strong>No
                      <button class="btn btn-success btn-xs">Complete</button>
                    </div>
                  </div>
                </div> -->

              </div>
            </div>
            <!--/tab-pane-->
            <div class="tab-pane active" id="curclass">
              <h2></h2>
              <hr>
              <?php $courses   = $this->db->query("SELECT * FROM tb_current_course WHERE mentor='".$v->mentor_id."' AND class_status=1 AND is_complete=0")->result();
              
              
                   if(!empty($courses))
                   {
                       foreach($courses as $course)
                       {
                            $student=$this->db->query("SELECT * FROM tb_students WHERE student_id=".$course->user_id)->row();
                            
                            
				
            				$subjectR = $this->db->query("SELECT * FROM tb_subject WHERE subject_id=".$course->subject)->row();
            				
            				$mentorR = $this->db->query("SELECT * FROM tb_mentors WHERE mentor_id=".$course->mentor)->row();
            				
            				$timeR = $this->db->query("SELECT * FROM tb_teaching_time WHERE time_id=".$course->time)->row();
            				
            				
            				$dayR = $this->db->query("SELECT * FROM tb_teaching_days WHERE day_id=".$course->day)->row();
            				
            				
            				$fees = $this->db->query("SELECT * FROM tb_transaction WHERE mentor=".$mentorR->mentor_id." AND user_id=".$student->student_id." ORDER BY tid DESC LIMIT 1")->row();
                           ?>
                           <div class="alert alert-success"><strong>Subject:</strong> <?php echo $subjectR->subject; ?> <strong>Class:</strong> <?php echo $student->class; ?> <strong>Student:</strong> <?php echo $student->name; ?> <strong>Day: </strong> <?php echo $dayR->day; ?> <strong>Time: </strong> <?php echo date('H:i A',strtotime($timeR->time)); ?> <strong>Payemnt:</strong> <?php echo $fees->mentorFee; ?>/- </div>
                    <?php   }
                   } ?>
              
              
              
              
            </div>
            <!--/tab-pane-->
            
            
            <div class="tab-pane" id="payment">
              <hr>
              <table id="example" class="table table-striped table-bordered" style="width:100%">
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
                <tbody>
                  <?php if(!empty($transactions)){

                    foreach ($transactions as $k=>$v) { ?> 

                      <tr>
                        <td><?php echo $k+1; ?></td>
                        <td><?php echo $v->name; ?></td>
                        <td><?php echo $v->class; ?></td>
                        <td><?php echo $v->subject; ?></td>
                        <td><?php echo date('h:i A', strtotime($v->time)); ?></td>
                        <td><?php echo $v->mentorFee; ?></td>
                      </tr>

                    <?php } } ?>
                  
                </tbody>
              </table>
            </div>
            <div class="tab-pane" id="chathistory">
              <hr>
            </div>
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
