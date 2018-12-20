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
    <p class="heading3" style="color:#003399;">Mentor Registration</p>
    <div class="row">
      <form method="post" action="<?php echo base_url() ?>add/mentor" >
        <?php echo $this->session->flashdata('success'); ?>
        <div class="form-row">
          <div class="col-md-12">
            <div class="form-group col-md-6">
              <label>Name</label>
              <input type="text" class="form-control" id="cust-name" name="name">
              <?php echo form_error('name','<span class="text-danger">','</span>'); ?> </div>
            <div class="form-group col-md-6">
              <label>DOB</label>
              <input type="date" class="form-control" id="cust-name" name="dob">
              <?php echo form_error('dob','<span class="text-danger">','</span>'); ?> </div>
          </div>
          <div class="col-md-12">
            <div class="form-group col-md-6">
              <label>Gender</label>
              <select class="form-control" id="cust-name" name="gender">
                <option value="">--Select --</option>
                <option value="Male">Male</option>
                <option value="Female">Female</option>
              </select>
              <?php echo form_error('gender','<span class="text-danger">','</span>'); ?> </div>
            <div class="form-group col-md-6">
              <label>Email</label>
              <input type="text" class="form-control" id="cust-name" name="email">
              <?php echo form_error('email','<span class="text-danger">','</span>'); ?> </div>
          </div>
          <div class="col-md-12">
            <div class="form-group col-md-6">
              <label>Mobile</label>
              <input type="text" class="form-control" id="cust-name" name="mobile" maxlength="10">
              <?php echo form_error('mobile','<span class="text-danger">','</span>'); ?> </div>
            <div class="form-group col-md-6">
              <label>Address</label>
              <textarea type="text" class="form-control" id="cust-name" name="address"></textarea>
              <?php echo form_error('address','<span class="text-danger">','</span>'); ?> </div>
          </div>
          <div class="col-md-12">
            <div class="form-group col-md-6">
              <label>Pin</label>
              <input type="text" class="form-control" id="cust-name" name="pin">
              <?php echo form_error('pin','<span class="text-danger">','</span>'); ?> </div>
            <div class="form-group col-md-6">
              <label>Associated School</label>
              <input type="text" class="form-control" id="cust-name" name="school">
              <?php echo form_error('school','<span class="text-danger">','</span>'); ?> </div>
          </div>
          <div class="col-md-12">
            <div class="form-group col-md-6">
              <label>About Me</label>
              <textarea type="text" class="form-control" id="cust-name" name="about"></textarea>
              <?php echo form_error('about','<span class="text-danger">','</span>'); ?> </div>
            <div class="form-group col-md-6">
              <label>Achievements</label>
              <textarea type="text" class="form-control" id="cust-name" name="achievement"></textarea>
              <?php echo form_error('achievement','<span class="text-danger">','</span>'); ?> </div>
          </div>
          <div class="col-md-12">
            <div class="form-group col-md-6">
              <label>Teaching Subjects</label>
              <select class="form-control" id="cust-name" name="subjects[]" multiple="">
                <option value="">--Select--</option>
                <?php foreach ($subject as $sb) { ?>
                <option value="<?php echo $sb->subject_id; ?>"><?php echo $sb->subject; ?></option>
                <?php } ?>
              </select>
              <?php echo form_error('subjects[]','<span class="text-danger">','</span>'); ?> </div>
            <div class="form-group col-md-6">
              <label>Preferred Day</label>
              <select class="form-control" id="cust-name" name="day">
                <option value="">--Select --</option>
                <?php foreach ($days as $dy) { ?>
                <option value="<?php echo $dy->day; ?>"><?php echo $dy->day; ?></option>
                <?php } ?>
              </select>
              <?php echo form_error('day','<span class="text-danger">','</span>'); ?> </div>
          </div>
          <div class="col-md-12">
            <div class="form-group col-md-6">
              <label>Preferred Time</label>
              <select class="form-control" id="cust-name" name="time">
                <option value="">--Select --</option>
                <?php foreach ($time as $tm) { ?>
                <option value="<?php echo $tm->time; ?>"><?php echo date('h:i A', strtotime($tm->time)); ?></option>
                <?php } ?>
              </select>
              <?php echo form_error('time','<span class="text-danger">','</span>'); ?> </div>
            <div class="form-group col-md-6">
              <label>Language</label>
              <select class="form-control" id="cust-name" name="language">
                <option value="">--Select --</option>
                <?php foreach ($language as $lang) { ?>
                <option value="<?php echo $lang->language_name; ?>"><?php echo $lang->language_name; ?></option>
                <?php } ?>
              </select>
              <?php echo form_error('language','<span class="text-danger">','</span>'); ?> </div>
          </div>
          <div class="col-md-12">
            <div class="form-group col-md-6">
              <label>Qualification</label>
              <input type="text" class="form-control" id="cust-name" name="qualification">
            </div>
            <div class="form-group col-md-6">
              <label>Experience</label>
              <input type="text" class="form-control" id="cust-name" name="experience">
            </div>
          </div>
          <div class="col-md-12">
            <div class="form-group col-md-6">
              <label>Fees</label>
              <input type="text" class="form-control" id="mentor_fee" name="mentor_fee">
            </div>
          </div>
          <div class="col-md-12">
            <div class="form-group col-md-12">
              <button type="submit" id="submit" class="btn btn-primary">Add</button>
            </div>
          </div>
        </div>
      </form>
    </div>
  </div>
</section>
<!-- ------- sliderBar section ends here --------------------------------->
<section id="sliderBar2">
  <div class="container">
    <p class="heading3" style="color:#003399;">Registration Details <span class="pull-right"> </span></p>
    <div class="row">
      <div class="col-md-12">
        <div class="table-responsive" style="">
          <table id="example" class="table table-striped table-bordered" style="width:100%">
            <thead>
              <tr>
                <th width="1%">#</th>
                <th width="22%">Gen. Dtl</th>
                <th width="22%">Address</th>
                <th width="22%">Academic. Dtl</th>
                <th width="22%">About</th>
                <th width="15%">Action</th>
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


          $subjects = $this->db->query("SELECT * FROM tb_mentors_subject a
                                       INNER JOIN tb_subject b ON a.subject_id=b.subject_id  WHERE a.mentor_id=".$v->mentor_id)->result();
        
        
      
      ?>
              <tr>
                <td><?php echo $i; ?> </td>
                <td><b>Name : </b><?php echo $v->mentor_name; ?><br/>
                  <b>DOB : </b><?php echo $v->mentor_dob; ?><br/>
                  <b>Email : </b><?php echo $v->mentor_email; ?><br/>
                  <b>Phone : </b><?php echo $v->mentor_mobile; ?><br/>
                  <b>Gender : </b><?php echo $v->mentor_gender; ?><br/>
                </td>
                <td><b>Address : </b><?php echo $v->mentor_address; ?><br/>
                  <b>Pincode : </b><?php echo $v->mentor_pin; ?><br/>
                </td>
                <td><b>School : </b><?php echo $v->associated_school; ?><br/>
                  <b>Subjects : </b>
                  <?php foreach ($subjects as $sub) {
                    echo $sub->subject.',';
                  }  ?>
                  <br/>
                  <b>Pref. Day : </b><?php echo $v->mentor_preferred_day; ?><br/>
                  <b>Pref. Time : </b><?php echo date('h:i A', strtotime($v->mentor_preferred_time)); ?><br/>
                </td>
                <td><b>About : </b><?php echo $v->about; ?><br/>
                  <b>Achievements : </b><?php echo $v->achievements; ?><br/>
                </td>
                <td><a href="<?php echo base_url() ?>edit/mentor/<?php echo $v->mentor_id; ?>" class="btn btn-success btn-xs">Edit</a> <a href="<?php echo base_url() ?>view/mentor/<?php echo $v->mentor_id; ?>" class="btn btn-success btn-xs">View</a> <br>
                  <br>
                  <a onClick="return confirm('Would You Like To Delete This?');" href="<?php echo base_url() ?>delete/mentor/<?php echo $v->mentor_id; ?>" class="btn btn-danger btn-xs">Delete</a></td>
              </tr>
              <?php  $i++; } 
        
        } else { ?>
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
</script>
</body>
</html>
