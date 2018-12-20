<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<?php $this->load->view('cdms/include/header'); ?>
<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap.min.css">
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.6.3/css/bootstrap-select.min.css" />
</head>
<body>
<?php $this->load->view('cdms/include/nav_bar'); ?>
<!-- ------- topfixedmenuBar section ends here --------------------------------->
<section id="sliderBar">
  <div class="container">
    <p class="heading3" style="color:#003399;">Teacher's Opinion</p>
    <div class="row">
    
      <form method="post" action="<?php echo base_url() ?>edit/teachrs_opinion/<?php echo $v->opinion_id; ?>" >
       <?php echo $this->session->flashdata('success'); ?>
        <div class="form-row">

          <div class="form-group col-md-12">
            <label>Mentor</label>
            <select class="form-control" name="mentor_id" >
              <option data-subtext="">--Select--</option>
              <?php if(!empty($mentor)){
                foreach ($mentor as $men) { ?>
                  <option value="<?php echo $men->mentor_id; ?>" <?php if($v->mentor_id==$men->mentor_id) echo "selected='selected'"; ?>><?php echo $men->mentor_name; ?></option>
              <?php  } } ?>
            </select>
            <?php echo form_error('mentor_id','<span class="text-danger">','</span>'); ?>
          </div>
          
          <div class="form-group col-md-12">
            <label>Class</label>
            <select name="class_id" id="class_id" class="form-control" onchange="getStudent()" >
              <option value="">--Select--</option>
              <?php if(!empty($class)) { foreach ($class as $cl) { ?>
                <option value="<?php echo $cl->class;  ?>" <?php if($cl->class==$v->class) echo "selected='selected'"; ?>><?php echo $cl->class;  ?></option>
            <?php } } ?>
            </select>
            <?php echo form_error('class_id','<span class="text-danger">','</span>'); ?>
          </div>
          <div class="form-group col-md-12">
            <label>Subject Name</label>
            <select name="subject_id" id="subject_id" class="form-control" onchange="chapter(this.value)" >
              <option value="">--Select--</option>
              <?php if(!empty($subject)) { foreach ($subject as $sb) { ?>
                <option value="<?php echo $sb->subject_id;  ?>" <?php if($sb->subject_id==$v->subject_id) echo "selected='selected'"; ?>><?php echo $sb->subject;  ?></option>
            <?php } } ?>
            </select>
            <?php echo form_error('subject_id','<span class="text-danger">','</span>'); ?>
          </div>
          
  
          <div id="allStudent">

            <div class="form-group col-md-6">
              <label>Student</label>
              <div id="chapterDiv">
                <input type="text" name="student" class="form-control" value="<?php echo $v->student_name; ?>" >
                <input type="hidden" name="student_id" class="form-control" value="<?php echo $v->student_id; ?>">
              </div>
            </div>
            <div class="form-group col-md-6">
              <label>Opinion</label>
              <div id="chapterDiv">
                <input type="text" name="opinion" class="form-control" value="<?php echo $v->opinion; ?>">
              </div>
            </div>
            
          </div>
            


          <div class="form-group col-md-12">
            <button type="submit" id="submit" class="btn btn-primary">Update</button>
            <a href="<?php echo base_url(); ?>add/teachrs_opinion" class="btn btn-primary">Back To List</a>
          </div>
        </div>
      </form>
    </div>
  </div>
</section>

<input type="hidden" name="Count" id="Count" value="0">
<!-- ------- sliderBar section ends here --------------------------------->

<!-- ------- sliderBar section ends here --------------------------------->
<?php $this->load->view('cdms/include/footer'); ?>
<!-- ------- footBar section ends here --------------------------------->
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap.min.js"></script>

<script type="text/javascript">

  var j = jQuery.noConflict();
  j(document).ready(function() {
    j('#example').DataTable();
} );


  function chapter(subId){

          jQuery.ajax({
            url:"<?php echo base_url(); ?>add/getChapter", //the page containing php script
            type: "post", //request type,
            dataType: 'html',
            data: {subject_id: subId},
            success:function(res){
                    console.log(res);
                    jQuery("#chapterDiv").html(res);
           }

         });
 }


</script>

<script src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.6.3/js/bootstrap-select.min.js"></script>
</body>
</html>
