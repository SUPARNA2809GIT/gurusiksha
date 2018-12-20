<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<?php $this->load->view('cdms/include/header'); ?>
</head>
<body style="background: radial-gradient(black 15%, transparent 16%) 0 0,
radial-gradient(black 15%, transparent 16%) 0px 0px,
radial-gradient(rgba(0,0,0,.1) 15%, transparent 20%) 0 0px,
radial-gradient(rgba(0,0,0,.1) 15%, transparent 20%) 0px 0px;
background-color:#fff;
background-size:5px 5px;">
<section id="sliderBar">
  <div class="container">
    <div class="row">
      <div class="col-md-3"></div>
      <div class="col-md-6">
        <div class="well" style="background-color:#FFFFFF; box-shadow: 0 0 20px rgba(0,0,0,0.3); -moz-box-shadow: 0 0 10px rgba(0,0,0,0.6); -webkit-box-shadow: 0 0 28px rgba(0,0,0,0.28); -o-box-shadow: 0 0 10px rgba(0,0,0,0.3);">
          <p><img src="<?php echo base_url() ?>assets/admin_assets/images-nibedita/gurusiksha-icon-1024x1024.png" class="img-responsive" style="margin:0 auto; height: 200px; " /></p>
          <p class="heading3 alert alert-info" style="color:#003399; text-align:center;"><i class="fa fa-lock"></i> Secured Login</p>
          <form action="<?php echo base_url() ?>login/admin_login" method="post">
          <?php echo $this->session->flashdata('success'); ?>
            <div class="form-group">
              <label>Username</label>
              <input type="text" class="form-control" id="username" name="username" required>
            </div>
            <div class="form-group">
              <label>Password</label>
              <input type="password" class="form-control" id="password" name="password" required>
            </div>
            <div class="form-group text-center">
              <button type="submit" class="btn btn-primary">Sign In</button>
            </div>
          </form>
        </div>
      </div>
      <div class="col-md-3"></div>
    </div>
  </div>
</section>
<!-- ------- sliderBar section ends here --------------------------------->
</body>
</html>
