<?php
//print_r($order_id);die;exit;
 $PAYU_BASE_URL = "https://secure.payu.in";
$action = $PAYU_BASE_URL . '/_payment'; 

$oid = $order_id;
$Amount_req = $amt;

$key='bF8sbkSu';
$salt="ZsVzSz3deJ";
$txnId=$txn_id;
//$txnId='1237upty342312';
$amount=$Amount_req;
$productName='OnlineSiksha';
$firstName=$cust_name;
$email=$cust_email;
$udf1=$oid;
$udf2='';
$udf3='';
$udf4='';
$udf5='';

$payhash_str = $key . '|' . checkNull($txnId) . '|' .checkNull($amount)  . '|' .checkNull($productName)  . '|' . checkNull($firstName) . '|' . checkNull($email) . '|' . checkNull($udf1) . '|' . checkNull($udf2) . '|' . checkNull($udf3) . '|' . checkNull($udf4) . '|' . checkNull($udf5) . '||||||' . $salt;


function checkNull($value) {
            if ($value == null) {
                  return '';
            } else {
                  return $value;
            }
      }


$hash = strtolower(hash('sha512', $payhash_str));
$arr['payment_hash'] = $hash;
$arr['status']=0;
$arr['errorCode']=null;
$arr['responseCode']=null;
$arr['hashtest']=$payhash_str;
$output=$arr;


//echo json_encode($output);

?>

<html>
  <head>
  <script>
    var hash = '<?php echo $hash ?>';
    function submitPayuForm() {
      if(hash == '') {
        return;
      }
      var payuForm = document.forms.payuForm;
      payuForm.submit();
    }
  </script>
  </head>
  <body onload="submitPayuForm()">
    <h2>PayU Form</h2>
    <br/>
    <?php //if($formError) { ?>
  
      <!-- <span style="color:red">Please fill all mandatory fields.</span>
      <br/>
      <br/> -->
    <?php //} ?>
     <form action="<?php echo $action; ?>" method="post" name="payuForm" id="payuForm">
      
      <input type="hidden" name="mode" value="sub" />
                  <input type="hidden" name="key" value="<?php echo $key ;?>" />
                <input type="hidden" name="hash" value="<?php echo $hash ;?>"/>
              <input type="hidden" name="txnid" value="<?php echo $txnId ;?>" />
                  <input type="hidden" name="amount" value="<?php echo $amount;?>"/>  
                                
                  <input type="hidden" name="firstname" id="firstname" value="<?php echo $firstName; ?>" />
                  <input type="hidden" name="email" id="email" value="<?php echo $email; ?>" />
                  <input type="hidden" name="phone" value="<?php echo $cust_phn;?>" />
                  <input type="hidden" name="productinfo" id="productinfo" value="<?php echo $productName; ?>" />                
                  <input type="hidden" name="surl" value="http://www.guru-siksha.com/success.php" size="64" />
                  <input type="hidden" name="furl" value="http://www.guru-siksha.com/fail.php" size="64" />
                  <input type="hidden" name="service_provider" value="payu_paisa" size="64" />
                  <input name="lastname" id="lastname" value="Halder" type="hidden" />
                  <input name="curl" value="" type="hidden" />
                  <input name="address1" value="Transaction" type="hidden"  />                  
                  <!--<input type="text" id="stream" name="stream" value="BA. General"/>-->                  
                  <input name="address2" value="" type="hidden"  />
                  <input name="city" value="" type="hidden"  />
                  <input name="state" value="" type="hidden"  />
                  <input name="country" value="" type="hidden"  />
                  <input name="zipcode" value="" type="hidden"  />
                  <input name="udf1" value="<?php echo $oid;?>" type="hidden"  />
                  <input name="udf2" value="" type="hidden"  />
                  <input name="udf3" value="" type="hidden"  />
                  <input name="udf4" value="" type="hidden"  />
                  <input name="udf5" value="" type="hidden"  />
                  <input name="pg" value="" type="hidden"  />
                   </form>    
  </body>
</html>
