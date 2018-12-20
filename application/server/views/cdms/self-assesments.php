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
      <form method="post" action="<?php echo base_url() ?>add/self_assesments" >
        <?php echo $this->session->flashdata('success'); ?>
        <div class="form-row">
          <div class="form-group col-md-12">
            <label>Class</label>
            <select name="class_id" class="form-control">
              <option value="">--Select--</option>
              <?php if(!empty($class)) { foreach ($class as $cl) { ?>
              <option value="<?php echo $cl->class_id;  ?>"><?php echo $cl->class;  ?></option>
              <?php } } ?>
            </select>
            <?php echo form_error('class_id','<span class="text-danger">','</span>'); ?> </div>
          <div class="form-group col-md-12">
            <label>Subject Name</label>
            <select name="subject_id" class="form-control" onchange="chapter(this.value)">
              <option value="">--Select--</option>
              <?php if(!empty($subject)) { foreach ($subject as $sb) { ?>
              <option value="<?php echo $sb->subject_id;  ?>"><?php echo $sb->subject;  ?></option>
              <?php } } ?>
            </select>
            <?php echo form_error('subject_id','<span class="text-danger">','</span>'); ?> </div>
          <div class="form-group col-md-12">
            <label>Chapter</label>
            <div id="chapterDiv">
              <select name="chapter_id" class="form-control" >
                <option value="">--Select--</option>
                <?php if(!empty($chapter)) { foreach ($chapter as $ch) { ?>
                <option value="<?php echo $ch->chapter_id;  ?>"><?php echo $ch->chapter;  ?></option>
                <?php } } ?>
              </select>
              <?php echo form_error('chapter_id','<span class="text-danger">','</span>'); ?> </div>
          </div>
          <div class="form-group col-md-12">
            <label>Question No.1</label>
            <textarea name="question[]" class="form-control"></textarea>
          </div>
          <div class="form-group col-md-12">
            <label>Option</label>
            <select class="form-control" multiple="" name="options[0][]">
              <option value="A">A</option>
              <option value="B">B</option>
              <option value="C">C</option>
              <option value="D">D</option>
              <option value="E">E</option>
              <option value="F">F</option>
            </select>
          </div>
          <div class="form-group col-md-12">
            <label>Answer</label>
            <select class="form-control" name="result[]">
              <option value="">--Select--</option>
              <option value="A">A</option>
              <option value="B">B</option>
              <option value="C">C</option>
              <option value="D">D</option>
              <option value="E">E</option>
              <option value="F">F</option>
            </select>
          </div>
          <div id="more"> </div>
          <div class="form-group pull-right">
            <button type="button" id="submit" class="btn btn-success" onclick="addMore()"><i class="fa">&#xf067;</i>&nbsp;Add More Question</button>
          </div>
          <div class="form-group col-md-12">
            <button type="submit" id="submit" class="btn btn-primary">Add</button>
          </div>
        </div>
      </form>
    </div>
  </div>
</section>
<input type="hidden" name="Count" id="Count" value="0">
<!-- ------- sliderBar section ends here --------------------------------->
<section id="sliderBar2">
  <div class="container">
    <p class="heading3" style="color:#003399;">Question Details <span class="pull-right"> </span></p>
    <div class="row">
      <div class="col-md-12">
        <div class="table-responsive" style="">
          <table id="example" class="table table-striped table-bordered" style="width:100%">
            <thead>
              <tr>
                <th width="1%">#</th>
                <th width="22%">Class</th>
                <th width="22%">Subject</th>
                <th width="22%">Chapter</th>
                <th width="22%">Question</th>
                <!-- <th width="22%">Options</th>

                <th width="22%">Answer</th> -->
                <th width="15%">Action</th>
              </tr>
            </thead>
            <tbody>
              <?php 

        

        if($this->input->get('per_page')!='')

          {

            $i = $this->input->get('per_page')+1;

          }

          else

          {

            $i=1;

          }

        

        if(!empty($result)){ foreach($result as $k=>$v) { 



          $questions = $this->db->query("SELECT * FROM tb_self_assesment_q WHERE assmnt_id=".$v->assmnt_id." ORDER BY assmnt_q_id ASC")->result();





          foreach ($questions as $qtn){



            $options = $this->db->query("SELECT * FROM tb_assesments_opt WHERE assmnt_q_id=".$qtn->assmnt_q_id)->result();



            $opt = '';

            foreach ($options as $optn) {

               $opt.=$optn->options.',';

            }



          }



          

        

      ?>
              <tr>
                <td><?php echo $i; ?> </td>
                <td><?php echo $v->class; ?></td>
                <td><?php echo $v->subject; ?></td>
                <td><?php echo $v->chapter; ?></td>
                <td><?php foreach ($questions as $key=>$qtn){ 

                  echo "<strong>Question No.</strong>".($key+1)." ".$qtn->question.'<br>';

                  echo "<strong>Answer.</strong> ".$qtn->answer.'<br>';  



                } ?></td>
                <td><a href="<?php echo base_url() ?>edit/self_assesments/<?php echo $v->assmnt_id; ?>" class="btn btn-success btn-xs">Edit</a> <br>
                  <br>
                  <a onClick="return confirm('Would You Like To Delete This?');" href="<?php echo base_url() ?>delete/student/<?php echo $v->assmnt_id; ?>" class="btn btn-danger btn-xs">Delete</a></td>
              </tr>
              <?php  $i++; } 

        

        } else { ?>
              <tr >
                <td colspan="7" align="center">No data found</td>
              </tr>
              <?php } ?>
            </tbody>
          </table>
          
        </div>
      </div>
    </div>
  </div>
</section>
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



  var count = parseInt(jQuery("#Count").val())+1;

  console.log(jQuery("#Count").val());

  jQuery("#Count").val(count);





   var html='<div id="newDiv'+count+'"><div class="form-group col-md-12"> <label>Question No.'+(count+1)+'</label> <textarea name="question[]" class="form-control"></textarea> </div><div class="form-group col-md-12"> <label>Option</label> <select class="form-control" multiple="" name="options['+count+'][]"> <option value="A">A</option> <option value="B">B</option> <option value="C">C</option> <option value="D">D</option> <option value="E">E</option> <option value="F">F</option> </select> </div><div class="form-group col-md-12"> <label>Answer</label> <select class="form-control" name="result[]"> <option value="">--Select--</option> <option value="A">A</option> <option value="B">B</option> <option value="C">C</option> <option value="D">D</option> <option value="E">E</option> <option value="F">F</option> </select> </div> <div class="form-group pull-right"> &nbsp; <button type="button" id="submit" class="btn btn-danger" onclick="remove('+count+')"><i class="fa fa-minus" aria-hidden="true"></i>&nbsp;Remove</button> </div></div>';



   jQuery("#more").append(html);



 }





 function remove(count)

 {

   // alert("newDiv"+count);

    jQuery("#newDiv"+count).remove();

 }





</script>
</body>
</html>
