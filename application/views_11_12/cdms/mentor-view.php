<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<?php $this->load->view('cdms/include/header'); ?>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap.min.css">
</head>

<body>
<?php $this->load->view('cdms/include/nav_bar'); ?>
<!-- ------- topfixedmenuBar section ends here --------------------------------->
<section id="sliderBar">
  <div class="container">
   
    <div class="container bootstrap snippet">
      <div class="row">
        <div class="col-sm-10">
          <p class="heading3" style="color:#003399; font-size: 30px;">Mentor Details</p>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-3">
          <!--left col-->
          <div class="text-left"> <img src="http://ssl.gstatic.com/accounts/ui/avatar_2x.png" class="img-thumbnail" alt="avatar" style="width: 100%">
            <h4 class="text-center"><?php echo $v->mentor_name; ?></h4>
            <div class="well">
            <ul>
              
              <li><?php echo $v->mentor_dob; ?></li>
              <li><?php echo $v->mentor_email; ?></li>
              <li><?php echo $v->mentor_mobile; ?></li>
              
              <li><?php echo $v->mentor_address; ?> <br> <?php echo $v->mentor_pin; ?></li>
              
              
            </ul>
            </div>
            
            
          </div>
          </hr>
          <br>
          
        </div>
        <!--/col-3-->
        <div class="col-sm-9">
          <ul class="nav nav-tabs">
            <li><a data-toggle="tab" href="#studentss">Students</a></li>
            <li class="active"><a data-toggle="tab" href="#curclass">Today's Class</a></li>
            <li><a data-toggle="tab" href="#prevclass">Previous Class</a></li>
            <li><a data-toggle="tab" href="#upclass">Upcoming Class</a></li>
            <li><a data-toggle="tab" href="#payment">Payment Details</a></li>
          </ul>
          <div class="tab-content">
            <div class="tab-pane" id="studentss">
              <hr>
               <h2>Students' Details</h2>
                <div class="panel-group" id="accordion">
                  <div class="panel panel-default">

                    <div class="panel-heading">
                      <h4 class="panel-title">
                        <a data-toggle="collapse" data-parent="#accordion" href="#collapse1">Suparna Halder&nbsp; <i class="fa fa-angle-down"></i></a>
                      </h4>
                    </div>


                    <div id="collapse1" class="panel-collapse collapse in">
                      <div class="panel-body">
                        <strong>Class: </strong>ii <strong>Subject: </strong>Math <strong>Chapter: </strong>Calculas <strong>Day: </strong>Monday <strong>Time: </strong>6:30pm <strong>Complete: </strong>No <button class="btn btn-success btn-xs">Complete</button>
                      </div>
                    </div>
                  </div>
                  <div class="panel panel-default">
                    <div class="panel-heading">
                      <h4 class="panel-title">
                        <a data-toggle="collapse" data-parent="#accordion" href="#collapse2">Sourav Samanta&nbsp; <i class="fa fa-angle-down"></i></a>
                      </h4>
                    </div>
                    <div id="collapse2" class="panel-collapse collapse">
                      <div class="panel-body">
                        <strong>Class: </strong>ii <strong>Subject: </strong>Math <strong>Chapter: </strong>Calculas <strong>Day: </strong>Monday <strong>Time: </strong>6:30pm <strong>Complete: </strong>No <button class="btn btn-success btn-xs">Complete</button>
                      </div>
                    </div>
                  </div>
                </div> 
            </div>
            <!--/tab-pane-->
            <div class="tab-pane active" id="curclass">
              <h2></h2>
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
            <!--/tab-pane-->
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
            </div>

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
