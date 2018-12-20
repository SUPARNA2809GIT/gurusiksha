<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<?php $this->load->view('cdms/include/header'); ?>
<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap.min.css">
<link rel='stylesheet prefetch' href='https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css'>
<style class="cp-pen-styles">
#frame {
  width: 100%;
  min-width: 360px;
  max-width: 1140px;
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
    <p class="heading3" style="color:#003399;">Chat Details</p>
    <div class="row"> </div>
  </div>
</section>
<!-- ------- sliderBar section ends here --------------------------------->
<section id="sliderBar2">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <ul class="nav nav-tabs">
          <li class="active"><a data-toggle="tab" href="#home">Students</a></li>
          <li><a data-toggle="tab" href="#menu1">Mentors</a></li>
          <li><a data-toggle="tab" href="#menu2">Guardian</a></li>
        </ul>
        <br>
        <br>
        <div class="tab-content">
          <div id="home" class="tab-pane fade in active">
            <div id="frame">
              <div id="sidepanel">
                <div id="profile">
                  <div class="wrap"> <img id="profile-img" src="<?php echo base_url(); ?>assets\admin_assets\images-nibedita\gurusiksha-icon-1024x1024.png" class="online" alt="" />
                    <p>Gurusiksha</p>
                  </div>
                </div>
                <div id="contacts">
                  <ul class="edgetoedge">
                    <?php if(!empty($AllStudents)){


                  foreach ($AllStudents as $k=>$cht) {
                    $students = $this->db->query("SELECT * FROM tb_students WHERE student_id=".$cht->from_id." OR student_id=".$cht->to_id)->row();

                    if($students->photo!='')
                    {
                      $img = base_url().'uploads/mentor/'.$students->photo;
                    }
                    else
                    {
                      $img = base_url().'assets\admin_assets\images-nibedita\no-images.png';
                    }
                   ?>
                    <li id="liId_<?php echo $k; ?>" class="contact <?php if($k==0) echo 'active'; ?>" onclick="getChatDetails('<?php echo $students->student_id; ?>','S','<?php echo $k; ?>')">
                      <div class="wrap"> <img src="<?php echo $img; ?>" alt="" />
                        <div class="meta">
                          <p class="name"><?php echo $students->name; ?></p>
                          <p class="preview"><?php echo $cht->msg; ?></p>
                        </div>
                      </div>
                    </li>
                    <?php  } } ?>
                  </ul>
                </div>
              </div>
              <div class="content" id="content">
                <?php

                if(!empty($AllStudents)){

                $id = $AllStudents[0]->from_id;
                if($id==0)
                {
                  $id = $AllStudents[0]->to_id;
                }
                $user_type = $AllStudents[0]->user_type;
                $students = $this->db->query("SELECT * FROM tb_students WHERE student_id=".$id)->row();
                $chatDeatils = $this->db->query("SELECT * FROM td_chat WHERE (from_id=".$id." OR to_id=".$id.") AND (user_type='S' OR to_user_type='S') ORDER BY chat_id ASC")->result();

                
             ?>
                <div class="contact-profile"> <img src="<?php echo base_url(); ?>uploads/mentor/<?php echo $students->photo ; ?>" alt="" heigth="64" width="64" />
                  <p><?php echo $students->name; ?></p>
                </div>
                <div class="messages">
                  <ul class="newSms">
                    <?php

                      if(!empty($chatDeatils))
                      {

                        foreach ($chatDeatils as $cht) 
                        {

                          if($cht->user_type=='A')
                          {
                            $temp = 'replies';
                            $image = base_url().'assets\admin_assets\images-nibedita\gurusiksha-icon-1024x1024.png';
                          }
                          else
                          {
                            $temp = 'sent';
                            if($students->photo!='')
                            {
                              $image = base_url().'uploads/mentor/'.$students->photo;
                            }
                            else
                            {
                              $image = base_url().'assets\admin_assets\images-nibedita\no-images.png';
                            }

                              
                            
                          }


                         ?>
                    <li class="<?php echo $temp; ?>"> <img src="<?php echo $image; ?>" alt="" />
                      <p><?php echo $cht->msg; ?></p>
                    </li>
                    <?php  } } } ?>
                  </ul>
                </div>
                <?php if(!empty($chatDeatils))
                      { ?>
                <div class="message-input">
                  <div class="wrap">
                  <input type="text" placeholder="Write your message..." id="newText_<?php echo $chatDeatils[0]->chat_id; ?>" />
                  <button type="button" class="submit" onclick="saveText('S','<?php echo $students->student_id; ?>','newText_<?php echo $chatDeatils[0]->chat_id; ?>')"><i class="fa fa-paper-plane" aria-hidden="true"></i></button>
                  </div>
                </div>
                <?php } ?>
              </div>
            </div>
          </div>
          <div id="menu1" class="tab-pane fade">
            <div id="frame">
              <div id="sidepanel">
                <div id="profile">
                  <div class="wrap"> <img id="profile-img" src="<?php echo base_url(); ?>assets\admin_assets\images-nibedita\gurusiksha-icon-1024x1024.png" class="online" alt="" />
                    <p>Gurusiksha</p>
                  </div>
                </div>
                <div id="contacts">
                  <ul class="edgetoedge">
                    <?php
                    
                    
                    
                    if(!empty($AllMentors)){
                        
                       

                foreach ($AllMentors as $km=>$chtm) {
                  $moentors = $this->db->query("SELECT * FROM tb_mentors WHERE mentor_id=".$chtm->from_id." OR mentor_id=".$chtm->to_id)->row();
                 ?>
                    <li id="liId_<?php echo 'M'.$km; ?>" class="contact <?php if($km==0) echo 'active'; ?>" onClick="getChatDetails('<?php echo $moentors->mentor_id; ?>','M','<?php echo 'M'.$km; ?>')">
                      <div class="wrap"> <img src="<?php echo base_url(); ?>uploads/mentor/<?php echo $moentors->photo ; ?>" alt="" />
                        <div class="meta">
                          <p class="name"><?php echo $moentors->mentor_name; ?></p>
                          <p class="preview"><?php echo $chtm->msg; ?></p>
                        </div>
                      </div>
                    </li>
                    <?php  } } ?>
                  </ul>
                </div>
              </div>
              <div class="content" id="contentMentor">
                <?php

                if(!empty($AllMentors))
                {
                    $id = $AllMentors[0]->from_id;
                    if($id==0)
                    {
                      $id = $AllMentors[0]->to_id;
                    }
                    $user_type = $AllMentors[0]->user_type;
                    $ments = $this->db->query("SELECT * FROM tb_mentors WHERE mentor_id=".$id)->row();
                    $chatDeatilsMentors = $this->db->query("SELECT * FROM td_chat WHERE (from_id=".$id." OR to_id=".$id.") AND (user_type='M' OR to_user_type='M') ORDER BY chat_id ASC")->result();
                }

                    
             ?>

               <?php if(!empty($ments)){ ?>
                <div class="contact-profile"> <img src="<?php echo base_url(); ?>uploads/mentor/<?php echo $ments->photo ; ?>" alt="" heigth="64" width="64" />
                  <p><?php echo $ments->mentor_name; ?></p>
                </div>
              <?php } ?>

                <div class="messages">
                  <ul class="newSms">
                    <?php

                  if(!empty($AllMentors) && !empty($chatDeatilsMentors))
                  {
                    foreach ($chatDeatilsMentors as $chmt) 
                    {

                      if($chmt->user_type=='A')
                      {
                        $temp = 'replies';
                        $image = base_url().'assets\admin_assets\images-nibedita\gurusiksha-icon-1024x1024.png';
                      }
                      else
                      {
                        $temp = 'sent';
                        if($ments->photo!='')
                        {
                          $image = base_url().'uploads/mentor/'.$ments->photo;
                        }
                        else
                        {
                          $image = base_url().'assets\admin_assets\images-nibedita\no-images.png';
                        }
                      }


                     ?>
                    <li class="<?php echo $temp; ?>"> <img src="<?php echo $image; ?>" alt="" />
                      <p><?php echo $chmt->msg; ?></p>
                    </li>
                    <?php  } } ?>
                  </ul>
                </div>
                 <?php if(!empty($chatDeatilsMentors))
                      { ?>
                <div class="message-input">
                  <div class="wrap">
                  <input type="text" placeholder="Write your message..." id="newText_<?php echo $chatDeatilsMentors[0]->chat_id; ?>" />
                  <button type="button" class="submit" onclick="saveText('M','<?php echo $ments->mentor_id; ?>','newText_<?php echo $chatDeatilsMentors[0]->chat_id; ?>')"><i class="fa fa-paper-plane" aria-hidden="true"></i></button>
                  </div>
                </div>
                <?php } ?>
              </div>
            </div>
          </div>
          <div id="menu2" class="tab-pane fade">
            <div id="home" class="tab-pane fade in active">
              <div id="frame">
                <div id="sidepanel">
                  <div id="profile">
                    <div class="wrap"> <img id="profile-img" src="<?php echo base_url(); ?>assets\admin_assets\images-nibedita\gurusiksha-icon-1024x1024.png" class="online" alt="" />
                      <p>Gurusiksha</p>
                    </div>
                  </div>
                  <div id="contacts">
                    <ul class="edgetoedge">
                      <?php if(!empty($AllGuardians)){

                        foreach ($AllGuardians as $kg=>$chtg) {
                          $guardians = $this->db->query("SELECT * FROM tb_guardian WHERE guardian_id=".$chtg->from_id." OR guardian_id=".$chtg->to_id)->row();
                         ?>
                      <li id="liId_<?php echo 'G'.$km; ?>" class="contact <?php if($kg==0) echo 'active'; ?>" onClick="getChatDetails('<?php echo $guardians->guardian_id; ?>','G','<?php echo 'G'.$kg; ?>')">
                        <div class="wrap"> <img src="<?php echo base_url(); ?>uploads/mentor/<?php echo $guardians->photo ; ?>" alt="" />
                          <div class="meta">
                            <p class="name"><?php echo $guardians->guardian_name; ?></p>
                            <p class="preview"><?php echo $chtg->msg; ?></p>
                          </div>
                        </div>
                      </li>
                      <?php  } } ?>
                    </ul>
                  </div>
                </div>
                <div class="content" id="contentGuardian">
                  <?php
                  if(!empty($AllGuardians))
                  {
                      $id = $AllGuardians[0]->from_id;
                      if($id==0)
                      {
                        $id = $AllGuardians[0]->to_id;
                      }
                      $user_type = $AllGuardians[0]->user_type;
                      $gudgs = $this->db->query("SELECT * FROM tb_guardian WHERE guardian_id=".$id)->row();
                      $chatDeatilsGuardians = $this->db->query("SELECT * FROM td_chat WHERE (from_id=".$id." OR to_id=".$id.") AND (user_type='G' OR to_user_type='G') ORDER BY chat_id ASC")->result();
                  }
                    
                  ?>
                  <?php 
                  if(!empty($AllGuardians))
                  { ?>
                  <div class="contact-profile"> <img src="<?php echo base_url(); ?>uploads/mentor/<?php echo $gudgs->photo ; ?>" alt="" heigth="64" width="64" />
                    <p><?php echo $gudgs->guardian_name; ?></p>
                  </div>
                <?php } ?>
                  <div class="messages">
                    <ul class="newSms">
                      <?php
                          if(!empty($AllGuardians) &&  !empty($chatDeatilsGuardians))
                          {
                            foreach ($chatDeatilsGuardians as $chgt) 
                            {

                              if($chgt->user_type=='A')
                              {
                                $temp = 'replies';
                                $image = base_url().'assets\admin_assets\images-nibedita\gurusiksha-icon-1024x1024.png';
                              }
                              else
                              {
                                $temp = 'sent';
                                $image = base_url().'assets\admin_assets\images-nibedita\gurusiksha-icon-1024x1024.png';
                              }


                             ?>
                          <li class="<?php echo $temp; ?>"> <img src="<?php echo $image; ?>" alt="" />
                            <p><?php echo $chgt->msg; ?></p>
                          </li>
                          <?php  } } ?>
                    </ul>
                  </div>
                  <?php if(!empty($chatDeatilsGuardians))
                      { ?>
                <div class="message-input">
                  <div class="wrap">
                  <input type="text" placeholder="Write your message..." id="newText_<?php echo $chatDeatilsGuardians[0]->chat_id; ?>" />
                  <button type="button" class="submit" onclick="saveText('G','<?php echo $gudgs->guardian_id; ?>','newText_<?php echo $chatDeatilsGuardians[0]->chat_id; ?>')"><i class="fa fa-paper-plane" aria-hidden="true"></i></button>
                  </div>
                </div>
                <?php } ?>
                </div>
              </div>
            </div>
          </div>
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


  function getChatDetails(userId,type,count)
  {
      j.ajax({type: "post",
              url: "<?php echo base_url(); ?>view/chatDeatils",
              data: {"user_id":userId,"type":type},
              dataType: "html",
              success: function (response) {
                  if(type=='M')
                  {
                   
                    j("#contentMentor").html(response);
                  }
                  else if(type=='G')
                  {
                    j("#contentGuardian").html(response);
                  }
                  else
                  {
                    j("#content").html(response);
                  }
                  
              }
              });

      j(".edgetoedge li").removeClass("active");
      j("#liId_"+count).addClass("active");




  }


    


  function saveText(userType,userId,fieldId)
  {

      var msg = j("#"+fieldId).val(); 
      
      //alert("ok");

    if(userType!='' && userId!='' && msg!='')
    {
        j.ajax({type: "post",
               url: "<?php echo base_url(); ?>view/chatAdd",
               data: {"user_id":userId,"type":userType,"message":msg},
              success: function (response) {
                  
                  
                     j("#"+fieldId).val('');


                     j(".newSms").append(response);



                  
               }
               });
       }
      
  }

</script>
</body>
</html>
