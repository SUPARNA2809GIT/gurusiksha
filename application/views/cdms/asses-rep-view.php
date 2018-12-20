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
    <p class="heading3" style="color:#003399;">Assesment Reports</p>
    <div class="row">
      <form method="post" action="" >
        <?php echo $this->session->flashdata('success'); ?>
        <div class="form-row">
          <div class="form-group col-md-6">
            <label>Subject</label>
            <select class="form-control selectpicker" data-show-subtext="true" data-live-search="true" name="subject_id" id="subject_id" onchange="return paydtl()">
              <option data-subtext="">--Select--</option>
              <?php if(!empty($subjects)){
                foreach ($subjects as $sub) { ?>
                  <option value="<?php echo $sub->subject_id; ?>"><?php echo $sub->subject; ?></option>
              <?php  } } ?>
            </select>
          </div>

          <div class="form-group col-md-6">
            <label>Exam Date</label>
            <!-- <input type="date" name="exam_date" class="form-control" id="exam_date" onchange="return paydtl()"> -->
            <input list="browsers" class="form-control" name="exam_date" id="exam_date" onchange="return paydtl()">
            <datalist id="browsers">
              <?php if(!empty($dates)){
                foreach ($dates as $value) { ?>
                  <option value="<?php echo $value->exam_date; ?>">
              <?php } } ?>
              
              
            </datalist>
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
                <th>Chapter</th>
                <th>Given Answer</th>
                <th>Correct Answer</th>
                <th>Result</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
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
      var subject_id = j("#subject_id").val();
      var exam_date = j("#exam_date").val();


      if(subject_id!='' && exam_date!='')
      {
          j.ajax({type: "post",
                  url: "<?php echo base_url(); ?>view/getAssesments",
                  data: {"subject_id":subject_id,"exam_date":exam_date},
                  dataType: "html",
                  success: function(response) {

                      //console.log(response);

                      j("#paymentDetailsTb").html(response);

                      j('#example').DataTable();

                  }
                  });
      }

      
  }

</script>
</body>
</html>
