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
    <p class="heading3" style="color:#003399;">SMS</p>
    <div class="row">
      <form method="post" action="<?php echo base_url() ?>edit/sms/<?php echo $v->sms_id; ?>" >
        <?php echo $this->session->flashdata('success'); ?>
        <div class="form-row">

          <div class="form-group col-md-12">
            <label>SMS Title</label>
            <input type="text" class="form-control" id="cust-name" name="sms_title" value="<?php echo $v->sms_title; ?>">
            <?php echo form_error('sms_title','<span class="text-danger">','</span>'); ?> 
          </div>

          <div class="form-group col-md-12">
            <label>SMS Description</label>
            <textarea class="form-control" id="cust-name" name="sms_description"><?php echo $v->sms_description; ?></textarea>
            <?php echo form_error('sms_description','<span class="text-danger">','</span>'); ?> 
          </div>

          <div class="form-group col-md-12">
            <button type="submit" id="submit" class="btn btn-primary">Edit</button>
          </div>
        </div>
      </form>
    </div>
  </div>
</section>
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

</script>
</body>
</html>
