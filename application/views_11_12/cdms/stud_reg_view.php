<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<?php $this->load->view('cdms/include/header'); ?>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap.min.css">

<script src='//production-assets.codepen.io/assets/editor/live/console_runner-079c09a0e3b9ff743e39ee2d5637b9216b3545af0de366d4b9aad9dc87e26bfd.js'></script>

<script src='//production-assets.codepen.io/assets/editor/live/events_runner-73716630c22bbc8cff4bd0f07b135f00a0bdc5d14629260c3ec49e5606f98fdd.js'></script>

<script src='//production-assets.codepen.io/assets/editor/live/css_live_reload_init-2c0dc5167d60a5af3ee189d570b1835129687ea2a61bee3513dee3a50c115a77.js'></script>





<script src="https://use.typekit.net/hoy3lrg.js"></script>
<script>try{Typekit.load({ async: true });}catch(e){}</script>
<link rel='stylesheet prefetch' href='https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css'>

<style class="cp-pen-styles">
/*body {
  display: flex;
  align-items: center;
  justify-content: center;
  min-height: 100vh;
  background: #27ae60;
  font-family: "proxima-nova", "Source Sans Pro", sans-serif;
  font-size: 1em;
  letter-spacing: 0.1px;
  color: #32465a;
  text-rendering: optimizeLegibility;
  text-shadow: 1px 1px 1px rgba(0, 0, 0, 0.004);
  -webkit-font-smoothing: antialiased;
}*/

#frame {
  width: 95%;
  min-width: 360px;
  max-width: 1000px;
  height: 92vh;
  min-height: 300px;
  max-height: 720px;
  background: #E6EAEA;
}
@media screen and (max-width: 360px) {
  #frame {
    width: 100%;
    height: 100vh;
  }
}
#frame #sidepanel {
  float: left;
  min-width: 280px;
  max-width: 340px;
  width: 40%;
  height: 100%;
  background: #2c3e50;
  color: #f5f5f5;
  overflow: hidden;
  position: relative;
}
@media screen and (max-width: 735px) {
  #frame #sidepanel {
    width: 58px;
    min-width: 58px;
  }
}
#frame #sidepanel #profile {
  width: 80%;
  margin: 25px auto;
}
@media screen and (max-width: 735px) {
  #frame #sidepanel #profile {
    width: 100%;
    margin: 0 auto;
    padding: 5px 0 0 0;
    background: #32465a;
  }
}
#frame #sidepanel #profile.expanded .wrap {
  height: 210px;
  line-height: initial;
}
#frame #sidepanel #profile.expanded .wrap p {
  margin-top: 20px;
}
#frame #sidepanel #profile.expanded .wrap i.expand-button {
  -moz-transform: scaleY(-1);
  -o-transform: scaleY(-1);
  -webkit-transform: scaleY(-1);
  transform: scaleY(-1);
  filter: FlipH;
  -ms-filter: "FlipH";
}
#frame #sidepanel #profile .wrap {
  height: 60px;
  line-height: 60px;
  overflow: hidden;
  -moz-transition: 0.3s height ease;
  -o-transition: 0.3s height ease;
  -webkit-transition: 0.3s height ease;
  transition: 0.3s height ease;
}
@media screen and (max-width: 735px) {
  #frame #sidepanel #profile .wrap {
    height: 55px;
  }
}
#frame #sidepanel #profile .wrap img {
  width: 50px;
  border-radius: 50%;
  padding: 3px;
  border: 2px solid #e74c3c;
  height: auto;
  float: left;
  cursor: pointer;
  -moz-transition: 0.3s border ease;
  -o-transition: 0.3s border ease;
  -webkit-transition: 0.3s border ease;
  transition: 0.3s border ease;
}
@media screen and (max-width: 735px) {
  #frame #sidepanel #profile .wrap img {
    width: 40px;
    margin-left: 4px;
  }
}
#frame #sidepanel #profile .wrap img.online {
  border: 2px solid #2ecc71;
}
#frame #sidepanel #profile .wrap img.away {
  border: 2px solid #f1c40f;
}
#frame #sidepanel #profile .wrap img.busy {
  border: 2px solid #e74c3c;
}
#frame #sidepanel #profile .wrap img.offline {
  border: 2px solid #95a5a6;
}
#frame #sidepanel #profile .wrap p {
  float: left;
  margin-left: 15px;
}
@media screen and (max-width: 735px) {
  #frame #sidepanel #profile .wrap p {
    display: none;
  }
}
#frame #sidepanel #profile .wrap i.expand-button {
  float: right;
  margin-top: 23px;
  font-size: 0.8em;
  cursor: pointer;
  color: #435f7a;
}
@media screen and (max-width: 735px) {
  #frame #sidepanel #profile .wrap i.expand-button {
    display: none;
  }
}
#frame #sidepanel #profile .wrap #status-options {
  position: absolute;
  opacity: 0;
  visibility: hidden;
  width: 150px;
  margin: 70px 0 0 0;
  border-radius: 6px;
  z-index: 99;
  line-height: initial;
  background: #435f7a;
  -moz-transition: 0.3s all ease;
  -o-transition: 0.3s all ease;
  -webkit-transition: 0.3s all ease;
  transition: 0.3s all ease;
}
@media screen and (max-width: 735px) {
  #frame #sidepanel #profile .wrap #status-options {
    width: 58px;
    margin-top: 57px;
  }
}
#frame #sidepanel #profile .wrap #status-options.active {
  opacity: 1;
  visibility: visible;
  margin: 75px 0 0 0;
}
@media screen and (max-width: 735px) {
  #frame #sidepanel #profile .wrap #status-options.active {
    margin-top: 62px;
  }
}
#frame #sidepanel #profile .wrap #status-options:before {
  content: '';
  position: absolute;
  width: 0;
  height: 0;
  border-left: 6px solid transparent;
  border-right: 6px solid transparent;
  border-bottom: 8px solid #435f7a;
  margin: -8px 0 0 24px;
}
@media screen and (max-width: 735px) {
  #frame #sidepanel #profile .wrap #status-options:before {
    margin-left: 23px;
  }
}
#frame #sidepanel #profile .wrap #status-options ul {
  overflow: hidden;
  border-radius: 6px;
}
#frame #sidepanel #profile .wrap #status-options ul li {
  padding: 15px 0 30px 18px;
  display: block;
  cursor: pointer;
}
@media screen and (max-width: 735px) {
  #frame #sidepanel #profile .wrap #status-options ul li {
    padding: 15px 0 35px 22px;
  }
}
#frame #sidepanel #profile .wrap #status-options ul li:hover {
  background: #496886;
}
#frame #sidepanel #profile .wrap #status-options ul li span.status-circle {
  position: absolute;
  width: 10px;
  height: 10px;
  border-radius: 50%;
  margin: 5px 0 0 0;
}
@media screen and (max-width: 735px) {
  #frame #sidepanel #profile .wrap #status-options ul li span.status-circle {
    width: 14px;
    height: 14px;
  }
}
#frame #sidepanel #profile .wrap #status-options ul li span.status-circle:before {
  content: '';
  position: absolute;
  width: 14px;
  height: 14px;
  margin: -3px 0 0 -3px;
  background: transparent;
  border-radius: 50%;
  z-index: 0;
}
@media screen and (max-width: 735px) {
  #frame #sidepanel #profile .wrap #status-options ul li span.status-circle:before {
    height: 18px;
    width: 18px;
  }
}
#frame #sidepanel #profile .wrap #status-options ul li p {
  padding-left: 12px;
}
@media screen and (max-width: 735px) {
  #frame #sidepanel #profile .wrap #status-options ul li p {
    display: none;
  }
}
#frame #sidepanel #profile .wrap #status-options ul li#status-online span.status-circle {
  background: #2ecc71;
}
#frame #sidepanel #profile .wrap #status-options ul li#status-online.active span.status-circle:before {
  border: 1px solid #2ecc71;
}
#frame #sidepanel #profile .wrap #status-options ul li#status-away span.status-circle {
  background: #f1c40f;
}
#frame #sidepanel #profile .wrap #status-options ul li#status-away.active span.status-circle:before {
  border: 1px solid #f1c40f;
}
#frame #sidepanel #profile .wrap #status-options ul li#status-busy span.status-circle {
  background: #e74c3c;
}
#frame #sidepanel #profile .wrap #status-options ul li#status-busy.active span.status-circle:before {
  border: 1px solid #e74c3c;
}
#frame #sidepanel #profile .wrap #status-options ul li#status-offline span.status-circle {
  background: #95a5a6;
}
#frame #sidepanel #profile .wrap #status-options ul li#status-offline.active span.status-circle:before {
  border: 1px solid #95a5a6;
}
#frame #sidepanel #profile .wrap #expanded {
  padding: 100px 0 0 0;
  display: block;
  line-height: initial !important;
}
#frame #sidepanel #profile .wrap #expanded label {
  float: left;
  clear: both;
  margin: 0 8px 5px 0;
  padding: 5px 0;
}
#frame #sidepanel #profile .wrap #expanded input {
  border: none;
  margin-bottom: 6px;
  background: #32465a;
  border-radius: 3px;
  color: #f5f5f5;
  padding: 7px;
  width: calc(100% - 43px);
}
#frame #sidepanel #profile .wrap #expanded input:focus {
  outline: none;
  background: #435f7a;
}
#frame #sidepanel #search {
  border-top: 1px solid #32465a;
  border-bottom: 1px solid #32465a;
  font-weight: 300;
}
@media screen and (max-width: 735px) {
  #frame #sidepanel #search {
    display: none;
  }
}
#frame #sidepanel #search label {
  position: absolute;
  margin: 10px 0 0 20px;
}
#frame #sidepanel #search input {
  /*font-family: "proxima-nova",  "Source Sans Pro", sans-serif;*/
  padding: 10px 0 10px 46px;
  width: calc(100% - 25px);
  border: none;
  background: #32465a;
  color: #f5f5f5;
}
#frame #sidepanel #search input:focus {
  outline: none;
  background: #435f7a;
}
#frame #sidepanel #search input::-webkit-input-placeholder {
  color: #f5f5f5;
}
#frame #sidepanel #search input::-moz-placeholder {
  color: #f5f5f5;
}
#frame #sidepanel #search input:-ms-input-placeholder {
  color: #f5f5f5;
}
#frame #sidepanel #search input:-moz-placeholder {
  color: #f5f5f5;
}
#frame #sidepanel #contacts {
  height: calc(100% - 177px);
  overflow-y: scroll;
  overflow-x: hidden;
}
@media screen and (max-width: 735px) {
  #frame #sidepanel #contacts {
    height: calc(100% - 149px);
    overflow-y: scroll;
    overflow-x: hidden;
  }
  #frame #sidepanel #contacts::-webkit-scrollbar {
    display: none;
  }
}
#frame #sidepanel #contacts.expanded {
  height: calc(100% - 334px);
}
#frame #sidepanel #contacts::-webkit-scrollbar {
  width: 8px;
  background: #2c3e50;
}
#frame #sidepanel #contacts::-webkit-scrollbar-thumb {
  background-color: #243140;
}
#frame #sidepanel #contacts ul li.contact {
  position: relative;
  padding: 10px 0 15px 0;
  font-size: 0.9em;
  cursor: pointer;
}
@media screen and (max-width: 735px) {
  #frame #sidepanel #contacts ul li.contact {
    padding: 6px 0 46px 8px;
  }
}
#frame #sidepanel #contacts ul li.contact:hover {
  background: #32465a;
}
#frame #sidepanel #contacts ul li.contact.active {
  background: #32465a;
  border-right: 5px solid #435f7a;
}
#frame #sidepanel #contacts ul li.contact.active span.contact-status {
  border: 2px solid #32465a !important;
}
#frame #sidepanel #contacts ul li.contact .wrap {
  width: 88%;
  margin: 0 auto;
  position: relative;
}
@media screen and (max-width: 735px) {
  #frame #sidepanel #contacts ul li.contact .wrap {
    width: 100%;
  }
}
#frame #sidepanel #contacts ul li.contact .wrap span {
  position: absolute;
  left: 0;
  margin: -2px 0 0 -2px;
  width: 10px;
  height: 10px;
  border-radius: 50%;
  border: 2px solid #2c3e50;
  background: #95a5a6;
}
#frame #sidepanel #contacts ul li.contact .wrap span.online {
  background: #2ecc71;
}
#frame #sidepanel #contacts ul li.contact .wrap span.away {
  background: #f1c40f;
}
#frame #sidepanel #contacts ul li.contact .wrap span.busy {
  background: #e74c3c;
}
#frame #sidepanel #contacts ul li.contact .wrap img {
  width: 40px;
  border-radius: 50%;
  float: left;
  margin-right: 10px;
}
@media screen and (max-width: 735px) {
  #frame #sidepanel #contacts ul li.contact .wrap img {
    margin-right: 0px;
  }
}
#frame #sidepanel #contacts ul li.contact .wrap .meta {
  padding: 5px 0 0 0;
}
@media screen and (max-width: 735px) {
  #frame #sidepanel #contacts ul li.contact .wrap .meta {
    display: none;
  }
}
#frame #sidepanel #contacts ul li.contact .wrap .meta .name {
  font-weight: 600;
}
#frame #sidepanel #contacts ul li.contact .wrap .meta .preview {
  margin: 5px 0 0 0;
  padding: 0 0 1px;
  font-weight: 400;
  white-space: nowrap;
  overflow: hidden;
  text-overflow: ellipsis;
  -moz-transition: 1s all ease;
  -o-transition: 1s all ease;
  -webkit-transition: 1s all ease;
  transition: 1s all ease;
}
#frame #sidepanel #contacts ul li.contact .wrap .meta .preview span {
  position: initial;
  border-radius: initial;
  background: none;
  border: none;
  padding: 0 2px 0 0;
  margin: 0 0 0 1px;
  opacity: .5;
}


#frame .content {
  float: right;
  width: 60%;
  height: 100%;
  overflow: hidden;
  position: relative;
}
@media screen and (max-width: 735px) {
  #frame .content {
    width: calc(100% - 58px);
    min-width: 300px !important;
  }
}
@media screen and (min-width: 900px) {
  #frame .content {
    width: calc(100% - 340px);
  }
}
#frame .content .contact-profile {
  width: 100%;
  height: 60px;
  line-height: 60px;
  background: #f5f5f5;
}
#frame .content .contact-profile img {
  width: 40px;
  border-radius: 50%;
  float: left;
  margin: 9px 12px 0 9px;
}
#frame .content .contact-profile p {
  float: left;
}
#frame .content .contact-profile .social-media {
  float: right;
}
#frame .content .contact-profile .social-media i {
  margin-left: 14px;
  cursor: pointer;
}
#frame .content .contact-profile .social-media i:nth-last-child(1) {
  margin-right: 20px;
}
#frame .content .contact-profile .social-media i:hover {
  color: #435f7a;
}
#frame .content .messages {
  height: auto;
  min-height: calc(100% - 93px);
  max-height: calc(100% - 93px);
  overflow-y: scroll;
  overflow-x: hidden;
}
@media screen and (max-width: 735px) {
  #frame .content .messages {
    max-height: calc(100% - 105px);
  }
}
#frame .content .messages::-webkit-scrollbar {
  width: 8px;
  background: transparent;
}
#frame .content .messages::-webkit-scrollbar-thumb {
  background-color: rgba(0, 0, 0, 0.3);
}
#frame .content .messages ul li {
  display: inline-block;
  clear: both;
  float: left;
  margin: 15px 15px 5px 15px;
  width: calc(100% - 25px);
  font-size: 0.9em;
}
#frame .content .messages ul li:nth-last-child(1) {
  margin-bottom: 20px;
}
#frame .content .messages ul li.sent img {
  margin: 6px 8px 0 0;
}
#frame .content .messages ul li.sent p {
  background: #435f7a;
  color: #f5f5f5;
}
#frame .content .messages ul li.replies img {
  float: right;
  margin: 6px 0 0 8px;
}
#frame .content .messages ul li.replies p {
  background: #f5f5f5;
  float: right;
}
#frame .content .messages ul li img {
  width: 22px;
  border-radius: 50%;
  float: left;
}
#frame .content .messages ul li p {
  display: inline-block;
  padding: 10px 15px;
  border-radius: 20px;
  max-width: 205px;
  line-height: 130%;
}
@media screen and (min-width: 735px) {
  #frame .content .messages ul li p {
    max-width: 300px;
  }
}
#frame .content .message-input {
  position: absolute;
  bottom: 0;
  width: 100%;
  z-index: 99;
}
#frame .content .message-input .wrap {
  position: relative;
}
#frame .content .message-input .wrap input {
  /*font-family: "proxima-nova",  "Source Sans Pro", sans-serif;*/
  float: left;
  border: none;
  width: calc(100% - 90px);
  padding: 11px 32px 10px 8px;
  font-size: 0.8em;
  color: #32465a;
}
@media screen and (max-width: 735px) {
  #frame .content .message-input .wrap input {
    padding: 15px 32px 16px 8px;
  }
}
#frame .content .message-input .wrap input:focus {
  outline: none;
}
#frame .content .message-input .wrap .attachment {
  position: absolute;
  right: 60px;
  z-index: 4;
  margin-top: 10px;
  font-size: 1.1em;
  color: #435f7a;
  opacity: .5;
  cursor: pointer;
}
@media screen and (max-width: 735px) {
  #frame .content .message-input .wrap .attachment {
    margin-top: 17px;
    right: 65px;
  }
}
#frame .content .message-input .wrap .attachment:hover {
  opacity: 1;
}
#frame .content .message-input .wrap button {
  float: right;
  border: none;
  width: 50px;
  padding: 12px 0;
  cursor: pointer;
  background: #32465a;
  color: #f5f5f5;
}
@media screen and (max-width: 735px) {
  #frame .content .message-input .wrap button {
    padding: 16px 0;
  }
}
#frame .content .message-input .wrap button:hover {
  background: #435f7a;
}
#frame .content .message-input .wrap button:focus {
  outline: none;
}
</style>

</head>

<body>
<?php $this->load->view('cdms/include/nav_bar'); ?>
<!-- ------- topfixedmenuBar section ends here --------------------------------->
<section id="sliderBar">
  <div class="container">
   
    <div class="container bootstrap snippet">
      <div class="row">
        <div class="col-sm-10">
          <p class="heading3" style="color:#003399; font-size: 30px;">Student Details</p>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-3">
          <!--left col-->
          <div class="text-left"> <img src="http://ssl.gstatic.com/accounts/ui/avatar_2x.png" class="img-thumbnail" alt="avatar" style="width: 100%">
            <h4 class="text-center"><?php echo $v->name; ?></h4>
            <div class="well">
            <ul>
              
              <li><?php echo $v->dob; ?></li>
              <li><?php echo $v->email; ?></li>
              <li><?php echo $v->mobile; ?></li>
              <li><?php echo $v->school; ?></li>
              <li><?php echo $v->address; ?> <br> <?php echo $v->pin; ?></li>
              
              <li><?php echo $v->guardian_name; ?></li>
              <li><?php echo $v->guardian_phone; ?></li>
            </ul>
            </div>
            
            
          </div>
          </hr>
          <br>
          <!-- <div class="panel panel-default">
            <div class="panel-heading">Website <i class="fa fa-link fa-1x"></i></div>
            <div class="panel-body"><a href="http://bootnipets.com">bootnipets.com</a></div>
          </div>
          <ul class="list-group">
            <li class="list-group-item text-muted">Activity <i class="fa fa-dashboard fa-1x"></i></li>
            <li class="list-group-item text-right"><span class="pull-left"><strong>Shares</strong></span> 125</li>
            <li class="list-group-item text-right"><span class="pull-left"><strong>Likes</strong></span> 13</li>
            <li class="list-group-item text-right"><span class="pull-left"><strong>Posts</strong></span> 37</li>
            <li class="list-group-item text-right"><span class="pull-left"><strong>Followers</strong></span> 78</li>
          </ul>
          <div class="panel panel-default">
            <div class="panel-heading">Social Media</div>
            <div class="panel-body"> <i class="fa fa-facebook fa-2x"></i> <i class="fa fa-github fa-2x"></i> <i class="fa fa-twitter fa-2x"></i> <i class="fa fa-pinterest fa-2x"></i> <i class="fa fa-google-plus fa-2x"></i> </div>
          </div> -->
        </div>
        <!--/col-3-->
        <div class="col-sm-9">
          <ul class="nav nav-tabs">
            <li><a data-toggle="tab" href="#prevclass">Previous Classes</a></li>
            <li class="active"><a data-toggle="tab" href="#curclass">Current Classes</a></li>
            <li><a data-toggle="tab" href="#upclass">Upcoming Classes</a></li>
            <li><a data-toggle="tab" href="#reports">Reports</a></li>
            <li><a data-toggle="tab" href="#payment">Payment Details</a></li>
            <li><a data-toggle="tab" href="#chathistory">Chat History</a></li>
          </ul>
          <div class="tab-content">
            <div class="tab-pane" id="prevclass">
              <hr>
              
              <div class="alert alert-danger">
                <strong>Subject:</strong> Math <strong>Chapter:</strong> Calculas <strong>Mentor:</strong> Sourav Samanta <strong>Day: </strong> Monday <strong>Time: </strong> 2:10pm <strong>Payemnt:</strong> 550/-
              </div>

              <div class="alert alert-danger">
                <strong>Subject:</strong> Math <strong>Chapter:</strong> Calculas <strong>Mentor:</strong> Sourav Samanta <strong>Day: </strong> Monday <strong>Time: </strong> 2:10pm <strong>Payemnt:</strong> 550/-
              </div>

              <div class="alert alert-danger">
                <strong>Subject:</strong> Math <strong>Chapter:</strong> Calculas <strong>Mentor:</strong> Sourav Samanta <strong>Day: </strong> Monday <strong>Time: </strong> 2:10pm <strong>Payemnt:</strong> 550/-
              </div>

              <div class="alert alert-danger">
                <strong>Subject:</strong> Math <strong>Chapter:</strong> Calculas <strong>Mentor:</strong> Sourav Samanta <strong>Day: </strong> Monday <strong>Time: </strong> 2:10pm <strong>Payemnt:</strong> 550/-
              </div>

              <div class="alert alert-danger">
                <strong>Subject:</strong> Math <strong>Chapter:</strong> Calculas <strong>Mentor:</strong> Sourav Samanta <strong>Day: </strong> Monday <strong>Time: </strong> 2:10pm <strong>Payemnt:</strong> 550/-
              </div>

              <div class="alert alert-danger">
                <strong>Subject:</strong> Math <strong>Chapter:</strong> Calculas <strong>Mentor:</strong> Sourav Samanta <strong>Day: </strong> Monday <strong>Time: </strong> 2:10pm <strong>Payemnt:</strong> 550/-
              </div>
              
              <hr>
            </div>
            <!--/tab-pane-->
            <div class="tab-pane active" id="curclass">
              <h2></h2>
              <hr>
              <div class="alert alert-success">
                <strong>Subject:</strong> Math
                <br> 
                <strong>Chapter:</strong> Calculas 
                <br> 
                <strong>Mentor:</strong> Sourav Samanta 
                <br> 
                <strong>Day: </strong> Monday
                <br> 
                <strong>Time: </strong> 2:10pm 
                <br> 
                <strong>Payemnt:</strong> 550/-
              </div>
            </div>
            <!--/tab-pane-->
            <div class="tab-pane" id="upclass">
              <hr>
             <div class="alert alert-success">
                <strong>Subject:</strong> Math <strong>Chapter:</strong> Calculas <strong>Mentor:</strong> Sourav Samanta <strong>Day: </strong> Monday <strong>Time: </strong> 2:10pm <strong>Payemnt:</strong> 550/-
              </div>

              <div class="alert alert-success">
                <strong>Subject:</strong> Math <strong>Chapter:</strong> Calculas <strong>Mentor:</strong> Sourav Samanta <strong>Day: </strong> Monday <strong>Time: </strong> 2:10pm <strong>Payemnt:</strong> 550/-
              </div>

              <div class="alert alert-success">
                <strong>Subject:</strong> Math <strong>Chapter:</strong> Calculas <strong>Mentor:</strong> Sourav Samanta <strong>Day: </strong> Monday <strong>Time: </strong> 2:10pm <strong>Payemnt:</strong> 550/-
              </div>

              <div class="alert alert-success">
                <strong>Subject:</strong> Math <strong>Chapter:</strong> Calculas <strong>Mentor:</strong> Sourav Samanta <strong>Day: </strong> Monday <strong>Time: </strong> 2:10pm <strong>Payemnt:</strong> 550/-
              </div>

              <div class="alert alert-success">
                <strong>Subject:</strong> Math <strong>Chapter:</strong> Calculas <strong>Mentor:</strong> Sourav Samanta <strong>Day: </strong> Monday <strong>Time: </strong> 2:10pm <strong>Payemnt:</strong> 550/-
              </div>

              <div class="alert alert-success">
                <strong>Subject:</strong> Math <strong>Chapter:</strong> Calculas <strong>Mentor:</strong> Sourav Samanta <strong>Day: </strong> Monday <strong>Time: </strong> 2:10pm <strong>Payemnt:</strong> 550/-
              </div>
            </div>

            <div class="tab-pane" id="reports">
              <hr>
             <div id="container" style="width: 75%;">
                <canvas id="canvas"></canvas>
              </div>
              
            </div>

            <div class="tab-pane" id="payment">
              <hr>
              <table id="example" class="table table-striped table-bordered" style="width:100%">
              <thead>
                  <tr>
                      <th>#</th>
                      <th>Payment Date</th>
                      <th>Payment Amount (INR)</th>
                      <th>Transaction Id</th>
                  </tr>
              </thead>
              <tbody>
                  <tr>
                      <td>1</td>
                      <td>30/10/2018 2.00pm</td>
                      <td>3200</td>
                      <td>OID000123GDHJ63826</td>
                  </tr>
                  <tr>
                      <td>1</td>
                      <td>30/10/2018 2.00pm</td>
                      <td>3200</td>
                      <td>OID000123GDHJ63826</td>
                  </tr>
                  <tr>
                      <td>1</td>
                      <td>30/10/2018 2.00pm</td>
                      <td>3200</td>
                      <td>OID000123GDHJ63826</td>
                  </tr>
                  <tr>
                      <td>1</td>
                      <td>30/10/2018 2.00pm</td>
                      <td>3200</td>
                      <td>OID000123GDHJ63826</td>
                  </tr>
                  <tr>
                     <td>1</td>
                      <td>30/10/2018 2.00pm</td>
                      <td>3200</td>
                      <td>OID000123GDHJ63826</td>
                  </tr>
                  <tr>
                      <td>1</td>
                      <td>30/10/2018 2.00pm</td>
                      <td>3200</td>
                      <td>OID000123GDHJ63826</td>
                  </tr>
                  <tr>
                      <td>1</td>
                      <td>30/10/2018 2.00pm</td>
                      <td>3200</td>
                      <td>OID000123GDHJ63826</td>
                  </tr>
                  <tr>
                      <td>1</td>
                      <td>30/10/2018 2.00pm</td>
                      <td>3200</td>
                      <td>OID000123GDHJ63826</td>
                  </tr>
                  <tr>
                      <td>1</td>
                      <td>30/10/2018 2.00pm</td>
                      <td>3200</td>
                      <td>OID000123GDHJ63826</td>
                  </tr>
                  <tr>
                      <td>1</td>
                      <td>30/10/2018 2.00pm</td>
                      <td>3200</td>
                      <td>OID000123GDHJ63826</td>
                  </tr>
                  <tr>
                      <td>1</td>
                      <td>30/10/2018 2.00pm</td>
                      <td>3200</td>
                      <td>OID000123GDHJ63826</td>
                  </tr>
              </tbody>
              
          </table>
            </div>


            <div class="tab-pane" id="chathistory">
              <hr>
              <div id="frame">
              <div id="sidepanel">
                <div id="profile">
                  <div class="wrap">
                    <img id="profile-img" src="http://emilcarlsson.se/assets/mikeross.png" class="online" alt="" />
                    <p>Mike Ross</p>
                    <i class="fa fa-chevron-down expand-button" aria-hidden="true"></i>
                    <div id="status-options">
                      <ul>
                        <li id="status-online" class="active"><span class="status-circle"></span> <p>Online</p></li>
                        <li id="status-away"><span class="status-circle"></span> <p>Away</p></li>
                        <li id="status-busy"><span class="status-circle"></span> <p>Busy</p></li>
                        <li id="status-offline"><span class="status-circle"></span> <p>Offline</p></li>
                      </ul>
                    </div>
                    <div id="expanded">
                      <label for="twitter"><i class="fa fa-facebook fa-fw" aria-hidden="true"></i></label>
                      <input name="twitter" type="text" value="mikeross" />
                      <label for="twitter"><i class="fa fa-twitter fa-fw" aria-hidden="true"></i></label>
                      <input name="twitter" type="text" value="ross81" />
                      <label for="twitter"><i class="fa fa-instagram fa-fw" aria-hidden="true"></i></label>
                      <input name="twitter" type="text" value="mike.ross" />
                    </div>
                  </div>
                </div>
                <!-- <div id="search">
                  <label for=""><i class="fa fa-search" aria-hidden="true"></i></label>
                  <input type="text" placeholder="Search contacts..." />
                </div> -->
                <div id="contacts">
                  <ul>
                    <li class="contact">
                      <div class="wrap">
                        <span class="contact-status online"></span>
                        <img src="http://emilcarlsson.se/assets/louislitt.png" alt="" />
                        <div class="meta">
                          <p class="name">Louis Litt</p>
                          <p class="preview">You just got LITT up, Mike.</p>
                        </div>
                      </div>
                    </li>
                    <li class="contact active">
                      <div class="wrap">
                        <span class="contact-status busy"></span>
                        <img src="http://emilcarlsson.se/assets/harveyspecter.png" alt="" />
                        <div class="meta">
                          <p class="name">Harvey Specter</p>
                          <p class="preview">Wrong. You take the gun, or you pull out a bigger one. Or, you call their bluff. Or, you do any one of a hundred and forty six other things.</p>
                        </div>
                      </div>
                    </li>
                    <li class="contact">
                      <div class="wrap">
                        <span class="contact-status away"></span>
                        <img src="http://emilcarlsson.se/assets/rachelzane.png" alt="" />
                        <div class="meta">
                          <p class="name">Rachel Zane</p>
                          <p class="preview">I was thinking that we could have chicken tonight, sounds good?</p>
                        </div>
                      </div>
                    </li>
                    <li class="contact">
                      <div class="wrap">
                        <span class="contact-status online"></span>
                        <img src="http://emilcarlsson.se/assets/donnapaulsen.png" alt="" />
                        <div class="meta">
                          <p class="name">Donna Paulsen</p>
                          <p class="preview">Mike, I know everything! I'm Donna..</p>
                        </div>
                      </div>
                    </li>
                    <li class="contact">
                      <div class="wrap">
                        <span class="contact-status busy"></span>
                        <img src="http://emilcarlsson.se/assets/jessicapearson.png" alt="" />
                        <div class="meta">
                          <p class="name">Jessica Pearson</p>
                          <p class="preview">Have you finished the draft on the Hinsenburg deal?</p>
                        </div>
                      </div>
                    </li>
                    <li class="contact">
                      <div class="wrap">
                        <span class="contact-status"></span>
                        <img src="http://emilcarlsson.se/assets/haroldgunderson.png" alt="" />
                        <div class="meta">
                          <p class="name">Harold Gunderson</p>
                          <p class="preview">Thanks Mike! :)</p>
                        </div>
                      </div>
                    </li>
                    <li class="contact">
                      <div class="wrap">
                        <span class="contact-status"></span>
                        <img src="http://emilcarlsson.se/assets/danielhardman.png" alt="" />
                        <div class="meta">
                          <p class="name">Daniel Hardman</p>
                          <p class="preview">We'll meet again, Mike. Tell Jessica I said 'Hi'.</p>
                        </div>
                      </div>
                    </li>
                    <li class="contact">
                      <div class="wrap">
                        <span class="contact-status busy"></span>
                        <img src="http://emilcarlsson.se/assets/katrinabennett.png" alt="" />
                        <div class="meta">
                          <p class="name">Katrina Bennett</p>
                          <p class="preview">I've sent you the files for the Garrett trial.</p>
                        </div>
                      </div>
                    </li>
                    <li class="contact">
                      <div class="wrap">
                        <span class="contact-status"></span>
                        <img src="http://emilcarlsson.se/assets/charlesforstman.png" alt="" />
                        <div class="meta">
                          <p class="name">Charles Forstman</p>
                          <p class="preview">Mike, this isn't over.</p>
                        </div>
                      </div>
                    </li>
                    <li class="contact">
                      <div class="wrap">
                        <span class="contact-status"></span>
                        <img src="http://emilcarlsson.se/assets/jonathansidwell.png" alt="" />
                        <div class="meta">
                          <p class="name">Jonathan Sidwell</p>
                          <p class="preview"><span>You:</span> That's bullshit. This deal is solid.</p>
                        </div>
                      </div>
                    </li>
                  </ul>
                </div>
                <!-- <div id="bottom-bar">
                  <button id="addcontact"><i class="fa fa-user-plus fa-fw" aria-hidden="true"></i> <span>Add contact</span></button>
                  <button id="settings"><i class="fa fa-cog fa-fw" aria-hidden="true"></i> <span>Settings</span></button>
                </div> -->
              </div>
              <div class="content">
                <div class="contact-profile">
                  <img src="http://emilcarlsson.se/assets/harveyspecter.png" alt="" />
                  <p>Harvey Specter</p>
                  <!-- <div class="social-media">
                    <i class="fa fa-facebook" aria-hidden="true"></i>
                    <i class="fa fa-twitter" aria-hidden="true"></i>
                     <i class="fa fa-instagram" aria-hidden="true"></i>
                  </div> -->
                </div>
                <div class="messages">
                  <ul>
                    <li class="sent">
                      <img src="http://emilcarlsson.se/assets/mikeross.png" alt="" />
                      <p>How the hell am I supposed to get a jury to believe you when I am not even sure that I do?!</p>
                    </li>
                    <li class="replies">
                      <img src="http://emilcarlsson.se/assets/harveyspecter.png" alt="" />
                      <p>When you're backed against the wall, break the god damn thing down.</p>
                    </li>
                    <li class="replies">
                      <img src="http://emilcarlsson.se/assets/harveyspecter.png" alt="" />
                      <p>Excuses don't win championships.</p>
                    </li>
                    <li class="sent">
                      <img src="http://emilcarlsson.se/assets/mikeross.png" alt="" />
                      <p>Oh yeah, did Michael Jordan tell you that?</p>
                    </li>
                    <li class="replies">
                      <img src="http://emilcarlsson.se/assets/harveyspecter.png" alt="" />
                      <p>No, I told him that.</p>
                    </li>
                    <li class="replies">
                      <img src="http://emilcarlsson.se/assets/harveyspecter.png" alt="" />
                      <p>What are your choices when someone puts a gun to your head?</p>
                    </li>
                    <li class="sent">
                      <img src="http://emilcarlsson.se/assets/mikeross.png" alt="" />
                      <p>What are you talking about? You do what they say or they shoot you.</p>
                    </li>
                    <li class="replies">
                      <img src="http://emilcarlsson.se/assets/harveyspecter.png" alt="" />
                      <p>Wrong. You take the gun, or you pull out a bigger one. Or, you call their bluff. Or, you do any one of a hundred and forty six other things.</p>
                    </li>
                  </ul>
                </div>
                <!-- <div class="message-input">
                  <div class="wrap">
                  <input type="text" placeholder="Write your message..." />
                  <i class="fa fa-paperclip attachment" aria-hidden="true"></i>
                  <button class="submit"><i class="fa fa-paper-plane" aria-hidden="true"></i></button>
                  </div>
                </div> -->
              </div>
            </div>
             
              
            </div>


          </div>
          <!--/tab-pane-->
        </div>
        <!--/tab-content-->
      </div>
      <!--/col-9-->
    </div>
    <!--/row-->
  </div>
</section>
<?php $this->load->view('cdms/include/footer'); ?>
<script src="<?php echo base_url(); ?>assets/js/Chart.bundle.js"></script>
<script src="<?php echo base_url(); ?>assets/js/utils.js"></script>
<!-- ------- footBar section ends here --------------------------------->
<script type="text/javascript">
  $(document).ready(function() {

    var readURL = function(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $('.avatar').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }

    $(".file-upload").on('change', function(){
        readURL(this);
    });
});





  /**************CHART****************/
  var MONTHS = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];
    var color = Chart.helpers.color;
    var barChartData = {
      labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July'],
      datasets: [{
        label: 'Mothly',
        backgroundColor: color(window.chartColors.red).alpha(0.5).rgbString(),
        borderColor: window.chartColors.red,
        borderWidth: 1,
        data: [10,20,30,40,50,55,65]
      }]

    };

    window.onload = function() {
      var ctx = document.getElementById('canvas').getContext('2d');
      window.myBar = new Chart(ctx, {
        type: 'bar',
        data: barChartData,
        options: {
          responsive: true,
          legend: {
            position: 'top',
          },
          title: {
            display: true,
            text: 'Progress Report'
          }
        }
      });

    };

</script>

<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap.min.js"></script>
<script type="text/javascript">
  $(document).ready(function() {
        $('#example').DataTable();
    });
</script>




</body>
</html>
