<?php

if($user_type=='S')
{
  $students = $this->db->query("SELECT * FROM tb_students WHERE student_id=".$id)->row();
  $name = $students->name;
  $photo = $students->photo;
}
elseif($user_type=='G')
{
  $guardian = $this->db->query("SELECT * FROM tb_guardian WHERE guardian_id=".$id)->row();
  $name = $guardian->guardian_name;
  $photo = $guardian->photo;
}
else
{
  $mentor = $this->db->query("SELECT * FROM tb_mentors WHERE mentor_id=".$id)->row();
  $name = $mentor->mentor_name;
  $photo = $mentor->photo;
}



$chatDeatils = $this->db->query("SELECT * FROM td_chat WHERE (from_id=".$id." OR to_id=".$id.") AND (user_type='".$user_type."' OR to_user_type='".$user_type."') ORDER BY chat_id ASC")->result();

    
 ?>


<div class="contact-profile"> <img src="<?php echo base_url(); ?>uploads/mentor/<?php echo $photo ; ?>" alt="" heigth="64" width="64" />
<p><?php echo $name; ?></p>
</div>
<div class="messages">
<ul class="newSms">

<?php

if(!empty($chatDeatils))
{
  foreach ($chatDeatils as $cht) {

    if($cht->user_type=='A')
    {
      $temp = 'replies';
      $image = base_url().'assets\admin_assets\images-nibedita\gurusiksha-icon-1024x1024.png';
    }
    else
    {
      $temp = 'sent';
      if($photo!='')
      {
        $image = base_url().'uploads/mentor/'.$photo;
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

<?php  } } ?>
  
</ul>
</div>
<div class="message-input">
  <div class="wrap">
  <input type="text" placeholder="Write your message..." id="newText_<?php echo $chatDeatils[0]->chat_id; ?>" />
  <button type="button" class="submit" onclick="saveText('<?php echo $user_type; ?>','<?php echo $id; ?>','newText_<?php echo $chatDeatils[0]->chat_id; ?>')"><i class="fa fa-paper-plane" aria-hidden="true"></i></button>
  </div>
</div>