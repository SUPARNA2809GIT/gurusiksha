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
    <p class="heading3" style="color:#003399;">Add Subject Fee</p>
    <div class="row">
    
      <form method="post" action="<?php echo base_url() ?>edit/fees/<?php echo $v->fee_id; ?>" >
       <?php echo $this->session->flashdata('success'); ?>
        <div class="form-row">
          <div class="form-group col-md-12">
            <label>Subject Name</label>
            <select name="subject_id" class="form-control">
              <option value="">--Select--</option>
              <?php if(!empty($subject)) { foreach ($subject as $sb) { ?>

                <option value="<?php echo $sb->subject_id;  ?>" <?php if($sb->subject_id==$v->subject_id) echo "selected='selected'"; ?>><?php echo $sb->subject;  ?></option>
                
            <?php } } ?>
            </select>
            <?php echo form_error('subject_id','<span class="text-danger">','</span>'); ?>
          </div>

          <div class="form-group col-md-12">
            <label>Chapter Name</label>
            <select name="chapter_id" class="form-control">
              <option value="">--Select--</option>
              <?php if(!empty($chapter)) { foreach ($chapter as $ch) { ?>

                <option value="<?php echo $ch->chapter_id;  ?>" <?php if($ch->chapter_id==$v->chapter_id) echo "selected='selected'"; ?>><?php echo $ch->chapter;  ?></option>
                
            <?php } } ?>
            </select>
            <?php echo form_error('chapter_id','<span class="text-danger">','</span>'); ?>
          </div>


          <div class="form-group col-md-12">
            <label>Amount</label>
            <input type="number" class="form-control" id="cust-name" name="fees" value="<?php echo $v->fee; ?>">
            <?php echo form_error('fees','<span class="text-danger">','</span>'); ?>
          </div>

          <div class="form-group col-md-12">
            <button type="submit" id="submit" class="btn btn-primary">Update</button>
            <a href="<?php echo base_url() ?>add/fees" class="btn btn-primary">Back To List</a>
          </div>
        </div>
      </form>
    </div>
  </div>
</section>
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
