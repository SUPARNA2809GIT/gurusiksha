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
    <p class="heading3" style="color:#003399;">Mentor Registration</p>
    <div class="row">
    
      <form method="post" action="<?php echo base_url() ?>edit/mentor/<?php echo $v->mentor_id; ?>" >
       <?php echo $this->session->flashdata('success'); ?>
        <div class="form-row">

          <div class="col-md-12">
          <div class="form-group col-md-6">
            <label>Name</label>
            <input type="text" class="form-control" id="cust-name" name="name" value="<?php echo $v->mentor_name; ?>">
            <?php echo form_error('name','<span class="text-danger">','</span>'); ?>
          </div>
          <div class="form-group col-md-6">
            <label>DOB</label>
            <input type="date" class="form-control" id="cust-name" name="dob" value="<?php echo $v->mentor_dob; ?>">
            <?php echo form_error('dob','<span class="text-danger">','</span>'); ?>
          </div>
        </div>

          <div class="col-md-12">
          <div class="form-group col-md-6">
            <label>Gender</label>
             <select class="form-control" id="cust-name" name="gender">
              <option value="">--Select --</option>
              <option value="Male"<?php if($v->mentor_gender=='Male') echo "selected='selected'" ?>>Male</option>
              <option value="Female"<?php if($v->mentor_gender=='Female') echo "selected='selected'" ?>>Female</option>
            </select>
            <?php echo form_error('gender','<span class="text-danger">','</span>'); ?>
          </div>
          <div class="form-group col-md-6">
            <label>Email</label>
            <input type="email" class="form-control" id="cust-name" name="email" value="<?php echo $v->mentor_email; ?>">
            <?php echo form_error('email','<span class="text-danger">','</span>'); ?>
          </div>
        </div>

        <div class="col-md-12">
          <div class="form-group col-md-6">
            <label>Mobile</label>
            <input type="text" class="form-control" id="cust-name" name="mobile" maxlength="10" value="<?php echo $v->mentor_mobile; ?>">
            <?php echo form_error('mobile','<span class="text-danger">','</span>'); ?>
          </div>
          <div class="form-group col-md-6">
            <label>Address</label>
            <textarea type="text" class="form-control" id="cust-name" name="address"><?php echo $v->mentor_address; ?></textarea>
            <?php echo form_error('address','<span class="text-danger">','</span>'); ?>
          </div>
        </div>

        <div class="col-md-12">
          <div class="form-group col-md-6">
            <label>Pin</label>
            <input type="text" class="form-control" id="cust-name" name="pin" value="<?php echo $v->mentor_pin; ?>">
            <?php echo form_error('pin','<span class="text-danger">','</span>'); ?>
          </div>
          <div class="form-group col-md-6">
            <label>Associated School</label>
            <input type="text" class="form-control" id="cust-name" name="school" value="<?php echo $v->associated_school; ?>">
            <?php echo form_error('school','<span class="text-danger">','</span>'); ?>
          </div>
        </div>

        <div class="col-md-12">
          <div class="form-group col-md-6">
            <label>About Me</label>
            <textarea type="text" class="form-control" id="cust-name" name="about" ><?php echo $v->about; ?></textarea>
            <?php echo form_error('about','<span class="text-danger">','</span>'); ?>
          </div>
          <div class="form-group col-md-6">
            <label>Achievements</label>
            <textarea type="text" class="form-control" id="cust-name" name="achievement"><?php echo $v->achievements; ?></textarea>
            <?php echo form_error('achievement','<span class="text-danger">','</span>'); ?>
          </div>
        </div>

        <div class="col-md-12">
          <div class="form-group col-md-6">
            <label>Teaching Subjects</label>
            <select class="form-control" id="cust-name" name="subjects[]" multiple="">
              <option value="">--Select--</option>
              <?php foreach ($subject as $sb) {

              $mentor = $this->db->query("SELECT * FROM tb_mentors_subject WHERE mentor_id=".$v->mentor_id." AND subject_id=".$sb->subject_id)->result();

              if(count($mentor)>0)
              {
                $temp = "selected='selected'";
              }
              else {
                $temp = '';
              }

               ?>
                <option value="<?php echo $sb->subject_id; ?>" <?php echo $temp; ?>><?php echo $sb->subject; ?></option>
             <?php } ?>
            </select>
            <?php echo form_error('subjects[]','<span class="text-danger">','</span>'); ?>
          </div>

          <div class="form-group col-md-6">
            <label>Preferred Day</label>
            <select class="form-control" id="cust-name" name="day">
              <option value="">--Select --</option>
              <?php foreach ($days as $dy) { ?>
                <option value="<?php echo $dy->day; ?>" <?php if($dy->day==$v->mentor_preferred_day) echo "selected='selected'"; ?>><?php echo $dy->day; ?></option>
             <?php } ?>
            </select>
            <?php echo form_error('day','<span class="text-danger">','</span>'); ?>
          </div>

        </div>

        <div class="col-md-12">
          <div class="form-group col-md-6">
            <label>Preferred Time</label>
            <select class="form-control" id="cust-name" name="time">
              <option value="">--Select --</option>
              <?php foreach ($time as $tm) { ?>
                <option value="<?php echo $tm->time; ?>" <?php if($tm->time==$v->mentor_preferred_time) echo "selected='selected'"; ?>><?php echo date('h:i A', strtotime($tm->time)); ?></option>
             <?php } ?>
            </select>
            <?php echo form_error('time','<span class="text-danger">','</span>'); ?>
          </div>

          <div class="form-group col-md-6">
            <label>Language</label>
            <select class="form-control" id="cust-name" name="language">
              <option value="">--Select --</option>
              <?php foreach ($language as $lang) { ?>
<option value="<?php echo $lang->language_name; ?>" <?php if($lang->language_name==$v->mentor_language) echo "selected='selected'"; ?> ><?php echo $lang->language_name; ?></option>
             <?php } ?>
            </select>
            <?php echo form_error('language','<span class="text-danger">','</span>'); ?>
          </div>

        </div>

        <div class="col-md-12">
          <div class="form-group col-md-6">
            <label>Qualification</label>
            <input type="text" class="form-control" id="cust-name" name="qualification" value="<?php echo $v->mentor_qualification; ?>">
            
          </div>
          <div class="form-group col-md-6">
            <label>Experience</label>
            <input type="text" class="form-control" id="cust-name" name="experience" value="<?php echo $v->mentor_experience; ?>">
            
          </div>
        </div>
        
        <div class="col-md-12">
          <div class="form-group col-md-6">
            <label>Fees</label>
            <input type="text" class="form-control" id="mentor_fee" name="mentor_fee" value="<?php echo $v->mentor_fee; ?>">
          </div>
        </div>
        
        <div class="col-md-12">
          <div class="form-group col-md-12">
            <button type="submit" id="submit" class="btn btn-primary">Update</button>
            <a href="<?php echo base_url() ?>add/mentor" class="btn btn-primary">Back To List</a>
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
