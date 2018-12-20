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

    <p class="heading3" style="color:#003399;">Guardian Registration</p>

    <div class="row">

    

       <form method="post" action="<?php echo base_url() ?>add/guardian" >

       <?php echo $this->session->flashdata('success'); ?>

        <div class="form-row">



        <div class="col-md-12">

          <div class="form-group col-md-6">

            <label>Name</label>

            <input type="text" class="form-control" id="cust-name" name="name">

            <?php echo form_error('name','<span class="text-danger">','</span>'); ?>

          </div>

          

          <div class="form-group col-md-6">

            <label>Gender</label>

             <select class="form-control" id="cust-name" name="gender">

              <option value="">--Select --</option>

              <option value="Male">Male</option>

              <option value="Female">Female</option>

            </select>

            <?php echo form_error('gender','<span class="text-danger">','</span>'); ?>

          </div>

        </div>





        <div class="col-md-12">

          <div class="form-group col-md-6">

            <label>Email</label>

            <input type="text" class="form-control" id="cust-name" name="email">

            <?php echo form_error('email','<span class="text-danger">','</span>'); ?>

          </div>

          <div class="form-group col-md-6">

            <label>Mobile</label>

            <input type="text" class="form-control" id="cust-name" name="mobile">

            <?php echo form_error('mobile','<span class="text-danger">','</span>'); ?>

          </div>

       </div>



        <div class="col-md-12">  

          <div class="form-group col-md-6">

            <label>Pin</label>

            <input type="text" class="form-control" id="cust-name" name="pin">

            <?php echo form_error('pin','<span class="text-danger">','</span>'); ?>

          </div>



          <div class="form-group col-md-6">

            <label>Relationship with student</label>

            <input type="text" class="form-control" id="cust-name" name="rel_with_stud">

            <?php echo form_error('rel_with_stud','<span class="text-danger">','</span>'); ?>

          </div>

        </div>

        

        <div class="col-md-12">

          <div class="form-group col-md-6">

            <label>Address</label>

            <textarea type="text" class="form-control" id="cust-name" name="address"></textarea>

            <?php echo form_error('address','<span class="text-danger">','</span>'); ?>

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

    <p class="heading3" style="color:#003399;">Registration Details <span class="pull-right">

      

      </span></p>

    <div class="row">

      <div class="col-md-12">

        <div class="table-responsive" style="">

          <table id="example" class="table table-striped table-bordered" style="width:100%">

            <thead>

              <tr>

                <th width="1%">#</th>

                <th width="22%">Name</th>

                <th width="22%">Gender</th>

                <th width="22%">Email</th>

                <th width="22%">Mobile</th>

                <th width="22%">Address</th>

                <th width="22%">Pin</th>

                <th width="22%">Relationship with student</th>

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


          $deleteid = "guardian_id";
          $value = $v->guardian_id;
          $redirect = 'guardian';
          $tbl = 'tb_guardians';


      

      ?>

              <tr>

                <td><?php echo $i; ?> </td>

                

                <td><?php echo $v->guardian_name; ?></td>

                <td><?php echo $v->guardian_gender; ?></td>

                <td><?php echo $v->guardian_email; ?></td>

                <td><?php echo $v->guardian_mobile; ?></td>



                <td><?php echo $v->guardian_address; ?></td>

                <td><?php echo $v->guardian_pin; ?></td>

                <td><?php echo $v->rel_with_stud; ?></td>

                

                <td><a href="<?php echo base_url() ?>edit/guardian/<?php echo $v->guardian_id; ?>" class="btn btn-success btn-xs">Edit</a>



                  <br><br>



                  <a href="<?php echo base_url() ?>view/guardian/<?php echo $v->guardian_id; ?>" class="btn btn-success btn-xs">View</a>



                  <br><br>

                  <a onClick="return confirm('Would You Like To Delete This?');" href="<?php echo base_url() ?>delete/dlt/<?php echo $tbl; ?>/<?php echo $deleteid; ?>/<?php echo $value; ?>/<?php echo $redirect; ?>" class="btn btn-danger btn-xs">Delete</a></td>

              </tr>

              <?php  $i++; } 

        

        } else { ?> 

        <tr ><td colspan="7" align="center">No data found</td></tr>

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

