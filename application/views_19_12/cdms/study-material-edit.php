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
    <p class="heading3" style="color:#003399;">Upload Study Material</p>
    <div class="row">
      <form method="post" action="<?php echo base_url() ?>edit/studymaterial/<?php echo $v->studymaterial_id; ?>" enctype="multipart/form-data">
       <?php echo $this->session->flashdata('success'); ?>
        <div class="form-row">
          <div class="form-group col-md-12">
            <label>Mentor</label>
            <select class="form-control selectpicker" data-show-subtext="true" data-live-search="true" name="mentor_id">
              <option data-subtext="">--Select--</option>
              <?php if(!empty($mentor)){
                foreach ($mentor as $men) { ?>
                  <option value="<?php echo $men->mentor_id; ?>" <?php if($men->mentor_id==$v->mentor_id) echo "selected='selected'"; ?>><?php echo $men->mentor_name; ?></option>
              <?php  } } ?>
            </select>
            <?php echo form_error('mentor_id','<span class="text-danger">','</span>'); ?>
          </div>
          <div class="form-group col-md-12">
            <label>Class</label>
            <select name="class_id" class="form-control">
              <option value="">--Select--</option>
              <?php if(!empty($class)) { foreach ($class as $cl) { ?>
                <option value="<?php echo $cl->class_id;  ?>" <?php if($cl->class_id==$v->class_id) echo "selected='selected'"; ?>><?php echo $cl->class;  ?></option>
            <?php } } ?>
            </select>
            <?php echo form_error('class_id','<span class="text-danger">','</span>'); ?>
          </div>
          <div class="form-group col-md-12">
            <label>Subject Name</label>
            <select name="subject_id" class="form-control" onchange="chapter(this.value)">
              <option value="">--Select--</option>
              <?php if(!empty($subject)) { foreach ($subject as $sb) { ?>
                <option value="<?php echo $sb->subject_id;  ?>" <?php if($sb->subject_id==$v->subject_id) echo "selected='selected'"; ?>><?php echo $sb->subject;  ?></option>
            <?php } } ?>
            </select>
            <?php echo form_error('subject_id','<span class="text-danger">','</span>'); ?>
          </div>
          <div class="form-group col-md-12">
            <label>Chapter</label>
            <div id="chapterDiv">
              <select name="chapter_id" class="form-control" >
                <option value="">--Select--</option>
                <?php if(!empty($chapter)) { foreach ($chapter as $ch) { ?>
                  <option value="<?php echo $ch->chapter_id;  ?>" <?php if($ch->subject_id==$v->subject_id) echo "selected='selected'"; ?>><?php echo $ch->chapter;  ?></option>
              <?php } } ?>
              </select>
              <?php echo form_error('chapter_id','<span class="text-danger">','</span>'); ?>
            </div>
          </div>
          <div class="form-group col-md-12">
            <label>Document Type</label>
            <select class="form-control" name="type">
              <option value="">--Select--</option>
              <option value="Image"<?php if($v->document_type=='Image') echo "selected='selected'"; ?>>Image</option>
              <option value="Audio"<?php if($v->document_type=='Audio') echo "selected='selected'"; ?>>Audio</option>
              <option value="Video"<?php if($v->document_type=='Video') echo "selected='selected'"; ?>>Video</option>
              <option value="PDF"<?php if($v->document_type=='PDF') echo "selected='selected'"; ?>>PDF</option>
            </select>
          </div>
          <div class="form-group col-md-12">
            <?php if($v->document_type=='Image') { ?> 
          <img src="<?php echo base_url(); ?>uploads/<?php echo $v->file_path; ?>" height="100" width="100">
        <?php } elseif ($v->document_type=='Audio') { ?>
          <audio controls>
            <source src="<?php echo base_url(); ?>uploads/<?php echo $v->file_path; ?>" type="audio/ogg">
          </audio>
        <?php  } elseif ($v->document_type=='Video') { 
            $ext = substr(strrchr($v->file_path,'.'),1);
          ?>
          <video width="200" controls>
            <source src="<?php echo base_url(); ?>uploads/<?php echo $v->file_path; ?>" type="video/<?php echo $ext; ?>">
          </video>

      <?php  } elseif ($v->document_type=='PDF') { ?>
        <a href="<?php echo base_url(); ?>uploads/<?php echo $v->file_path; ?>" height="100" width="100" target="_blank"><?php echo $v->file_name; ?></a>
      <?php  } ?>
           <br>
           <br>
            <label>File</label>
            <input type="file" name="userfile">
            <?php echo form_error('file','<span class="text-danger">','</span>'); ?>
          </div>
          <div class="form-group col-md-12">
            <button type="submit" id="submit" class="btn btn-primary">Update</button>
            <a href="<?php echo base_url(); ?>add/studymaterial" class="btn btn-primary">Back To List</a>
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
  });

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



 function addMore()
 {

    var count = parseInt(jQuery("#Count").val())+1;
    console.log(jQuery("#Count").val());
    jQuery("#Count").val(count);


   var html='<div id="newDiv'+count+'"><div class="form-group col-md-12"> <label>Question No.'+(count+1)+'</label> <textarea name="question[]" class="form-control"></textarea> </div><div class="form-group col-md-12"> <label>Option</label> <select class="form-control" multiple="" name="options['+count+'][]"> <option value="A">A</option> <option value="B">B</option> <option value="C">C</option> <option value="D">D</option> <option value="E">E</option> <option value="F">F</option> </select> </div><div class="form-group col-md-12"> <label>Answer</label> <select class="form-control" name="result[]"> <option value="">--Select--</option> <option value="A">A</option> <option value="B">B</option> <option value="C">C</option> <option value="D">D</option> <option value="E">E</option> <option value="F">F</option> </select> </div> <div class="form-group pull-right"> &nbsp; <button type="button" id="submit" class="btn btn-danger" onclick="remove('+count+')"><i class="fa fa-minus" aria-hidden="true"></i>&nbsp;Remove</button> </div></div>';

   jQuery("#more").append(html);


 }


 function remove(count)
 {
   jQuery("#newDiv"+count).remove();
 }
</script>
<script src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.6.3/js/bootstrap-select.min.js"></script>
</body>
</html>
