

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">

<head>

<?php $this->load->view('cdms/include/header'); ?>

<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap.min.css">

</head>

<body>

<?php $this->load->view('cdms/include/nav_bar'); ?>

<!-- ------- topfixedmenuBar section ends here --------------------------------->

<section id="sliderBar">

  <div class="container">

    <p class="heading3" style="color:#003399;">Self Assesments</p>

    <div class="row">

    

      <form method="post" action="<?php echo base_url() ?>edit/self_assesments/<?php echo $v->assmnt_id; ?>" >

       <?php echo $this->session->flashdata('success'); ?>

        <div class="form-row">


          <div class="form-group col-md-12">
            <label>Assesment Type &nbsp;&nbsp;&nbsp;</label>
            <input type="radio" name="asses_type" value="c" <?php if($v->assessment_type=='c') echo "checked='checked'"; ?>>&nbsp;Chapter Wise
            &nbsp;&nbsp;&nbsp;<input type="radio" name="asses_type" value="m" <?php if($v->assessment_type=='m') echo "checked='checked'"; ?>>&nbsp;Monthly Wise
            
            <?php echo form_error('asses_type','<span class="text-danger">','</span>'); ?> 
          </div>



          <div class="form-group col-md-12">

            <label>Class</label>

            <select name="class_id" class="form-control">

              <option value="">--Select--</option>

              <?php if(!empty($class)) { foreach ($class as $cl) { ?>

                <option value="<?php echo $cl->class_id;  ?>" <?php if( $cl->class_id==$v->class_id) echo "selected='selected'"; ?>><?php echo $cl->class;  ?></option>

            <?php } } ?>

            </select>

            <?php echo form_error('class_id','<span class="text-danger">','</span>'); ?>

          </div>



          <div class="form-group col-md-12">

            <label>Subject Name</label>

            <select name="subject_id" class="form-control" onchange="chapter(this.value)">

              <option value="">--Select--</option>

              <?php if(!empty($subject)) { foreach ($subject as $sb) { ?>



                <option value="<?php echo $sb->subject_id;  ?>" <?php if($sb->subject_id==$v->subject_id) echo "selected='selected'"; ?>><?php echo $sb->subject; ?></option>

                

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



                  <option value="<?php echo $ch->chapter_id;  ?>" <?php if($ch->chapter_id==$v->chapter_id) echo "selected='selected'"; ?><?php echo $sb->subject; ?>><?php echo $ch->chapter;  ?></option>

                  

              <?php } } ?>

              </select>

              <?php echo form_error('chapter_id','<span class="text-danger">','</span>'); ?>

            </div>

          </div>





          <?php





          $questions = $this->db->query("SELECT * FROM tb_self_assesment_q WHERE assmnt_id=".$v->assmnt_id." ORDER BY assmnt_q_id ASC")->result();



           if(!empty($questions)) { foreach ($questions as $key => $qs) {



           $option1 = $this->db->query("SELECT * FROM tb_assesments_opt WHERE assmnt_q_id=".$qs->assmnt_q_id." AND options='A'")->result();



          $option2 = $this->db->query("SELECT * FROM tb_assesments_opt WHERE assmnt_q_id=".$qs->assmnt_q_id." AND options='B'")->result();



          $option3 = $this->db->query("SELECT * FROM tb_assesments_opt WHERE assmnt_q_id=".$qs->assmnt_q_id." AND options='C'")->result();



          $option4 = $this->db->query("SELECT * FROM tb_assesments_opt WHERE assmnt_q_id=".$qs->assmnt_q_id." AND options='D'")->result();



          $option5 = $this->db->query("SELECT * FROM tb_assesments_opt WHERE assmnt_q_id=".$qs->assmnt_q_id." AND options='E'")->result();



          $option6 = $this->db->query("SELECT * FROM tb_assesments_opt WHERE assmnt_q_id=".$qs->assmnt_q_id." AND options='F'")->result();









          ?>



          <div id="newDiv<?php echo $key; ?>">

            <div class="form-group col-md-12">

              <label>Question No.<?php echo $key+1; ?></label>

              <textarea name="question[]" class="form-control"><?php echo $qs->question; ?></textarea>

            </div>

            <div class="form-group col-md-12">

              <label>Option</label>

              <select class="form-control" multiple="" name="options[<?php echo $key; ?>][]">

                <option value="A" <?php if(count($option1)>0) echo "selected='selected'"; ?>>A</option>

                <option value="B" <?php if(count($option2)>0) echo "selected='selected'"; ?>>B</option>

                <option value="C" <?php if(count($option3)>0) echo "selected='selected'"; ?>>C</option>

                <option value="D" <?php if(count($option4)>0) echo "selected='selected'"; ?>>D</option>

                <option value="E" <?php if(count($option5)>0) echo "selected='selected'"; ?>>E</option>

                <option value="F" <?php if(count($option6)>0) echo "selected='selected'"; ?>>F</option>

              </select>

            </div>

            <div class="form-group col-md-12">

              <label>Answer</label>

              <select class="form-control" name="result[]">

                <option value="">--Select--</option>

                <option value="A" <?php if($qs->answer=='A') echo "selected='selected'"; ?>>A</option>

                <option value="B" <?php if($qs->answer=='B') echo "selected='selected'"; ?>>B</option>

                <option value="C" <?php if($qs->answer=='C') echo "selected='selected'"; ?>>C</option>

                <option value="D" <?php if($qs->answer=='D') echo "selected='selected'"; ?>>D</option>

                <option value="E" <?php if($qs->answer=='E') echo "selected='selected'"; ?>>E</option>

                <option value="F" <?php if($qs->answer=='F') echo "selected='selected'"; ?>>F</option>

              </select>

            </div>

          </div>



          

          <div class="form-group pull-right">

            <button type="button" id="submit" class="btn btn-danger" onclick="remove(<?php echo $key; ?>)""><i class="fa fa-minus" aria-hidden="true"></i>&nbsp;Remove</button>

          </div>





        <?php  } } ?>



          <div id="more"></div>

          

          <br><br><br>



          <div class="form-group pull-right">

            <button type="button" id="submit" class="btn btn-success" onclick="addMore()"><i class="fa">&#xf067;</i>&nbsp;Add More Question</button>

          </div> 





          <div class="form-group col-md-12">

            <button type="submit" id="submit" class="btn btn-primary">Update</button>

            <a href="<?php echo base_url(); ?>add/self_assesments" id="submit" class="btn btn-primary">Back To List</a>

          </div>



        </div>

      </form>

    </div>

  </div>

</section>



<input type="hidden" name="Count" id="Count" value="<?php echo count($questions); ?>">

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



    //alert("ssss");



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



  var count = parseInt(jQuery("#Count").val());

  console.log(jQuery("#Count").val());

  jQuery("#Count").val(count+1);





   var html='<div id="newDiv'+(count+1)+'"><div class="form-group col-md-12"> <label>Question No.'+(count+1)+'</label> <textarea name="question[]" class="form-control"></textarea> </div><div class="form-group col-md-12"> <label>Option</label> <select class="form-control" multiple="" name="options['+count+'][]"> <option value="A">A</option> <option value="B">B</option> <option value="C">C</option> <option value="D">D</option> <option value="E">E</option> <option value="F">F</option> </select> </div><div class="form-group col-md-12"> <label>Answer</label> <select class="form-control" name="result[]"> <option value="">--Select--</option> <option value="A">A</option> <option value="B">B</option> <option value="C">C</option> <option value="D">D</option> <option value="E">E</option> <option value="F">F</option> </select> </div> <div class="form-group pull-right"> &nbsp; <button type="button" id="submit" class="btn btn-danger" onclick="remove('+(count+1)+')"><i class="fa fa-minus" aria-hidden="true"></i>&nbsp;Remove</button> </div></div>';



   jQuery("#more").append(html);



 }





 function remove(count)

 {

    jQuery("#newDiv"+count).remove();

 }





</script>

</body>

</html>

