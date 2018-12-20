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
    <p class="heading3" style="color:#003399;">Send SMS</p>
    <div class="row">
      <form method="post" action="<?php echo base_url() ?>add/sendSms" >
        <?php echo $this->session->flashdata('success'); ?>
        <div class="form-row">
          <div class="form-group col-md-12">
            <label>Subject Name</label>
            <select name="subject_id" class="form-control" id="subject_id">
              <option value="">--Select--</option>
              <?php if(!empty($subject)) { foreach ($subject as $sb) { ?>
              <option value="<?php echo $sb->subject_id;  ?>"><?php echo $sb->subject;  ?></option>
              <?php } } ?>
            </select>
            <?php echo form_error('subject_id','<span class="text-danger">','</span>'); ?> 
          </div>
          <div class="form-group col-md-12">
            <label>SMS Title</label>
              <select class="form-control selectpicker" data-show-subtext="true" data-live-search="true" name="sms_id" onchange="return getSMSDescription(this.value)">
              <option value="" selected="" hidden="">--Select--</option>
              <?php if(!empty($allSms)){
                  foreach ($allSms as $sms) { ?>
              <option value="<?php echo $sms->sms_id; ?>"><?php echo $sms->sms_title; ?></option>
              <?php  } } ?>
          </select>
          <?php echo form_error('sms_id','<span class="text-danger">','</span>'); ?> 
          </div>
          <div id="smsDescDiv">
            <div class="form-group col-md-12">
                <label>SMS Template</label>
                <textarea class="form-control" name="sms_description" id="sms_description"></textarea>
                <?php echo form_error('sms_description','<span class="text-danger">','</span>'); ?> 
              </div>

          </div>
          <div class="form-group col-md-12">
            <label>Sent To</label>
            <select name="user_type" id="user_type" class="form-control" onchange="getAll(this.value)">
              <option value="">--Select--</option>
              <option value="STUDENT">Students</option>
              <option value="MENTOR">Mentors</option>
              <option value="ALL">All</option>
            </select>
          </div>

          
          <div id="sentTo">
         </div>

          
          <div class="form-group col-md-12">
            <button type="submit" id="submit" class="btn btn-primary">Add</button>
          </div>

        </div>
      </form>
    </div>
  </div>
</section>
<!-- ------- sliderBar section ends here --------------------------------->
<section id="sliderBar2">
  <div class="container">
    <p class="heading3" style="color:#003399;">SMS Send Details <span class="pull-right"> </span></p>
    <div class="row">
      <div class="col-md-12">
        <div class="table-responsive" style="">
          <table id="example" class="table table-striped table-bordered" style="width:100%">
            <thead>
              <tr>
                <th>#</th>
                <th>Subject</th>
                <th>SMS Title</th>
                <th>SMS Description</th>
                <th>Sent To</th>
                <th>User Type</th>
                <th>Action</th>
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

                    //SELECT `sms_send_id`, `subject_id`, `sms_id`, `user_type`, `user_id`, `created_date`, `created_time` FROM `tb_sms_send` WHERE 1

                    $deleteid = "sms_send_id";
                    $value = $v->sms_send_id;
                    $redirect = 'sendSms';
                    $tbl = 'tb_sms_send';

                    if($v->user_type=='M')
                    {
                       $mentor = $this->db->query("SELECT * FROM tb_mentors WHERE mentor_id=".$v->user_id)->row();
                       $name = $mentor->mentor_name;
                       $type = 'Mentor';
                    }

                    if($v->user_type=='S')
                    {
                       $student = $this->db->query("SELECT * FROM tb_students WHERE student_id=".$v->user_id)->row();
                       $name = $student->name;
                       $type = 'Student';
                    }



                   ?>

                        <tr>
                          <td><?php echo $i; ?> </td>
                          <td><?php echo $v->subject; ?></td>
                          <td><?php echo $v->sms_title; ?></td>
                          <td><?php echo $v->sms_description; ?></td>
                          <td><?php echo $name; ?></td>
                          <td><?php echo $type; ?></td>
                          <td><a onClick="return confirm('Would You Like To Delete This?');" href="<?php echo base_url() ?>delete/dlt/<?php echo $tbl; ?>/<?php echo $deleteid; ?>/<?php echo $value; ?>/<?php echo $redirect; ?>" class="btn btn-danger btn-xs">Delete</a></td>
                        </tr>
                        <?php  $i++; } } else { ?>
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


  function getSMSDescription(smsId)
  {
      j.ajax({
              type: "post",
              url: "<?php echo base_url() ?>add/getSms",
              data: {"smsId":smsId},
              // dataType: "dataType",
              success: function (response) {

                  //alert(response);
                  j("#sms_description").text(response);
              }
              });
  }


  function getAll(type)
  {
      var subject_id = j("#subject_id").val();


      j.ajax({
              type: "post",
              url: "<?php echo base_url() ?>add/getUsers",
              data: {"user_type":type,"subject_id":subject_id},
              dataType: "html",
              success: function (response) {

                  //alert(response);
                  console.log(response);
                  j("#sentTo").html(response);
              }
              });
  }

</script>

<script src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.6.3/js/bootstrap-select.min.js"></script>

</body>
</html>
