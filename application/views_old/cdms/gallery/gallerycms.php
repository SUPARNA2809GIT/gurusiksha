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
    <p class="heading3" style="color:#003399; text-align:center;">Add Gallery Images (Max Limit : 16)</p>
    <div class="row">
      <div class="col-md-3"></div>
      <div class="col-md-6">
        <div class="well">
          <form action="<?php echo base_url() ?>admin/gallery/add" method="post" enctype="multipart/form-data">
          <?php echo $this->session->flashdata('success') ?>
            <div class="form-group">
              <label>Image Title <span style="color:#FF0000; font-weight:normal;">(Maximum 30 Characters)</span></label>
              <input type="text" class="form-control" id="img-title" name="img-title" maxlength="30" required>
            </div>
            <div class="form-group">
              <label>Choose Image File <span style="color:#FF0000; font-weight:normal;">(Size- width: 960px and Height: 640px)</span></label>
              <input type="file" class="form-control" id="gallery-img" name="gallery-img" required>
            </div>
            <div class="form-group text-center">
              <button type="submit" class="btn btn-primary">Upload <i class="fa fa-upload"></i></button>
            </div>
          </form>
        </div>
      </div>
      <div class="col-md-3"></div>
    </div>
  </div>
</section>
<!-- ------- sliderBar section ends here --------------------------------->
<section id="sliderBar2">
  <div class="container">
    <p class="heading3" style="color:#003399; text-align:center;">List of Images</p>
    <div class="row">
      <div class="col-md-3"></div>
      <div class="col-md-6">
        <div class="well">
          <div class="table-responsive">
            <table class="table table-bordered">
              <thead>
                <tr>
                  <th width="28%">Images</th>
                  <th width="44%">Image Title</th>
                  <th width="28%">Action</th>
                </tr>
              </thead>
              <tbody>
              <?php if(!empty($gallery)) { foreach($gallery as $key=>$gal){
			  
			   ?>
                <tr>
                  <td><img src="<?php echo base_url() ?>uploads/gallery/<?php echo $gal->image_path; ?>" style="width:120px; height:80px;" /></td>
                  <td><?php echo $gal->image_title; ?></td>
                  <td><a href="<?php echo base_url() ?>admin/gallery/edit/<?php echo $gal->image_id; ?>" class="btn btn-success btn-xs">Edit</a>
                    <a onclick="return confirm('Would You Like To Delete This?');" href="<?php echo base_url() ?>admin/gallery/delete/<?php echo $gal->image_id; ?>" class="btn btn-danger btn-xs">Delete</a></td>
                </tr>
              <?php } } else {?>
              
                <tr><td colspan="3" align="center">No Image Found</td></tr>
              
              <?php } ?>
                
              </tbody>
            </table>
            <div class="pull-right"><?php echo $paginator ; ?></div>
          </div>
        </div>
      </div>
      <div class="col-md-3"></div>
    </div>
  </div>
</section>
<?php $this->load->view('cdms/include/footer'); ?>
<!-- ------- footBar section ends here --------------------------------->
</body>
</html>
