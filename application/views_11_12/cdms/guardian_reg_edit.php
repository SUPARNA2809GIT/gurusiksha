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
    <p class="heading3" style="color:#003399;">Guardian Registration</p>
    <div class="row">
    
       <form method="post" action="<?php echo base_url() ?>edit/guardian/<?php echo $v->guardian_id; ?>" >
       <?php echo $this->session->flashdata('success'); ?>
        <div class="form-row">

          <div class="col-md-12">
            <div class="form-group col-md-6">
              <label>Name</label>
              <input type="text" class="form-control" id="cust-name" name="name" value="<?php echo $v->guardian_name; ?>">
              <?php echo form_error('name','<span class="text-danger">','</span>'); ?>
            </div>
            <div class="form-group col-md-6">
              <label>Gender</label>
               <select class="form-control" id="cust-name" name="gender">
                <option value="">--Select --</option>
                <option value="Male"<?php if($v->guardian_gender=='Male') echo "selected='selected'"; ?>>Male</option>
                <option value="Female"<?php if($v->guardian_gender=='Female') echo "selected='selected'"; ?>>Female</option>
              </select>
              <?php echo form_error('gender','<span class="text-danger">','</span>'); ?>
            </div>
        </div>

        <div class="col-md-12">
          <div class="form-group col-md-6">
            <label>Email</label>
            <input type="text" class="form-control" id="cust-name" name="email" value="<?php echo $v->guardian_email; ?>">
            <?php echo form_error('email','<span class="text-danger">','</span>'); ?>
          </div>
          <div class="form-group col-md-6">
            <label>Mobile</label>
            <input type="text" class="form-control" id="cust-name" name="mobile" value="<?php echo $v->guardian_mobile; ?>">
            <?php echo form_error('mobile','<span class="text-danger">','</span>'); ?>
          </div>
        </div>
        
        <div class="col-md-12">
          <div class="form-group col-md-6">
            <label>Pin</label>
            <input type="text" class="form-control" id="cust-name" name="pin" value="<?php echo $v->guardian_pin; ?>">
            <?php echo form_error('pin','<span class="text-danger">','</span>'); ?>
          </div>
          <div class="form-group col-md-6">
            <label>Relationship with student</label>
            <input type="text" class="form-control" id="cust-name" name="rel_with_stud" value="<?php echo $v->rel_with_stud; ?>">
            <?php echo form_error('rel_with_stud','<span class="text-danger">','</span>'); ?>
          </div>
        </div>
        
        <div class="col-md-12">
          <div class="form-group col-md-6">
            <label>Address</label>
            <textarea type="text" class="form-control" id="cust-name" name="address"><?php echo $v->guardian_address; ?></textarea>
            <?php echo form_error('address','<span class="text-danger">','</span>'); ?>
          </div>
        </div>
          
        <div class="col-md-12">
          <div class="form-group col-md-12">
            <button type="submit" id="submit" class="btn btn-primary">Update</button>
            <a href="<?php echo base_url(); ?>add/guardian" class="btn btn-primary">Back To List</a>
          </div>
        </div>
        </div>
      </form>
    </div>
  </div>
</section>
<?php $this->load->view('cdms/include/footer'); ?>
<!-- ------- footBar section ends here --------------------------------->
</body>
</html>
