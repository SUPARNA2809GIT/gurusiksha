<style type="text/css">
  .navbar-inverse .navbar-nav>.open>a, .navbar-inverse .navbar-nav>.open>a:focus, .navbar-inverse .navbar-nav>.open>a:hover {
    color: #fff;
    background-color: #fdfafa;
}
.dropdown-menu>li>a:focus, .dropdown-menu>li>a:hover {
    background-color: #ccc;
}

.dropdown-menu>li>a {
  padding: 3px 5px;
}

</style>
<section id="topfixedmenuBar">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <nav class="navbar navbar-inverse navbar-fixed-top">
          <div class="container-fluid">
            <div class="navbar-header">
              <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar"> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
              <a class="navbar-brand" href="<?php echo base_url() ?>home"> <img src="<?php echo base_url() ?>assets/admin_assets/images-nibedita/gurusiksha-icon-1024x1024.png" class="img-responsive" style="margin-top:-11px; height: 85px;" /> </a> </div>
            <div class="collapse navbar-collapse" id="myNavbar">
              <ul class="nav navbar-nav">
                <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Master Panel<span class="caret"></span></a>
                  <ul class="dropdown-menu" style="font-size:14px;">
                    <li><a href="<?php echo base_url() ?>add/language">Language</a></li>
                    <li><a href="<?php echo base_url() ?>add/subject">Subject</a></li>
                    <li><a href="<?php echo base_url() ?>add/chapter">Chapter</a></li>
                    <li><a href="<?php echo base_url() ?>add/fees">Subject Fees</a></li>
                    <li><a href="<?php echo base_url() ?>add/class_entry">Class</a></li>
                    <li><a href="<?php echo base_url() ?>add/time">Teaching Time</a></li>
                    <li><a href="<?php echo base_url() ?>add/days">Teaching Days</a></li>
                  </ul>
                </li>
                <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Registration<span class="caret"></span></a>
                  <ul class="dropdown-menu" style="font-size:14px;">
                    <li><a href="<?php echo base_url() ?>add/student">Student Registration</a></li>
                    <li><a href="<?php echo base_url() ?>add/mentor">Mentor Registration</a></li>
                    <li><a href="<?php echo base_url() ?>add/guardian">Guardian Registration</a></li>
                  </ul>
                </li>

                <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Assesments<span class="caret"></span></a>
                  <ul class="dropdown-menu" style="font-size:14px;">
                    <li><a href="<?php echo base_url() ?>add/self_assesments">Self Assesments/Chapter</a></li>
                    <li><a href="#">Self Assesments/Monthly</a></li>
                  </ul>
                </li>

                <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Reports<span class="caret"></span></a>
                  <ul class="dropdown-menu" style="font-size:14px;">
                    <li><a href="<?php echo base_url() ?>view/chat">Chat Reports</a></li>
                    <li><a href="<?php echo base_url() ?>view/student_payment">Student Payment Reports</a></li>
                    <li><a href="<?php echo base_url() ?>view/mentor_details">Mentor's Reports</a></li>
                    <li><a href="<?php echo base_url() ?>view/assesment_details">Assesment Reports</a></li>
                    <li><a href="<?php echo base_url() ?>view/progress_reports">Progress Reports</a></li>
                  </ul>
                </li>

                <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Others<span class="caret"></span></a>
                  <ul class="dropdown-menu" style="font-size:14px;">
                    <li><a href="<?php echo base_url(); ?>view/Enquiry">Enquiry</a></li>
                    <li><a href="<?php echo base_url(); ?>view/Contact">Contact Us</a></li>
                    <li><a href="<?php echo base_url(); ?>add/studymaterial">Study Material</a></li>
                    <li><a href="<?php echo base_url(); ?>add/teachrs_opinion">Teacher's Opinion</a></li>
                    <li><a href="<?php echo base_url(); ?>add/document_charge">Documnet View Charge</a></li>
                  </ul>
                </li>

                <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Notification<span class="caret"></span></a>
                  <ul class="dropdown-menu" style="font-size:14px;">
                    <li><a href="<?php echo base_url() ?>add/sms">SMS</a></li>
                    <li><a href="<?php echo base_url() ?>add/notification">Push Notification</a></li>
                  </ul>
                </li>

                <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Account<span class="caret"></span></a>
                  <ul class="dropdown-menu" style="font-size:14px;">
                    <li><a href="<?php echo base_url() ?>change_password">Change Password</a></li>
                    <li><a href="<?php echo base_url() ?>login/logout">Logout</a></li>
                  </ul>
                </li>

                
              </ul>
            </div>
          </div>
        </nav>
      </div>
    </div>
  </div>
</section>
