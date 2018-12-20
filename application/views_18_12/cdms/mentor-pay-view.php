<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<?php $this->load->view('cdms/include/header'); ?>
<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap.min.css">
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.6.3/css/bootstrap-select.min.css" />
</head>
<body>
<?php $this->load->view('cdms/include/nav_bar'); ?>
<!-- ------- topfixedmenuBar section ends here --------------------------------->
<section id="sliderBar">
  <div class="container">
    <p class="heading3" style="color:#003399;">Mentor Payment Details</p>
    <div class="row">
      <form method="post" action="" >
        <?php echo $this->session->flashdata('success'); ?>
        <div class="form-row">
          <div class="form-group col-md-12">
            <label>Select Mentor</label>
            <select class="form-control selectpicker" data-show-subtext="true" data-live-search="true" name="mentor_id" id="mentor_id" onchange="return paydtl(this.value)">
              <option value="">--Select--</option>
              <?php if(!empty($mentor)){
              foreach ($mentor as $ment) { ?>
                <option value="<?php echo $ment->mentor_id; ?>"><?php echo $ment->mentor_name; ?></option>
              <?php } } ?>
            </select>
          </div>
        </div>
      </form>
    </div>
  </div>
</section>
<!-- ------- sliderBar section ends here --------------------------------->
<section id="sliderBar2">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="table-responsive" style="" id="paymentDetailsTb">
          <table id="example" class="table table-striped table-bordered" style="width:100%">
            <thead>
              <tr>
                <th>#</th>
                <th>Student</th>
                <th>Class</th>
                <th>Subject</th>
                <th>Time</th>
                <th>Fee(INR)</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
              </tr>
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
<script src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.6.3/js/bootstrap-select.min.js"></script>
<script type="text/javascript">

  var j = jQuery.noConflict();

  j(document).ready(function() {

    j('#example').DataTable();

} );


  function paydtl()
  {
      var mentorId = j("#mentor_id").val();
      if(mentorId!='')
      {
          j.ajax({type: "post",
                  url: "<?php echo base_url(); ?>view/getMentorsPayment",
                  data: {"mentor_id":mentorId},
                  dataType: "html",
                  success: function(response) {

                      j("#paymentDetailsTb").html(response);

                      j('#example').DataTable();

                  }
                  });
      }
  }

</script>
</body>
</html>
