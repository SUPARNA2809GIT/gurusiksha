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
    <p class="heading3" style="color:#003399;">Document Charge</p>
    <div class="row">
    
      <form method="post" action="<?php echo base_url() ?>edit/document_charge/<?php echo $v->charge_id; ?>" >
       <?php echo $this->session->flashdata('success'); ?>
        <div class="form-row">

          <div class="form-group col-md-12">
            <label>Document Type</label>
            <select class="form-control" name="document_type">
              <option value="">--Select--</option>
              <option value="Image" <?php if($v->doc_type=='Image') echo "selected='selected'"; ?>>Image</option>
              <option value="Audio" <?php if($v->doc_type=='Audio') echo "selected='selected'"; ?>>Audio</option>
              <option value="Video" <?php if($v->doc_type=='Video') echo "selected='selected'"; ?>>Video</option>
              <option value="PDF"   <?php if($v->doc_type=='PDF') echo "selected='selected'"; ?>>PDF</option>
            </select>
            <?php echo form_error('document_type','<span class="text-danger">','</span>'); ?>
          </div>
          
          
          <div class="form-group col-md-12">
            <label>Fee</label>
            <input type="number" name="doc_fee" class="form-control" value="<?php echo $v->fee; ?>">
            <?php echo form_error('doc_fee','<span class="text-danger">','</span>'); ?>
          </div>

          <div class="form-group col-md-12">
            <button type="submit" id="submit" class="btn btn-primary">Update</button>
            <a href="<?php echo base_url(); ?>add/document_charge" class="btn btn-primary">Back To List</a>
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


</script>
<script src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.6.3/js/bootstrap-select.min.js"></script>
</body>
</html>
