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

    <p class="heading3" style="color:#003399;">Add Subject Fee</p>

    <div class="row">

    

      <form method="post" action="<?php echo base_url() ?>add/fees" >

       <?php echo $this->session->flashdata('success'); ?>

        <div class="form-row">

          <div class="form-group col-md-12">

            <label>Subject Name</label>

            <select name="subject_id" class="form-control">

              <option value="">--Select--</option>

              <?php if(!empty($subject)) { foreach ($subject as $sb) { ?>



                <option value="<?php echo $sb->subject_id;  ?>"><?php echo $sb->subject;  ?></option>

                

            <?php } } ?>

            </select>

            <?php echo form_error('subject_id','<span class="text-danger">','</span>'); ?>

          </div>



          <div class="form-group col-md-12">

            <label>Chapter Name</label>

            <select name="chapter_id" class="form-control">

              <option value="">--Select--</option>

              <?php if(!empty($chapter)) { foreach ($chapter as $ch) { ?>



                <option value="<?php echo $ch->chapter_id;  ?>"><?php echo $ch->chapter;  ?></option>

                

            <?php } } ?>

            </select>

            <?php echo form_error('chapter_id','<span class="text-danger">','</span>'); ?>

          </div>





          <div class="form-group col-md-12">

            <label>Amount</label>

            <input type="number" class="form-control" id="cust-name" name="fees">

            <?php echo form_error('fees','<span class="text-danger">','</span>'); ?>

          </div>



          <div class="form-group col-md-12">

            <button type="submit" id="submit" class="btn btn-primary">Add</button>

          </div>

        </div>

      </form>

    </div>

  </div>

</section>

<!-- ------- sliderBar section ends here --------------------------------->

<section id="sliderBar2">

  <div class="container">

    <p class="heading3" style="color:#003399;">Subject Fees Details <span class="pull-right">

      

      </span></p>

    <div class="row">

      <div class="col-md-12">

        <div class="table-responsive" style="">

          <table id="example" class="table table-striped table-bordered" style="width:100%">

            <thead>

              <tr>

                <th>#</th>

                <th>Subject</th>

                <th>Chpter</th>

                <th>Fee</th>

                <th>Action</th>

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



          $deleteid = "fee_id";
          $value = $v->fee_id;
          $redirect = 'fees';
          $tbl = 'tb_fees';

			?>

              <tr>

                <td><?php echo $i; ?> </td>

                <td><?php echo $v->subject; ?></td>

                <td><?php echo $v->chapter; ?></td>

                <td><?php echo $v->fee; ?></td>

                <td><a href="<?php echo base_url() ?>edit/fees/<?php echo $v->fee_id; ?>" class="btn btn-success btn-xs">Edit</a>

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

