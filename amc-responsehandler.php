<?php include("includes/config.php");
if($_SESSION['userID']==""){
    header("location:index.php");
    die;
}
?>
<?php include('Crypto.php') ?>
<?php

  error_reporting(0);
  
  $workingKey ='4B70B4D86F80092381E253832F0163B8';    //Working Key should be provided here.
  $encResponse = $_POST["encResp"]; 
    //This is the response sent by the CCAvenue Server
  $rcvdString = decrypt($encResponse,$workingKey);  

    //Crypto Decryption used as per the specified working key.
  $order_status = "";
  $decryptValues = explode('&', $rcvdString);
  $dataSize = sizeof($decryptValues);
  echo "<center>";

  for($i = 0; $i < $dataSize; $i++) 
  {
    $information=explode('=',$decryptValues[$i]);
    if($i==3) $order_status=$information[1];
  }

  $paid = 0;

  if($order_status==="Success")
  {
    echo "<br>Thank you for shopping with us. Your credit card has been charged and your transaction is successful. We will be shipping your order to you soon.";
    $paid = 1;
    
  }
  else if($order_status==="Aborted")
  {
    echo "<br>Thank you for shopping with us.We will keep you posted regarding the status of your order through e-mail";
    $paid = 0;
  }
  else if($order_status==="Failure")
  {
    echo "<br>Thank you for shopping with us.However,the transaction has been declined.";
    $paid = 0;
  }
  else
  {
    echo "<br>Security Error. Illegal access detected";
    $paid = 0;
  
  }

  echo "<br><br>";

  echo "<table cellspacing=4 cellpadding=4>";
  for($i = 0; $i < $dataSize; $i++) 
  {
    $information=explode('=',$decryptValues[$i]);
        echo '<tr><td>'.$information[0].'</td><td>'.$information[1].'</td></tr>';
  }

  echo "</table><br>";
  echo "</center>";

  $txn_id = explode('=',$decryptValues[1]);

  $txn_id = $txn_id[1];

  $payType = explode('=',$decryptValues[5]);

  $payType = $payType[1];

  $amount = explode('=',$decryptValues[10]);

  $amount = $amount[1];

  $curreny_date = date('Y-m-d');


   $sql = "INSERT INTO tbl_memberamc(txn_id,member_id,payType,amc_amount,paydate,paid) VALUES ('".$txn_id."','".$_SESSION['userID']."','".$payType."','".$amount."','".$curreny_date."','".$paid."')";

   $query = mysqli_query($con,$sql);

   echo mysqli_error($con);
 

?>
