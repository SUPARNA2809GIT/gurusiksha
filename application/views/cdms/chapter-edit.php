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
    <p class="heading3" style="color:#003399;">Edit Chapter</p>
    <div class="row">
    
      <form method="post" action="<?php echo base_url() ?>edit/chapter/<?php echo $v->chapter_id; ?>" >
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
            <input type="text" class="form-control" id="cust-name" name="chapter" value="<?php echo  $v->chapter; ?>">
            <?php echo form_error('chapter','<span class="text-danger">','</span>'); ?>
          </div>

          <div class="form-group col-md-12">
            <button type="submit" id="submit" class="btn btn-primary">Update</button>
            <a href="<?php echo base_url() ?>add/chapter" class="btn btn-primary">Back To List</a>
          </div>
        </div>
      </form>
    </div>
  </div>
</section>
<!-- ------- sliderBar section ends here --------------------------------->
<!-- ------- sliderBar section ends here --------------------------------->
<?php $this->load->view('cdms/include/footer'); ?>
</body>
</html>
