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
    <p class="heading3" style="color:#003399;">Update Teaching Days</p>
    <div class="row">
    
      <form method="post" action="<?php echo base_url() ?>edit/days/<?php echo $v->day_id; ?>" >
       <?php echo $this->session->flashdata('success'); ?>
        <div class="form-row">
          <div class="form-group col-md-12">
            <label>Days Name</label>
            <select class="form-control" id="cust-name" name="day-name">
              <option value="">--Select --</option>
              <option value="Monday" <?php if($v->day == 'Monday'){ ?>selected <?php } ?>>Monday</option>
              <option value="Tuesday" <?php if($v->day == 'Tuesday'){ ?>selected <?php } ?>>Tuesday</option>
              <option value="Wednesday" <?php if($v->day == 'Wednesday'){ ?>selected <?php } ?>>Wednesday</option>
              <option value="Thursday" <?php if($v->day == 'Thursday'){ ?>selected <?php } ?>>Thursday</option>
              <option value="Friday" <?php if($v->day == 'Friday'){ ?>selected <?php } ?>>Friday</option>
              <option value="Saturday" <?php if($v->day == 'Saturday'){ ?>selected <?php } ?>>Saturday</option>
              <option value="Sunday" <?php if($v->day == 'Sunday'){ ?>selected <?php } ?>>Sunday</option>
            </select>
            
            <?php echo form_error('day-name','<span class="text-danger">','</span>'); ?>
          </div>
          <div class="form-group col-md-12">
            <button type="submit" id="submit" class="btn btn-primary">Update</button>
            <a href="<?php echo base_url() ?>add/days" class="btn btn-primary">Back To List</a>
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
</body>
</html>
