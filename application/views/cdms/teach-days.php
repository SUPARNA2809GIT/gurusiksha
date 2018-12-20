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

    <p class="heading3" style="color:#003399;">Add Teaching Days</p>

    <div class="row">

    

      <form method="post" action="<?php echo base_url() ?>add/days" >

       <?php echo $this->session->flashdata('success'); ?>

        <div class="form-row">

          <div class="form-group col-md-12">

            <label>Days Name</label>

            <select class="form-control" id="cust-name" name="day-name">

              <option value="">--Select --</option>

              <option value="Monday">Monday</option>

              <option value="Tuesday">Tuesday</option>

              <option value="Wednesday">Wednesday</option>

              <option value="Thursday">Thursday</option>

              <option value="Friday">Friday</option>

              <option value="Saturday">Saturday</option>

              <option value="Sunday">Sunday</option>

            </select>

            

            <?php echo form_error('day-name','<span class="text-danger">','</span>'); ?>

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

    <p class="heading3" style="color:#003399;">Teaching Days Details <span class="pull-right">

      

      </span></p>

    <div class="row">

      <div class="col-md-12">

        <div class="table-responsive" style="">

          <table id="example" class="table table-striped table-bordered" style="width:100%">

            <thead>

              <tr>

                <th width="1%">#</th>

                <th width="22%">Teaching Days</th>

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


          $deleteid = "day_id";
          $value = $v->day_id;
          $redirect = 'days';
          $tbl = 'tb_teaching_days';

				

				

			

			?>

              <tr>

                <td><?php echo $i; ?> </td>

                <td><?php echo $v->day; ?></td>

                

                <td><a href="<?php echo base_url() ?>edit/days/<?php echo $v->day_id; ?>" class="btn btn-success btn-xs">Edit</a>

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

