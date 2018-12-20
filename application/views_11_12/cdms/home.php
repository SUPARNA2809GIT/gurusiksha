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
    <p class="heading3" style="color:#003399;">Add Customer</p>
    <div class="row">
    
      <form method="post" action="<?php echo base_url() ?>home/add" >
       <?php echo $this->session->flashdata('success'); ?>
        <div class="form-row">
          <div class="form-group col-md-2">
            <label>Cutomer Name</label>
            <input type="text" class="form-control" id="cust-name" name="customer-name">
            <?php echo form_error('customer-name','<span class="text-danger">','</span>'); ?>
          </div>
          <div class="form-group col-md-2">
            <label>Mobile Number</label>
            <input type="number" class="form-control" id="cust-mob" name="customer-phone">
            <?php echo form_error('customer-phone','<span class="text-danger">','</span>'); ?>
          </div>
          <div class="form-group col-md-2">
            <label>Email Address</label>
            <input type="email" class="form-control" id="cust-email" name="custome-email-address">
            <?php echo form_error('custome-email-address','<span class="text-danger">','</span>'); ?>
          </div>
          <div class="form-group col-md-2">
            <label>DOB</label>
            <input type="date" class="form-control" id="cust-dob" name="customer-dob">
            <?php echo form_error('customer-dob','<span class="text-danger">','</span>'); ?>
          </div>
          <div class="form-group col-md-2">
            <label>PAN</label>
            <input type="text" class="form-control" id="custPan" name="customer-pan-no" onblur="checkPanNo()">
            <?php echo form_error('customer-pan-no','<span class="text-danger">','</span>'); ?>
            <div id="errorMsg" style="color: red;"></div>
          </div>
          
          <div class="form-group col-md-2">
            <label>Aadhar</label>
            <input type="text" class="form-control" id="aadhar_no" name="aadhar_no">
          </div>
          
          <div class="form-group col-md-12">
            <label>Residential Address</label>
            <textarea type="text" class="form-control" id="cust-address" name="address"></textarea>
            <?php echo form_error('address','<span class="text-danger">','</span>'); ?>
          </div>
          
          <div class="form-group col-md-2">
            <label>Spouse Name</label>
            <input type="text" class="form-control" id="spouse-name" name="spouse-name">
          </div>
          <div class="form-group col-md-2">
            <label>Mobile Number</label>
            <input type="number" class="form-control" id="spouse-mob" name="spouse-phone">
          </div>
          <div class="form-group col-md-2">
            <label>Date of Birth</label>
            <input type="date" class="form-control" id="spouse-dob" name="spouse-dob">
          </div>
          <div class="form-group col-md-2">
            <label>Date of Anniversary</label>
            <input type="date" class="form-control" id="spouse-anniversary" name="aniversery-date">
          </div>
          <div class="form-group col-md-2">
            <label>PAN</label>
            <input type="text" class="form-control" id="spouse-pan" name="spouse-pan">
          </div>
          <div class="form-group col-md-2">
            <label>Spouse Aadhar</label>
            <input type="text" class="form-control" id="spouse_aadhar_no" name="spouse_aadhar_no">
          </div>
          <div class="form-group col-md-4">
            <label>Child One Name</label>
            <input type="text" class="form-control" id="child1-name" name="child1-name">
          </div>
          <div class="form-group col-md-4">
            <label>Date of Birth</label>
            <input type="date" class="form-control" id="child1-dob" name="child1-dob">
          </div>
          <div class="form-group col-md-4">
            <label>Child One Aadhar</label>
            <input type="text" class="form-control" id="child1_aadhar_no" name="child1_aadhar_no">
          </div>
          <div class="form-group col-md-4">
            <label>Child Two Name</label>
            <input type="text" class="form-control" id="child2-name" name="child2-name">
          </div>
          <div class="form-group col-md-4">
            <label>Date of Birth</label>
            <input type="date" class="form-control" id="child2-dob" name="child2-dob">
          </div>
          <div class="form-group col-md-4">
            <label>Child Two Aadhar</label>
            <input type="text" class="form-control" id="child2_aadhar_no" name="child2_aadhar_no">
          </div>
          <div class="form-group col-md-12">
            <button type="submit" id="submit" class="btn btn-primary">Add Customer</button>
          </div>
        </div>
      </form>
    </div>
  </div>
</section>
<!-- ------- sliderBar section ends here --------------------------------->
<section id="sliderBar2">
  <div class="container">
    <p class="heading3" style="color:#003399;">Customer Details <span class="pull-right">
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
                <th width="22%">Customer Name</th>
                <th width="12%">Mobile Number</th>
                <th width="24%">Email Address</th>
                <th width="12%">Date of Birth</th>
                <th width="14%">PAN Number</th>
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
				
				if(!empty($customers)){ foreach($customers as $k=>$v) { 
				
				
			
			?>
              <tr>
                <td><?php echo $i; ?> </td>
                <td><?php echo $v->customer_name; ?></td>
                <td><?php echo $v->customer_phone; ?></td>
                <td><?php echo $v->custome_email_address; ?></td>
                <td><?php echo date('d/m/Y', strtotime($v->customer_dob)) ;  ?></td>
                <td><?php echo $v->customer_pan_no; ?></td>
                <td><a href="<?php echo base_url() ?>home/edit/<?php echo $v->customer_id; ?>" class="btn btn-success btn-xs">Edit</a>
                  <a href="<?php echo base_url() ?>home/details/<?php echo $v->customer_id; ?>" class="btn btn-primary btn-xs">Details</a>
                  <a onClick="return confirm('Would You Like To Delete This?');" href="<?php echo base_url() ?>home/delete/<?php echo $v->customer_id; ?>" class="btn btn-danger btn-xs">Delete</a></td>
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
</section>
<!-- ------- sliderBar section ends here --------------------------------->
<?php $this->load->view('cdms/include/footer'); ?>
<!-- ------- footBar section ends here --------------------------------->
<script>
 function searchData()
 {
 	$("#searchForm").submit();
 	
 }
 
 function checkPanNo()
 {
	 var custPan = $("#custPan").val();
		$.ajax({
			url:"<?php echo base_url() ?>home/checkPanNo", //the page containing php script
			type: "post", //request type,
			data: {"panNo": custPan },
			success:function(result){
				if(result==1)
				{
					$("#errorMsg").html("Pan no already exists");
					$("#submit").prop('disabled', true);
				}
				else
				{
					$("#errorMsg").html("");
					$("#submit").removeAttr('disabled');
				}
			}
		 });
 }
</script>
</body>
</html>
