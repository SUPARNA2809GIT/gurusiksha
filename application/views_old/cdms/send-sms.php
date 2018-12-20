<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<?php $this->load->view('cdms/include/header'); ?>
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/style_custom.css"/>

<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<link rel="stylesheet" href="/resources/demos/style.css">
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

</head>
<body>
<?php $this->load->view('cdms/include/nav_bar'); ?>
<!-- ------- topfixedmenuBar section ends here --------------------------------->
<section id="sliderBar">
  <div class="container">
    <p class="heading3" style="color:#003399; text-align:center;">Send SMS</p>
    <div class="row">
      <div class="col-md-3"></div>
      <div class="col-md-6">
        <div class="well">
          <div class="main-div">
          <form action="<?php echo base_url() ?>admin/send_sms/send" method="post">
            <div class="ui-widget">
              <label for="tags">Choose Customer: </label>
              <input type="text" class="form-control" id="tags" placeholder="Slowly Type Customer Name Here ..." name="choose-customer">
            </div>

            <div class="form-group">
              <label>Choose Template</label>
              <select  class="form-control" id="choose-template" name="choose-template" onchange="getTemplate(this.value)" required>
                <option value="">--Select SMS Templete--</option>
                <?php if(!empty($sms_templete)) {
					 foreach($sms_templete as $templete) { ?>                     
                     <option value="<?php echo $templete->templete_id; ?>"><?php echo $templete->templete_name;  ?></option>              
              <?php } } ?>
              </select>
              
            </div>
            <div id="dynamic_field" style="display:none;">
                <div class="form-group">
                  <label><strong id="temp_name">Template One</strong> Preview </label>
                  <div class="alert alert-info"> <textarea class="form-control" name="templete_content" id="templete_content" onkeyup="countChar(this)" rows="5" maxlength="160" required></textarea> </div>
                  <div id="charNum" style="color:#FF0000;"></div>
                </div>
            </div>


            
            <div class="form-group text-center">
              <button type="submit" class="btn btn-primary">Send <i class="fa fa-paper-plane"></i></button>
            </div>
          </form>
        </div>
        </div>
      </div>
      <div class="col-md-3"></div>
    </div>
  </div>
</section>
</br></br></br></br></br></br></br>

<!-- ------- sliderBar section ends here --------------------------------->
<?php $this->load->view('cdms/include/footer'); ?>
<!-- ------- footBar section ends here --------------------------------->
<script>
 function getTemplate(val)
 {
 	//alert(val);
	console.log(val);
	
	$.ajax({ url: '<?php echo base_url() ?>admin/send_sms/get_templete',
			 data: {"templete_id": val},
			 type: 'get',
			 success: function(output) {
			 
						 var arr = output.split('||');
						 console.log(arr[1]);
						 $("#dynamic_field").show();
						 //$("#choose_customer option:selected").text();
						 var name = $("#choose_customer option:selected").text();;
						 //$(this).text(text.replace('dog', 'doll'));
						 var text = arr[0];
						 console.log(text);
						 
						 name = name.replace(/[0-9()]/g,'');
						 
						 console.log(text);
						 
						 
						 $("#templete_content").val(text.replace('Name', name));
						 
						 $("#temp_name").text(arr[1]);
						 
						 
						 var len = arr[0].length;
						 $('#charNum').text('Remaining Character: '+(parseInt(160)-parseInt(len)));
					  }
	});
 }
</script>
<script>
function countChar(val) {
  var len = val.value.length;
  $('#charNum').text('Remaining Character: '+(parseInt(160)-parseInt(len)));
};
</script>

<?php
$customers = $this->db->query("select * from tb_customer")->result();
?>
<script>
  $( function() {
    var availableTags = ["all",
<?php
if($customers) { foreach($customers as $customer) {
?>	
      "<?php echo $customer->customer_id."-".$customer->customer_name; ?>",
<?php } } ?>	  
      /*"AppleScript",
      "Asp",
      "BASIC",
      "C",
      "C++",
      "Clojure",
      "COBOL",
      "ColdFusion",
      "Erlang",
      "Fortran",
      "Groovy",
      "Haskell",
      "Java",
      "JavaScript",
      "Lisp",
      "Perl",
      "PHP",
      "Python",
      "Ruby",
      "Scala",
      "Scheme",*/
    ];
    function split( val ) {
      return val.split( /,\s*/ );
    }
    function extractLast( term ) {
      return split( term ).pop();
    }

    $( "#tags" )
      // don't navigate away from the field on tab when selecting an item
      .on( "keydown", function( event ) {
        if ( event.keyCode === $.ui.keyCode.TAB &&
            $( this ).autocomplete( "instance" ).menu.active ) {
          event.preventDefault();
        }
      })
      .autocomplete({
        minLength: 0,
        source: function( request, response ) {
          // delegate back to autocomplete, but extract the last term
          response( $.ui.autocomplete.filter(
            availableTags, extractLast( request.term ) ) );
        },
        focus: function() {
          // prevent value inserted on focus
          return false;
        },
        select: function( event, ui ) {
          var terms = split( this.value );
          // remove the current input
          terms.pop();
          // add the selected item
          terms.push( ui.item.value );
          // add placeholder to get the comma-and-space at the end
          terms.push( "" );
          this.value = terms.join( ", " );
          return false;
        }
      });
  } );
  </script>
</body>
</html>
