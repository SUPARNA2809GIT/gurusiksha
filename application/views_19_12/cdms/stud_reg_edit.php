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
    <p class="heading3" style="color:#003399;">Student Registration</p>
    <div class="row">
    
      <form method="post" action="<?php echo base_url() ?>edit/student/<?php echo $v->student_id; ?>" >
       <?php echo $this->session->flashdata('success'); ?>
        <div class="form-row">

          <div class="col-md-12">
            <div class="form-group col-md-6">
              <label>Name</label>
              <input type="text" class="form-control" id="cust-name" name="name" value="<?php echo $v->name; ?>">
              <?php echo form_error('name','<span class="text-danger">','</span>'); ?>
            </div>
            <div class="form-group col-md-6">
              <label>DOB</label>
              <input type="date" class="form-control" id="cust-name" name="dob" value="<?php echo $v->dob; ?>">
              <?php echo form_error('dob','<span class="text-danger">','</span>'); ?>
            </div>
         </div>


          <div class="col-md-12">
            <div class="form-group col-md-6">
              <label>Gender</label>
               <select class="form-control" id="cust-name" name="gender">
                <option value="">--Select --</option>
                <option value="Male" <?php if($v->gender=='Male') echo "selected='selected'" ?>>Male</option>
                <option value="Female" <?php if($v->gender=='Female') echo "selected='selected'" ?>>Female</option>
              </select>
              <?php echo form_error('gender','<span class="text-danger">','</span>'); ?>
            </div>
            <div class="form-group col-md-6">
              <label>Email</label>
              <input type="email" class="form-control" id="cust-name" name="email" value="<?php echo  $v->email; ?>">
              <?php echo form_error('email','<span class="text-danger">','</span>'); ?>
            </div>
         </div>


        <div class="col-md-12">
          <div class="form-group col-md-6">
            <label>Mobile</label>
            <input type="text" class="form-control" id="cust-name" name="mobile" maxlength="10" value="<?php echo  $v->mobile; ?>">
            <?php echo form_error('mobile','<span class="text-danger">','</span>'); ?>
          </div>
          <div class="form-group col-md-6">
            <label>Address</label>
            <textarea type="text" class="form-control" id="cust-name" name="address"><?php echo  $v->address; ?></textarea>
            <?php echo form_error('address','<span class="text-danger">','</span>'); ?>
          </div>
        </div>

        <div class="col-md-12">
          <div class="form-group col-md-6">
            <label>Pin</label>
            <input type="text" class="form-control" id="cust-name" name="pin" value="<?php echo  $v->pin; ?>">
            <?php echo form_error('pin','<span class="text-danger">','</span>'); ?>
          </div>
          <div class="form-group col-md-6">
            <label>School</label>
            <input type="text" class="form-control" id="cust-name" name="school" value="<?php echo  $v->school; ?>">
            <?php echo form_error('school','<span class="text-danger">','</span>'); ?>
          </div>
        </div>

        <div class="col-md-12">
          <div class="form-group col-md-6">
            <label>class</label>
            <select class="form-control" id="cust-name" name="class">
              <option value="">--Select --</option>
              <?php foreach ($class as $cl) { ?>
                <option value="<?php echo $cl->class; ?>" <?php if($cl->class==$v->class) echo "selected='selected'" ?>><?php echo $cl->class; ?></option>
             <?php } ?>
              
            </select>
            <?php echo form_error('class','<span class="text-danger">','</span>'); ?>
          </div>
          <div class="form-group col-md-6">
            <label>Board Name</label>
            <input type="text" class="form-control" id="cust-name" name="board" value="<?php echo $v->board_name; ?>">
            <?php echo form_error('board','<span class="text-danger">','</span>'); ?>
          </div>
        </div>

        <div class="col-md-12">
          <div class="form-group col-md-6">
            <label>Subjects</label>
            <select class="form-control" id="cust-name" name="subjects[]" multiple="">
              <option value="">--Select--</option>
              <?php foreach ($subject as $sb) {

                $stud = $this->db->query("SELECT * FROM tb_students_subject WHERE student_id=".$v->student_id." AND subject_id=".$sb->subject_id)->result();

              if(count($stud)>0)
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
                <option value="<?php echo $dy->day; ?>" <?php if($dy->day==$v->preferred_day) echo "selected='selected'"; ?>><?php echo $dy->day; ?></option>
             <?php } ?>
            </select>
            <?php echo form_error('customer-name','<span class="text-danger">','</span>'); ?>
          </div>
        </div>

        <div class="col-md-12">
          <div class="form-group col-md-6">
            <label>Preferred Time</label>
            <select class="form-control" id="cust-name" name="time">
              <option value="">--Select --</option>
              <?php foreach ($time as $tm) { ?>
                <option value="<?php echo $tm->time; ?>" <?php if($tm->time==$v->preferred_time) echo "selected='selected'"; ?>><?php echo date('h:i A', strtotime($tm->time)); ?></option>
             <?php } ?>
            </select>
            <?php echo form_error('time','<span class="text-danger">','</span>'); ?>
          </div>
          <div class="form-group col-md-6">
            <label>Language</label>
            <select class="form-control" id="cust-name" name="language">
              <option value="">--Select --</option>
              <?php foreach ($language as $lang) { ?>
                <option value="<?php echo $lang->language_name; ?>" <?php if($lang->language_name==$v->language) echo "selected='selected'"; ?>><?php echo $lang->language_name; ?></option>
             <?php } ?>
            </select>
            <?php echo form_error('language','<span class="text-danger">','</span>'); ?>
          </div>
        </div>

        <div class="col-md-12">
          <div class="form-group col-md-6">
            <label>Guardian Name</label>
            <input type="text" class="form-control" id="cust-name" name="gname" value="<?php echo $v->guardian_name; ?>">
            <?php echo form_error('gname','<span class="text-danger">','</span>'); ?>
          </div>
          <div class="form-group col-md-6">
            <label>Guardian Phone</label>
            <input type="text" class="form-control" id="cust-name" name="g_phn" maxlength="10" value="<?php echo $v->guardian_phone; ?>">
            <?php echo form_error('g_phn','<span class="text-danger">','</span>'); ?>
          </div>

        </div>


        <div class="col-md-12">
          <div class="form-group col-md-12">
            <button type="submit" id="submit" class="btn btn-primary">Update</button>
            <a href="<?php echo base_url(); ?>add/student" id="submit" class="btn btn-primary">Back To List</a>
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
