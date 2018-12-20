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
    <p class="heading3" style="color:#003399;">Send SMS</p>
    <div class="row">
    
      <form method="post" action="<?php echo base_url() ?>add/sms" >
       <?php echo $this->session->flashdata('success'); ?>
        <div class="form-row">

          <div class="form-group col-md-12">
            <label>Subject Name</label>
            <select name="subject_id" class="form-control">
              <option value="">--Select--</option>
              <?php if(!empty($subject)) { foreach ($subject as $sb) { ?>

                <option value="<?php echo $sb->subject_id;  ?>"><?php echo $sb->subject;  ?></option>
                
            <?php } } ?>
            </select>
            <?php echo form_error('subject_id','<span class="text-danger">','</span>'); ?>
          </div>


          <div class="form-group col-md-12">
            <label>Class</label>
            <select name="class_id" class="form-control">
              <option value="">--Select--</option>
              <?php if(!empty($class)) { foreach ($class as $cl) { ?>
                <option value="<?php echo $cl->class;  ?>"><?php echo $cl->class;  ?></option>
            <?php } } ?>
            </select>
            <?php echo form_error('class_id','<span class="text-danger">','</span>'); ?>
          </div>

          <div class="form-group col-md-12">
            <label>SMS Title</label>
            <input type="text" class="form-control" id="cust-name" name="sms_title">
            <?php echo form_error('sms_title','<span class="text-danger">','</span>'); ?>
          </div>

          <div class="form-group col-md-12">
            <label>SMS Title</label>
            <textarea class="form-control" id="cust-name" name="sms_description"></textarea>
            <?php echo form_error('sms_description','<span class="text-danger">','</span>'); ?>
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
    <p class="heading3" style="color:#003399;">SMS Details <span class="pull-right">
      
      </span></p>
    <div class="row">
      <div class="col-md-12">
        <div class="table-responsive" style="">
          <table id="example" class="table table-striped table-bordered" style="width:100%">
            <thead>
              <tr>
                <th>#</th>
                <th>Subject</th>
                <th>Class</th>
                <th>Phone No</th>
                <th>SMS Title</th>
                <th>Description</th>
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
				
				if(!empty($result)){ foreach($result as $k=>$v) { ?>

          <tr>
            <td><?php echo $i; ?> </td>
            <td><?php echo $v->subject; ?></td>
            <td><?php echo $v->class; ?></td>
            <td><?php echo $v->mobile_no; ?></td>
            <td><?php echo $v->sms_title; ?></td>
            <td><?php echo $v->sms_description; ?></td>
            <td>
              <a onClick="return confirm('Would You Like To Delete This?');" href="<?php echo base_url() ?>delete/fees/<?php echo $v->sms_id; ?>" class="btn btn-danger btn-xs">Delete</a></td>
          </tr>

           <?php  $i++; }  

         } else { ?> 

			  <tr ><td colspan="7" align="center">No data found</td></tr>
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
</script>
</body>
</html>
