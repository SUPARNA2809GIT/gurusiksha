<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<?php $this->load->view('cdms/include/header'); ?>
</head>
<body>
<?php $this->load->view('cdms/include/nav_bar'); ?>
<!-- ------- topfixedmenuBar section ends here --------------------------------->
<section id="sliderBar">
  <div class="container">
    <p class="heading3" style="color:#003399; text-align:center;">Change Password</p>
    <div class="row">
      <div class="col-md-3"></div>
      <div class="col-md-6">
        <div class="well">
          <form action="<?php echo base_url() ?>change_password/save_changes" method="post">
           <?php echo $this->session->flashdata('success'); ?>
            <div class="form-group">
              <label>Old Password</label>
              <input type="password" class="form-control" id="choose-customer" name="oldPass">
               <?php echo form_error('oldPass','<span class="text-danger">','</span>'); ?>
            </div>
            <div class="form-group">
              <label>New Password</label>
              <input type="password" class="form-control" id="choose-customer" name="password">
               <?php echo form_error('password','<span class="text-danger">','</span>'); ?>
            </div>
            <div class="form-group">
              <label>Re-type New Password</label>
              <input type="password" class="form-control" id="choose-customer" name="cnfpwd">
               <?php echo form_error('cnfpwd','<span class="text-danger">','</span>'); ?>
            </div>
            <div class="form-group text-center">
              <button type="submit" class="btn btn-primary">Change</button>
            </div>
          </form>
        </div>
      </div>
      <div class="col-md-3"></div>
    </div>
  </div>
</section>
</br></br></br>
<!-- ------- sliderBar section ends here --------------------------------->
<?php $this->load->view('cdms/include/footer'); ?>
<!-- ------- footBar section ends here --------------------------------->
</body>
</html>
