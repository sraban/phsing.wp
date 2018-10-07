<?php

$key='gtKFFx';
$salt="eCwWELxi"; #your payumoney salt
$txnId=rand(1,10000);
$amount='100';
$productName='Testing';
$firstName='sraban';
$email='skp.pvt@gmail.com';
$phone='8008156643';
$udf1=$_POST["udf1"];
$udf2=$_POST["udf2"];
$udf3=$_POST["udf3"];
$udf4=$_POST["udf4"];
$udf5=$_POST["udf5"];

$payhash_str = $key . '|' . checkNull($txnId) . '|' .checkNull($amount)  . '|' .checkNull($productName)  . '|' . checkNull($firstName) . '|' . checkNull($email) . '|' . checkNull($udf1) . '|' . checkNull($udf2) . '|' . checkNull($udf3) . '|' . checkNull($udf4) . '|' . checkNull($udf5) . '||||||' . $salt;


function checkNull($value) {
            if ($value == null) {
                  return '';
            } else {
                  return $value;
            }
      }

$hash = (hash('sha512', $payhash_str));
$arr['result'] = $hash;
$arr['status']=0;
$arr['errorCode']=null;
$arr['responseCode']=null;
$arr['hashtest']=$payhash_str;
$output=$arr;


#echo json_encode($output);

?>
<form name="sendParam" method="post" action="https://test.payu.in/_payment">
		<input type="hidden" name="key" value="<?php echo $key; ?>" />
		<input type="hidden" name="txnid" value="<?php echo $txnId; ?>" />
		<input type="hidden" name="amount" value="<?php echo $amount; ?>" />
		<input type="hidden" name="productinfo" value="<?php echo $productName; ?>" />
		<input type="hidden" name="firstname" value="<?php echo $firstName; ?>" />
		<input type="hidden" name="email" value="<?php echo $email; ?>" />
		<input type="hidden" name="phone" value="<?php echo $phone; ?>" />
		<input type="hidden" name="surl" value="https://localhost/success" />
		<input type="hidden" name="Furl" value="https://localhost/failure" />
		<input type="hidden" name="Hash" value="<?php echo $hash; ?>"/>
		 <input type="submit" value="enter" style="position: absolute; left: -9999px"/> 
 </form >