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
    <p class="heading3" style="color:#003399;">Update Subjects</p>
    <div class="row">
    
      <form method="post" action="<?php echo base_url() ?>edit/subject/<?php echo $v->subject_id; ?>" >
       <?php echo $this->session->flashdata('success'); ?>
        <div class="form-row">
          <div class="form-group col-md-12">
            <label>Subject Name</label>
            <input type="text" class="form-control" id="cust-name" name="subject-name" value="<?php echo $v->subject; ?>">
            <?php echo form_error('subject-name','<span class="text-danger">','</span>'); ?>
          </div>
          <div class="form-group col-md-12">
            <button type="submit" id="submit" class="btn btn-primary">Update</button>
            <a href="<?php echo base_url(); ?>add/subject" class="btn btn-primary">Back To List</a>
          </div>
        </div>
      </form>
    </div>
  </div>
</section>
<!-- ------- sliderBar section ends here --------------------------------->
<!-- <section id="sliderBar2">
  <div class="container">
    <p class="heading3" style="color:#003399;">Subject Details <span class="pull-right">
      <form name="searchForm" id="searchForm" action="<?php echo base_url() ?>home" method="get" style="float: right; margin-bottom: 8px;">
      <input type="text" id="search" name="search" onchange="searchData()" placeholder="&#x279C; Search Here ..." style="font-size:12px; padding:5px; outline:none; width:200px; border:1px solid #003366;" value="<?php echo $search; ?>" />
      </form>
      </span></p>
    <div class="row">
      <div class="col-md-12">
        <div class="table-responsive" style="">
          <table class="table table-bordered">
            <thead>
              <tr>
                <th width="1%">#</th>
                <th width="22%">Subject</th>
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
				
				if(!empty($languages)){ foreach($languages as $k=>$v) { 
				
				
			
			?>
              <tr>
                <td><?php echo $i; ?> </td>
                <td><?php echo $v->subject; ?></td>
                
                <td><a href="<?php echo base_url() ?>home/edit/<?php echo $v->subject_id; ?>" class="btn btn-success btn-xs">Edit</a>
                  <a onClick="return confirm('Would You Like To Delete This?');" href="<?php echo base_url() ?>home/delete/<?php echo $v->subject_id; ?>" class="btn btn-danger btn-xs">Delete</a></td>
              </tr>
              <?php  $i++; } 
			  
			  } else { ?> 
			  <tr ><td colspan="7" align="center">No data found</td></tr>
			  <?php } ?>
            </tbody>
          </table>
          <div class="pull-right"><?php echo $paginator ; ?></div>
        </div>
      </div>
    </div>
  </div>
</section> -->
<!-- ------- sliderBar section ends here --------------------------------->
<?php $this->load->view('cdms/include/footer'); ?>
<!-- ------- footBar section ends here --------------------------------->
</body>
</html>
